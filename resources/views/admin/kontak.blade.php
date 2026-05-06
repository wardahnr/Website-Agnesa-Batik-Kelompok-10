<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Links - @gnesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fcfaff; color: #333; }
        .link-card {
            background: #fff;
            border: none;
            border-radius: 20px;
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }
        .link-card:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
        .btn-add-link {
            background: #f3e5f5;
            color: #a066cb;
            border: 2px dashed #d1b3e2;
            border-radius: 20px;
            padding: 15px;
            font-weight: 500;
            transition: 0.3s;
        }
        .btn-add-link:hover { background: #ecd9f1; }
        .icon-circle {
            width: 45px;
            height: 45px;
            background: #f8f9fa;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .link-box-full {
            background: #fff;
            border: 1px solid #f0f0f0;
            border-radius: 50px; /* Lonjong sempurna */
            padding: 12px 25px;
            display: flex;
            align-items: center;
            transition: 0.3s;
            text-decoration: none !important; /* Biar link gak biru/garis bawah */
            color: #333;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        }
        .link-box-full:hover {
            background: #fafafa;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.06);
            color: #a066cb; /* Teks berubah ungu pas di-hover */
        }
        .icon-platform {
            width: 24px;
            height: 24px;
            object-fit: contain;
            margin-right: 15px;
        }

    </style>
</head>
<body>

<div class="position-absolute top-0 start-0 m-4" style="z-index: 10;">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-white shadow-sm d-flex align-items-center justify-content-center"
       style="border-radius: 50%; width: 45px; height: 45px; background: rgba(255,255,255,0.7); backdrop-filter: blur(5px); border: none; text-decoration: none; color: #333;">
        ←
    </a>
</div>

<div class="w-100" style="height: 350px; overflow: hidden; border-bottom-left-radius: 50px; border-bottom-right-radius: 50px;">
    <img src="{{ asset('assets/kontak.jpg') }}"
         style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
</div>

<div class="text-center mt-3">
        <p class="text-muted mb-0" style="font-size: 11px; font-weight: 300; letter-spacing: 0.5px;">
            📍 Jl. Ciroyom No.20, Nagarasari, Kec. Cipedes, Tasikmalaya
        </p>
    </div>

    <div class="text-center mt-4 mb-4">
        <h5 class="fw-normal mb-1" style="letter-spacing: 1px;">Kontak & Link</h5>
        <div class="mx-auto" style="width: 30px; height: 2px; background: #d1b3e2; border-radius: 10px;"></div>
    </div>

   <button class="btn btn-add-link w-50 mb-4 mx-auto d-block" data-bs-toggle="modal" data-bs-target="#modalTambahLink">
    + Tambah Link Baru
    </button>

    <div class="list-links mt-4 mx-auto" style="max-width: 500px;">
        @forelse($links as $link)
        <div class="position-relative mb-3 d-flex align-items-center">

            <a href="{{ $link->url }}" target="_blank" class="link-box-full w-100">
                <img src="https://img.icons8.com/color/24/000000/{{ strtolower($link->nama_platform) }}.png"
                    class="icon-platform"
                    onerror="this.src='https://img.icons8.com/color/24/000000/link.png'">

                <span class="fw-normal" style="letter-spacing: 0.5px;">{{ $link->nama_platform }}</span>
            </a>

            <div class="ms-3 d-flex gap-2">
                <button class="btn btn-sm btn-light rounded-circle" data-bs-toggle="modal" data-bs-target="#modalEditLink{{ $link->id }}" style="width: 35px; height: 35px;">
                    ✏️
                </button>
                <a href="{{ route('link.hapus', $link->id) }}" class="btn btn-sm btn-light rounded-circle text-danger" onclick="return confirm('Hapus link?')" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                    ✕
                </a>
            </div>
        </div>

        <div class="modal fade" id="modalEditLink{{ $link->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 25px; border:none; padding: 20px;">
                    <form action="{{ route('link.update', $link->id) }}" method="POST">
                        @csrf
                        <div class="modal-body text-start">
                            <div class="mb-3">
                                <label class="small text-muted">Platform</label>
                                <select name="nama_platform" class="form-select" style="border-radius: 12px;">
                                    <option value="Instagram" {{ $link->nama_platform == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                                    <option value="WhatsApp" {{ $link->nama_platform == 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
                                    <option value="Shopee" {{ $link->nama_platform == 'Shopee' ? 'selected' : '' }}>Shopee</option>
                                    <option value="TikTok" {{ $link->nama_platform == 'TikTok' ? 'selected' : '' }}>TikTok</option>
                                    <option value="Facebook" {{ $link->nama_platform == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="small text-muted">URL Link</label>
                                <input type="url" name="url" class="form-control" value="{{ $link->url }}" style="border-radius: 12px;" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 py-3" style="border-radius: 15px;">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center text-muted py-4">Belum ada link aktif.</p>
        @endforelse
    </div>
</div>

<div class="modal fade" id="modalTambahLink" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 25px; border:none; padding: 20px;">
            <div class="modal-header border-0">
                <h5 class="fw-normal">Tambah Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('link.store') }}" method="POST">
                @csrf
                <div class="modal-body text-start">
                    <div class="mb-3">
                        <label class="small text-muted">Pilih Platform</label>
                        <select name="nama_platform" class="form-select" style="border-radius: 12px;" required>
                            <option value="Instagram">Instagram</option>
                            <option value="WhatsApp">WhatsApp</option>
                            <option value="Shopee">Shopee</option>
                            <option value="TikTok">TikTok</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Email">Email</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="small text-muted">URL / Link</label>
                        <input type="url" name="url" class="form-control" placeholder="https://..." style="border-radius: 12px;" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark w-100 py-3" style="border-radius: 15px;">Tambah Sekarang</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
