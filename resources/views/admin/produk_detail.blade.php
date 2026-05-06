<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Koleksi - @gnesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fcfaff; color: #333; }
        .navbar { background: #fff !important; border-bottom: 1px solid #f0f0f0; }
        .btn-add { background: #1a1a1a; color: #fff; border-radius: 12px; padding: 8px 20px; font-size: 14px; font-weight: 300; transition: 0.3s; border:none; }
        .product-card { border: none; border-radius: 25px; background: #fff; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.02); transition: 0.3s; }
        .img-wrapper { height: 200px; overflow: hidden; background: #f9f9f9; }
        .img-wrapper img { width: 100%; height: 100%; object-fit: cover; }
        .action-link { text-decoration: none; color: #888; font-size: 13px; font-weight: 300; cursor: pointer; }
        .alert-custom { border-radius: 15px; border: none; font-weight: 300; font-size: 14px; }
    </style>
</head>
<body>

<nav class="navbar py-3 sticky-top">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <a href="{{ route('admin.produk') }}" class="text-muted text-decoration-none small">← Kembali</a>
            <h5 class="mt-2 fw-normal mb-0">Koleksi: {{ $koleksi->nama_kategori }}</h5>
        </div>
        <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Produk</button>
    </div>
</nav>

<div class="container my-5">
    <div class="row g-4">
        @forelse($produk as $item)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card product-card h-100 shadow-sm">
                <div class="img-wrapper" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id_produk }}">
                    <img src="{{ asset('assets/' . $item->foto_produk) }}" alt="{{ $item->nama_produk }}">
                </div>

                <div class="card-body p-4 text-start">
                    <h4 class="product-name fs-6 fw-normal mb-1 text-truncate">{{ $item->nama_produk }}</h4>
                    <p class="text-muted small">Rp {{ number_format($item->harga_produk, 0, ',', '.') }}</p>

                    <div class="d-flex gap-3 mt-3 pt-3 border-top">
                        <a class="action-link" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id_produk }}">Edit</a>
                        <a href="{{ route('produk_detail.hapus', $item->id_produk) }}" onclick="return confirm('Hapus?')" class="action-link text-danger-soft">Hapus</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalDetail{{ $item->id_produk }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="border-radius: 20px; border: none; overflow: hidden;">
                    <div class="modal-body p-0">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="{{ asset('assets/' . $item->foto_produk) }}" class="w-100 h-100" style="object-fit: cover; min-height: 400px;">
                            </div>
                            <div class="col-md-6 p-5 d-flex flex-column justify-content-center position-relative">
                                <button type="button" class="btn-close position-absolute top-0 end-0 m-4" data-bs-dismiss="modal"></button>
                                <h3 class="fw-normal mb-1">{{ $item->nama_produk }}</h3>
                                <h4 class="text-primary mb-4" style="font-weight: 500; color: #d899f5 !important;">Rp {{ number_format($item->harga_produk, 0, ',', '.') }}</h4>
                                <div>
                                    <p class="text-muted small mb-1" style="letter-spacing: 1px; text-transform: uppercase;">Deskripsi</p>
                                    <p class="text-secondary" style="line-height: 1.8; font-size: 14px; font-weight: 300;">
                                        {{ $item->deskripsi_produk ?? 'Tidak ada deskripsi.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalEdit{{ $item->id_produk }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 25px; border: none; padding: 20px;">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-normal">Edit Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('produk_detail.update', $item->id_produk) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body text-start">
                            <div class="mb-3">
                                <label class="small text-muted">Nama Motif</label>
                                <input type="text" name="nama_produk" class="form-control" value="{{ $item->nama_produk }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="small text-muted">Harga (Tulis angka saja, misal: 150000)</label>
                                <input type="number" name="harga" class="form-control" value="{{ $item->harga_produk }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="small text-muted">Deskripsi Produk</label>
                                <textarea name="deskripsi" class="form-control" rows="4">{{ $item->deskripsi_produk }}</textarea>
                            </div>

                            </div>
                        <button type="submit" class="btn btn-dark w-100">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>

        @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted fw-light">Belum ada produk.</p>
        </div>
        @endforelse
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 25px; border: none; padding: 20px;">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-normal">Tambah Produk Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('produk_detail.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_kategori" value="{{ $koleksi->id_kategori }}">
                <div class="modal-body text-start">
                    <div class="mb-3">
                        <label class="form-label small text-muted">Nama Motif</label>
                        <input type="text" name="nama_produk" class="form-control" style="border-radius: 12px;" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-muted">Harga</label>
                        <input type="number" name="harga" class="form-control" style="border-radius: 12px;" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-muted">Deskripsi Produk</label>
                        <textarea name="deskripsi" class="form-control" rows="3" style="border-radius: 12px;" placeholder="Ceritakan detail produknya di sini..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small text-muted">Foto Produk</label>
                        <input type="file" name="foto_produk" class="form-control" style="border-radius: 12px;" required>
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
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.getElementById('auto-alert');
        if (alert) {
            setTimeout(function() {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = "0";
                setTimeout(function() { alert.remove(); }, 500);
            }, 3000);
        }
    });
</script>
</body>
</html>
