<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use DOMDocument;
use DOMXPath;

class BeritaSuaraMerdekaService
{
    private string $url = 'https://www.suaramerdeka.com/';

    public function ambilBerita(): array
    {
        return Cache::remember('berita_suara_merdeka_terkini', now()->addMinutes(15), function () {

            try {
                $response = Http::timeout(30)
                    ->withHeaders([
                        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/120.0 Safari/537.36',
                        'Accept' => 'text/html,application/xhtml+xml',
                    ])
                    ->get($this->url);

                if (!$response->successful()) {
                    return [];
                }

                $html = $response->body();

                libxml_use_internal_errors(true);

                $dom = new DOMDocument();
                $dom->loadHTML('<?xml encoding="UTF-8">' . $html);

                $xpath = new DOMXPath($dom);

                // Ambil elemen judul berita
                $judulNodes = $xpath->query('//h1 | //h2 | //h3');

                $berita = [];
                $urlTerpakai = [];

                foreach ($judulNodes as $judulNode) {

                    $judul = trim(preg_replace(
                        '/\s+/',
                        ' ',
                        $judulNode->textContent
                    ));

                    if (strlen($judul) < 15) {
                        continue;
                    }

                    // Cari link pada judul atau elemen induknya
                    $linkNode = $xpath->query(
                        './/a[@href] | ancestor::a[@href][1]',
                        $judulNode
                    )->item(0);

                    if (!$linkNode) {
                        continue;
                    }

                    $link = trim($linkNode->getAttribute('href'));

                    if (Str::startsWith($link, '//')) {
                        $link = 'https:' . $link;
                    } elseif (Str::startsWith($link, '/')) {
                        $link = 'https://www.suaramerdeka.com' . $link;
                    }

                    // Pastikan link berasal dari Suara Merdeka
                    $host = parse_url($link, PHP_URL_HOST);

                    if (
                        !$host ||
                        !preg_match('/(^|\.)suaramerdeka\.com$/i', $host)
                    ) {
                        continue;
                    }

                    if (in_array($link, $urlTerpakai)) {
                        continue;
                    }

                    // Hindari link kategori atau halaman umum
                    if (
                        preg_match('/\/(tag|kategori|category|author)\//i', $link)
                    ) {
                        continue;
                    }

                    $urlTerpakai[] = $link;

                    // Cari gambar di sekitar judul
                    $gambar = null;
                    $container = $judulNode;

                    for ($i = 0; $i < 5 && $container; $i++) {

                        $gambarNode = $xpath->query(
                            './/img',
                            $container
                        )->item(0);

                        if ($gambarNode) {

                            $gambar =
                                $gambarNode->getAttribute('data-src') ?:
                                $gambarNode->getAttribute('data-original') ?:
                                $gambarNode->getAttribute('src');

                            if (!$gambar) {
                                $srcset = $gambarNode->getAttribute('srcset');

                                if ($srcset) {
                                    $gambar = trim(explode(',', $srcset)[0]);
                                    $gambar = trim(explode(' ', $gambar)[0]);
                                }
                            }

                            if ($gambar) {
                                break;
                            }
                        }

                        $container = $container->parentNode;
                    }

                    // Normalisasi URL gambar
                    if ($gambar && Str::startsWith($gambar, '//')) {
                        $gambar = 'https:' . $gambar;
                    } elseif ($gambar && Str::startsWith($gambar, '/')) {
                        $gambar = 'https://www.suaramerdeka.com' . $gambar;
                    }

                    // Cari tanggal dari teks di sekitar judul
                    $teksSekitar = $judulNode->parentNode
                        ? $judulNode->parentNode->textContent
                        : '';

                    $tanggal = null;

                    if (preg_match(
                        '/(Senin|Selasa|Rabu|Kamis|Jumat|Sabtu|Minggu),?\s+\d{1,2}\s+[A-Za-z]+\s+\d{4}(?:\s*\|\s*\d{2}:\d{2}\s*WIB)?/iu',
                        $teksSekitar,
                        $match
                    )) {
                        $tanggal = trim($match[0]);
                    }

                    // Ambil kategori jika tersedia
                    $kategori = 'Berita Suara Merdeka';

                    $parent = $judulNode->parentNode;

                    if ($parent) {
                        $kategoriNode = $xpath->query(
                            './/h4',
                            $parent
                        )->item(0);

                        if ($kategoriNode) {
                            $kategoriText = trim($kategoriNode->textContent);

                            if ($kategoriText !== '') {
                                $kategori = $kategoriText;
                            }
                        }
                    }

                    $berita[] = [
                        'judul' => $judul,
                        'link' => $link,
                        'gambar' => $gambar,
                        'kategori' => $kategori,
                        'tanggal' => $tanggal,
                    ];

                    if (count($berita) >= 6) {
                        break;
                    }
                }

                libxml_clear_errors();

                return $berita;

            } catch (\Throwable $e) {

                report($e);

                return [];
            }
        });
    }
}
