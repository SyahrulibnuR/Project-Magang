<?php

namespace App\Notifications;

use App\Models\Pengaduan;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PengaduanDitanggapi extends Notification
{
    use Queueable;

    protected $pengaduan;

    public function __construct(Pengaduan $pengaduan)
    {
        $this->pengaduan = $pengaduan;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Tanggapan Pengaduan Baru',
            'message' => 'Admin telah memberikan tanggapan terhadap pengaduan Anda.',
            'ticket_number' => $this->pengaduan->ticket_number,
            'complaint_id' => $this->pengaduan->id,
            'admin_response' => $this->pengaduan->admin_response,
            'status' => $this->pengaduan->status,
        ];
    }
}
