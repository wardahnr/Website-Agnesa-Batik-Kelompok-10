<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - @GNESA Batik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
       body { font-family: 'Poppins', sans-serif; background-color: #fcfaff; color: #333; margin: 0; padding: 0; }
        .navbar-brand { font-weight: 600; letter-spacing: 2px; color: #a066cb !important; }
        .navbar .container {
            max-width: 1300px;
        }
        /* Gaya Lingkaran Foto Besar */
        .circle-image-container {
            width: 450px;
            height: 450px;
            border-radius: 50%;
            overflow: hidden;
            border: 25px solid #f3e5f5; /* Warna ungu muda melingkar */
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            margin-left: auto;
        }

        .dot-indicator {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: inline-block;
        }

        .gallery-img {
            border-radius: 20px;
            height: 180px;
            width: 100%;
            object-fit: cover;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .text-purple { color: #a066cb; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand" href="#">@GNESA</a>
            <div class="d-flex gap-4">
                <a href="{{ route('user.index') }}" class="text-muted text-decoration-none small">Beranda</a>
                <a href="{{ route('user.sejarah') }}" class="text-purple text-decoration-none small fw-bold">Sejarah</a>
                <a href="{{ route('user.produk') }}" class="text-muted text-decoration-none small">Produk</a>
                <a href="{{ route('user.kontak') }}" class="text-muted text-decoration-none small">Kontak</a>
                <a href="{{ route('logout') }}" class="text-danger text-decoration-none small">Log Out</a>
            </div>
        </div>
    </nav>

    <div class="container py-5 mt-3">
        <div class="row align-items-center">

            <div class="col-md-6 pe-md-5">
                <h1 class="fw-bold mb-1" style="font-size: 42px;">Tentang Kami</h1>
                <h2 class="fw-bold text-purple mb-4" style="font-size: 38px;">@gnesa Batik</h2>

                <div class="d-flex gap-2 mb-5">
                    <div class="dot-indicator" style="background: #a066cb;"></div>
                    <div class="dot-indicator" style="background: #d1b3e2;"></div>
                    <div class="dot-indicator" style="background: #f3e5f5;"></div>
                </div>

                <h5 class="fw-bold mb-3">Pusat Produksi Batik Terpercaya</h5>
                <p class="fst-italic text-muted mb-4">"Kami tidak hanya memproduksi Batik - Kami merangkai cerita"</p>

                <div style="text-align: justify; line-height: 1.8; color: #555; font-size: 15px;">
                    <p>Agnesa Batik didirikan sejak 1970 di Tasikmalaya untuk mengembangkan batik cap & tulis tradisional. Khas dengan motif alam seperti motif “batu numpuk”, “daun kadaka”, “awi nagaramat”, dan “kendi”, dipadukan warna cerah seperti biru, kuning, hijau, oranye, merah, cokelat.</p>
                    <p>Produk utamanya yaitu kain batik tulis (katun, ukuran ±2×1,5 m), dengan pewarna alam atau sintetis dan desain eksklusif. Produk dengan kualitas tangan, kekayaan motif lokal, serta keragaman warna yang ceria menghadirkan warisan budaya Tasikmalaya yang autentik dan dinamis.</p>
                </div>
            </div>

            <div class="col-md-6 text-end">
                <div class="circle-image-container">
                    <img src="{{ asset('assets/pengrajin.jpg') }}" class="w-100 h-100" style="object-fit: cover;">
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4 justify-content-center">
            <div class="col-md-3 col-4">
                <img src="{{ asset('assets/sejarah1.jpg') }}" class="gallery-img">
            </div>
            <div class="col-md-3 col-4">
                <img src="{{ asset('assets/sejarah2.png') }}" class="gallery-img">
            </div>
            <div class="col-md-3 col-4">
                <img src="{{ asset('assets/sejarah3.jpeg') }}" class="gallery-img">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
