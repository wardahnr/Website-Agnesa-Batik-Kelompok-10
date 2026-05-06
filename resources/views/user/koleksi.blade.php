<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Koleksi - @GNESA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <a href="{{ route('user.produk') }}" class="text-decoration-none text-muted small">← Kembali</a>
        <h4 class="text-purple fw-bold mt-2">Koleksi {{ $kategori_nama->nama_kategori }}</h4>
    </div>

    <div class="row g-4">
        @foreach($produk as $p)
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px; cursor: pointer; overflow: hidden;"
                 data-bs-toggle="modal" data-bs-target="#detail{{ $p->id_produk }}">

                <img src="{{ asset('assets/'.$p->foto_produk) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body p-3">
                    <p class="text-muted small mb-1">BATIK AGNESA</p>
                    <h6 class="fw-bold text-dark">{{ $p->nama_produk }}</h6>
                    <p class="text-purple fw-bold mb-0">Rp {{ number_format($p->harga_produk, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

       <div class="modal fade" id="detail{{ $p->id_produk }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="border-radius: 25px; border: none; overflow: hidden;">

                    <div class="modal-header border-0 pb-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="box-shadow: none;"></button>
                    </div>

                    <div class="modal-body p-4 pt-0"> {{-- pt-0 supaya jarak ke atas gak kejauhan setelah ada header --}}
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <img src="{{ asset('assets/'.$p->foto_produk) }}" class="img-fluid rounded-4 shadow-sm">
                            </div>
                            <div class="col-md-7">
                                <h3 class="fw-bold mb-1">{{ $p->nama_produk }}</h3>
                                <h4 class="fw-bold mb-4" style="color: #a066cb;">Rp {{ number_format($p->harga_produk, 0, ',', '.') }}</h4>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-muted small">KETERANGAN:</h6>
                                    <p class="text-muted" style="font-size: 14px;">{{ $p->deskripsi_produk }}</p>
                                </div>

                                <a href="{{ route('user.kontak') }}" class="btn w-100 py-3 text-white fw-bold" style="background: #a066cb; border-radius: 12px;">Hubungi Admin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
