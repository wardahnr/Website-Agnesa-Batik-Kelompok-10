<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - @gnesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fcfaff; color: #333; }
        .navbar { background: #fff !important; border-bottom: 1px solid #f0f0f0; padding: 20px 0; }
        .brand-logo { color: #d899f5; font-size: 24px; letter-spacing: -1px; font-weight: 500; text-decoration: none; }
        .menu-card {
            border: none;
            border-radius: 30px;
            background: #fff;
            transition: all 0.4s ease;
            cursor: pointer;
            box-shadow: 0 10px 40px rgba(0,0,0,0.02);
            height: 100%;
        }
        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(216, 153, 245, 0.15);
        }
        .icon-box {
            width: 80px;
            height: 80px;
            background-color: #fcfaff;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            transition: 0.3s;
        }
        .menu-card:hover .icon-box { background-color: #f4e8ff; }
        .menu-title { font-weight: 400; font-size: 20px; color: #1a1a1a; margin-bottom: 10px; }
        .menu-desc { font-weight: 300; color: #aaa; font-size: 14px; line-height: 1.6; }
        .btn-manage {
            background: #1a1a1a;
            color: #fff;
            border-radius: 12px;
            padding: 10px 25px;
            font-size: 14px;
            font-weight: 300;
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn-manage:hover { background: #333; color: #fff; }
        .logout-link { color: #eb5757; font-weight: 300; font-size: 14px; text-decoration: none; opacity: 0.7; }
        .logout-link:hover { opacity: 1; }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="brand-logo" href="{{ route('admin.dashboard') }}">@gnesa</a>
        <a href="{{ route('logout') }}" class="text-danger text-decoration-none">Log Out</a>
    </div>
</nav>

<div class="container" style="margin-top: 80px; margin-bottom: 80px;">
    <div class="text-center mb-5">
        <h2 class="fw-normal" style="letter-spacing: -0.5px;">Selamat Datang Kembali</h2>
        <p class="text-muted fw-light">Pilih modul yang ingin Anda kelola hari ini.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-5 col-lg-4">
            <a href="{{ route('admin.produk') }}" class="text-decoration-none">
                <div class="card menu-card p-5 text-center">
                    <div class="icon-box">
                        <img src="https://cdn-icons-png.flaticon.com/512/679/679821.png" width="35" style="opacity: 0.7;">
                    </div>
                    <h3 class="menu-title">Katalog Produk</h3>
                    <p class="menu-desc">Kelola motif batik, kategori, deskripsi, dan harga produk.</p>
                    <span class="btn-manage">Buka Katalog</span>
                </div>
            </a>
        </div>

        <div class="col-md-5 col-lg-4">
            <a href="{{ route('admin.kontak') }}" class="text-decoration-none">
                <div class="card menu-card p-5 text-center">
                    <div class="icon-box">
                        <img src="https://cdn-icons-png.flaticon.com/512/2099/2099122.png" width="35" style="opacity: 0.7;">
                    </div>
                    <h3 class="menu-title">Kontak & Link</h3>
                    <p class="menu-desc">Update nomor WhatsApp, link Instagram, dan media sosial lainnya.</p>
                    <span class="btn-manage">Edit Kontak</span>
                </div>
            </a>
        </div>
    </div>
</div>

</body>
</html>
