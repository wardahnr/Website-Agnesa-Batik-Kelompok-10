<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - @gnesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fcfaff; color: #333; }
        .navbar { background: #fff !important; border-bottom: 1px solid #f0f0f0; }
        .brand-logo { color: #d899f5; font-size: 20px; letter-spacing: -1px; font-weight: 500; text-decoration: none; }

        .btn-add { background: #1a1a1a; color: #fff; border-radius: 12px; padding: 8px 20px; font-size: 14px; font-weight: 300; transition: 0.3s; text-decoration: none; }
        .btn-add:hover { background: #333; color: #fff; }

        .product-card {
            border: none;
            border-radius: 25px;
            background: #fff;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.02);
            transition: 0.3s;
        }
        .product-card:hover { transform: translateY(-5px); }

        .img-wrapper { height: 220px; overflow: hidden; background: #f9f9f9; }
        .img-wrapper img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
        .product-card:hover img { scale: 1.05; }

        .product-name { font-weight: 400; color: #1a1a1a; font-size: 15px; margin-bottom: 5px; }
        .product-category { font-weight: 300; color: #aaa; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; }

        .action-link { text-decoration: none; color: #888; font-size: 13px; font-weight: 300; transition: 0.3s; cursor: pointer; }
        .action-link:hover { color: #1a1a1a; }
        .text-danger-soft { color: #eb5757; opacity: 0.6; }
        .text-danger-soft:hover { opacity: 1; }

        .alert-custom { border-radius: 15px; border: none; font-weight: 300; font-size: 14px; }
    </style>
</head>
<body>

<nav class="navbar py-3 sticky-top">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <a href="{{ route('admin.dashboard') }}" class="text-muted text-decoration-none small">← Kembali</a>
            <span class="mx-2 text-muted opacity-25">|</span>
            <a class="brand-logo" href="#">Katalog Produk</a>
        </div>
        <button class="btn-add border-0" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Produk Baru</button>
    </div>
</nav>

<div class="container my-5">
    @if(session('success'))
        <div id="auto-alert" class="alert alert-success alert-custom mb-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        @forelse($kategori as $item)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card product-card h-100">
                <a href="{{ route('koleksi.detail', $item->id_kategori) }}" class="text-decoration-none">
                    <div class="img-wrapper">
                        <img src="{{ asset('assets/' . $item->foto_kategori) }}" alt="Motif">
                    </div>
                </a>

                <div class="card-body p-4 text-start">
                    <p class="product-category mb-1">Batik Agnesa</p>

                    <a href="{{ route('koleksi.detail', $item->id_kategori) }}" class="text-decoration-none text-dark">
                        <h4 class="product-name">{{ $item->nama_kategori }}</h4>
                    </a>

                    <div class="d-flex gap-3 mt-4 pt-3 border-top">
                        <a class="action-link" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id_kategori }}">Edit</a>
                        <a href="{{ route('produk.hapus', $item->id_kategori) }}" onclick="return confirm('Hapus?')" class="action-link text-danger-soft">Hapus</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalEdit{{ $item->id_kategori }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 25px; border: none; padding: 20px;">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-normal">Edit Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('produk.update', $item->id_kategori) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body text-start">
                            <div class="mb-3">
                                <label class="form-label small text-muted">Nama Produk</label>
                                <input type="text" name="nama" class="form-control" value="{{ $item->nama_kategori }}" style="border-radius: 12px;" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small text-muted">Ganti Foto (Kosongkan jika tidak diubah)</label>
                                <input type="file" name="foto" class="form-control" style="border-radius: 12px;">
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-dark w-100" style="border-radius: 12px;">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted fw-light">Belum ada data produk ditemukan.</p>
        </div>
        @endforelse
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 25px; border: none; padding: 20px;">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-normal">Tambah Produk Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-start">
                    <div class="mb-3">
                        <label class="form-label small text-muted">Nama Produk</label>
                        <input type="text" name="nama" class="form-control" style="border-radius: 12px;" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-muted">Foto Batik</label>
                        <input type="file" name="foto" class="form-control" style="border-radius: 12px;" required>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-dark w-100" style="border-radius: 12px;">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Kode untuk menghilangkan alert otomatis
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.getElementById('auto-alert');
        if (alert) {
            setTimeout(function() {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = "0";
                setTimeout(function() {
                    alert.remove();
                }, 500);
            }, 3000);
        }
    });
</script>
</body>
</html>
