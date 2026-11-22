
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan | SM Customer Care</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            margin: 0;
            padding: 35px;
            background: #f3f8ff;
            color: #263b53;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .back {
            display: inline-block;
            color: #3689df;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 22px;
        }

        .heading {
            margin-bottom: 25px;
        }

        .heading h1 {
            color: #25496d;
            font-size: 25px;
        }

        .heading p {
            color: #8ba0b5;
            font-size: 12px;
            margin-top: 8px;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 27px;
            margin-bottom: 20px;
            box-shadow: 0 4px 18px rgba(50,90,130,.04);
        }

        .card h3 {
            color: #345675;
            font-size: 16px;
            margin-bottom: 22px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .field label {
            display: block;
            font-size: 11px;
            color: #91a6ba;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .field p {
            color: #345675;
            font-size: 13px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .description {
            white-space: pre-line;
            background: #f7faff;
            border-radius: 10px;
            padding: 18px;
            color: #526d87;
            font-size: 13px;
            line-height: 1.9;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #526d87;
            margin-bottom: 9px;
        }

        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid #e0eaf3;
            border-radius: 9px;
            outline: none;
            background: #fafdff;
            font-size: 13px;
            color: #345675;
        }

        .form-group textarea {
            min-height: 140px;
            resize: vertical;
        }

        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #3689df;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border: none;
            border-radius: 9px;
            background: #3689df;
            color: white;
            cursor: pointer;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
        }

        .alert {
            background: #e8f8ef;
            color: #268653;
            border-radius: 9px;
            padding: 13px;
            margin-bottom: 18px;
            font-size: 12px;
        }

        .error {
            color: #dc5555;
            font-size: 11px;
            margin-top: 7px;
        }

        @media(max-width: 650px) {
            body {
                padding: 18px 12px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('admin.complaints.index') }}" class="back">
        <i class="fa-solid fa-arrow-left"></i>
        Kembali ke Data Pengaduan
    </a>

    <div class="heading">
        <h1>Detail Pengaduan</h1>
        <p>Periksa informasi pengaduan dan berikan tanggapan kepada pelanggan.</p>
    </div>

    @if(session('success'))
        <div class="alert">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    <section class="card">

        <h3><i class="fa-solid fa-file-lines"></i> Informasi Pengaduan</h3>

        <div class="grid">

            <div class="field">
                <label>NOMOR TIKET</label>
                <p>{{ $complaint->ticket_number }}</p>
            </div>

            <div class="field">
                <label>TANGGAL PENGADUAN</label>
                <p>{{ $complaint->created_at->format('d F Y, H:i') }}</p>
            </div>

            <div class="field">
                <label>NAMA PELANGGAN</label>
                <p>{{ $complaint->user->name ?? '-' }}</p>
            </div>

            <div class="field">
                <label>EMAIL PELANGGAN</label>
                <p>{{ $complaint->user->email ?? '-' }}</p>
            </div>

            <div class="field">
                <label>KATEGORI</label>
                <p>{{ $complaint->category }}</p>
            </div>

            <div class="field">
                <label>JUDUL PENGADUAN</label>
                <p>{{ $complaint->title }}</p>
            </div>

        </div>

        <div class="field" style="margin-top:25px;">
            <label>ISI PENGADUAN</label>
            <div class="description">{{ $complaint->description }}</div>
        </div>

    </section>


    <section class="card">

        <h3><i class="fa-solid fa-reply"></i> Tanggapan Administrator</h3>

        <form method="POST"
              action="{{ route('admin.complaints.update', $complaint->id) }}">

            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="status">Status Pengaduan</label>

                <select name="status" id="status" required>
                    <option value="Baru" {{ old('status', $complaint->status) === 'Baru' ? 'selected' : '' }}>
                        Baru
                    </option>

                    <option value="Diproses" {{ old('status', $complaint->status) === 'Diproses' ? 'selected' : '' }}>
                        Diproses
                    </option>

                    <option value="Selesai" {{ old('status', $complaint->status) === 'Selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>

                    <option value="Ditutup" {{ old('status', $complaint->status) === 'Ditutup' ? 'selected' : '' }}>
                        Ditutup
                    </option>
                </select>

                @error('status')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="admin_response">Tanggapan untuk Pelanggan</label>

                <textarea
                    name="admin_response"
                    id="admin_response"
                    placeholder="Tuliskan tanggapan atau solusi untuk pelanggan..."
                >{{ old('admin_response', $complaint->admin_response) }}</textarea>

                @error('admin_response')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            @if($complaint->responder)
                <p style="font-size:11px;color:#8ba0b5;margin-bottom:18px;">
                    Tanggapan terakhir oleh {{ $complaint->responder->name }}
                    @if($complaint->responded_at)
                        pada {{ $complaint->responded_at->format('d/m/Y H:i') }}
                    @endif
                </p>
            @endif

            <button type="submit" class="btn">
                <i class="fa-solid fa-floppy-disk"></i>
                Simpan Perubahan
            </button>

        </form>

    </section>

</div>

</body>
</html>
