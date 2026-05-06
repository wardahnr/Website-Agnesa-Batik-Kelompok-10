<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Koleksi - @GNESA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
       body { font-family: 'Poppins', sans-serif; background-color: #fcfaff; color: #333; margin: 0; padding: 0; }
        .navbar-brand { font-weight: 600; letter-spacing: 2px; color: #a066cb !important; }
        .navbar .container {
            max-width: 1300px;
        }
        .card-kategori {
            border: none;
            border-radius: 15px;
            background: #fff;
            transition: all 0.3s ease;
            text-align: center;
            overflow: hidden;
        }
        .card-kategori:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(160, 102, 203, 0.15) !important;
        }
        .icon-box {
            width: 70px;
            height: 70px;
            background-color: #f3e5f5;
            color: #a066cb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 24px;
        }
        .text-purple { color: #a066cb; }
        .btn-lihat {
            background-color: #a066cb;
            color: white;
            border-radius: 8px;
            font-size: 13px;
            padding: 8px 20px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
        .card { transition: 0.3s; }
        .card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand" href="#">@GNESA</a>
            <div class="d-flex gap-4">
                <a href="{{ route('user.index') }}" class="text-muted text-decoration-none small">Beranda</a>
                <a href="{{ route('user.sejarah') }}" class="text-muted text-decoration-none small">Sejarah</a>
                <a href="{{ route('user.produk') }}" class="text-purple text-decoration-none small fw-bold">Produk</a>
                <a href="{{ route('user.kontak') }}" class="text-muted text-decoration-none small">Kontak</a>
                <a href="{{ route('logout') }}" class="text-danger text-decoration-none small">Log Out</a>
            </div>
        </div>
    </nav>


    <div class="container py-5">
        <div class="mb-4">
            <h4 class="fw-bold" style="color: #a066cb;">Katalog Produk</h4>
        </div>

        <div class="row g-4">
            @foreach($kategori as $k)
            <div class="col-md-3">
                <a href="{{ route('user.koleksi', $k->id_kategori) }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 20px; overflow: hidden; transition: 0.3s;">

                        <img src="{{ asset('assets/' . $k->foto_kategori) }}" class="card-img-top" style="height: 200px; object-fit: cover;">

                        <div class="card-body p-3">
                            <p class="text-muted small mb-1" style="letter-spacing: 1px;">BATIK AGNESA</p>
                            <h6 class="fw-bold text-dark">{{ $k->nama_kategori }}</h6>
                            <hr class="my-2" style="opacity: 0.1;">
                            <p class="small mb-0 fw-bold" style="color: #a066cb;">Lihat Koleksi →</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
