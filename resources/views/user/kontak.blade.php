<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak & Link - @GNESA Batik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fcfaff; color: #333; margin: 0; padding: 0; }
        .navbar-brand { font-weight: 600; letter-spacing: 2px; color: #a066cb !important; }
        .navbar .container {max-width: 1300px;}
        .banner-container-full {
            width: 100%;
            height: 350px;
            overflow: hidden;
            /* Hapus radius di sini agar lancip sempurna */
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            margin-bottom: 30px; /* Jarak ke konten di bawahnya */
        }
        .link-box-full {
            background: #fff;
            border: 1px solid #f0f0f0;
            border-radius: 50px;
            padding: 15px 25px;
            display: flex;
            align-items: center;
            justify-content: center; /* Teks di tengah */
            transition: 0.3s;
            text-decoration: none !important;
            color: #333;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            margin-bottom: 15px;
            position: relative; /* Buat naruh panah */
        }
        .link-box-full:hover {
            background: #fafafa;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(160, 102, 203, 0.1);
            color: #a066cb;
        }
        .icon-platform {
            width: 28px;
            height: 28px;
            object-fit: contain;
            position: absolute;
            left: 25px; /* Icon di kiri */
        }
        .arrow-icon {
            position: absolute;
            right: 25px; /* Panah di kanan */
            color: #ccc;
            font-size: 14px;
        }
        .text-purple { color: #a066cb; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="#">@GNESA</a>
        <div class="d-flex gap-4 align-items-center">
            <a href="{{ route('user.index') }}" class="text-muted text-decoration-none small">Beranda</a>
            <a href="{{ route('user.sejarah') }}" class="text-muted text-decoration-none small">Sejarah</a>
            <a href="{{ route('user.produk') }}" class="text-muted text-decoration-none small">Produk</a>
            <a href="{{ route('user.kontak') }}" class="text-purple text-decoration-none small fw-bold">Kontak</a>
            <a href="{{ route('logout') }}" class="text-danger text-decoration-none small">Log Out</a>
        </div>
    </div>
</nav>

<div class="banner-container-full">
    <img src="{{ asset('assets/kontak.jpg') }}" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
</div>

<div class="container">
    <div class="text-center mt-2">
        <p class="text-muted mb-0" style="font-size: 13px; font-weight: 300; letter-spacing: 0.5px;">
            📍 Jl. Ciroyom No.20, Nagarasari, Kec. Cipedes, Tasikmalaya
        </p>
    </div>

    <div class="text-center mt-4 mb-5">
        <h5 class="fw-normal mb-1" style="letter-spacing: 2px; font-size: 18px;">HUBUNGI KAMI</h5>
        <div class="mx-auto" style="width: 40px; height: 3px; background: #d1b3e2; border-radius: 10px;"></div>
    </div>

    <div class="mx-auto" style="max-width: 500px; padding-bottom: 50px;">
        @forelse($links as $link)
            <a href="{{ $link->url }}" target="_blank" class="link-box-full">
                <img src="https://img.icons8.com/color/48/000000/{{ strtolower($link->nama_platform) }}.png"
                     class="icon-platform"
                     onerror="this.src='https://img.icons8.com/color/48/000000/link.png'">

                <span class="fw-normal" style="letter-spacing: 0.5px;">{{ $link->nama_platform }}</span>

                <span class="arrow-icon">→</span>
            </a>
        @empty
            <div class="text-center py-5">
                <p class="text-muted">Belum ada link kontak yang tersedia.</p>
            </div>
        @endforelse
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
