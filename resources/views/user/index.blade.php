<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - @GNESA Batik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fcfaff; color: #333; margin: 0; padding: 0; }
        .navbar-brand { font-weight: 600; letter-spacing: 2px; color: #a066cb !important; }
        .navbar .container {max-width: 1300px;}
        .hero-banner {
            background: #f3e5f5;
            border-radius: 30px;
            padding: 60px 20px;
            border: 1px dashed #d1b3e2;
        }
        .card-produk {
            border: none;
            border-radius: 20px;
            transition: 0.3s;
            overflow: hidden;
        }
        .card-produk:hover { transform: translateY(-10px); }
        .btn-purple { background: #a066cb; color: white; border-radius: 12px; padding: 10px 25px; border: none; }
        .btn-purple:hover { background: #8e55b7; color: white; }

        .card {
            transition: 0.3s;
            background: #ffffff;
        }

        .card:hover {
            box-shadow: 0 10px 30px rgba(160, 102, 203, 0.1) !important;
        }

        .text-purple {
            color: #a066cb;
        }

        .welcome-box {
            background-color: #f3d7ff;
            padding: 80px 40px;
            border-radius: 40px; /* Sudut tumpul sesuai desain baru */
            max-width: 1000px;
            margin: 0 auto;
            border: none;
        }

        .welcome-title {
            font-weight: 500;
            color: #444;
            font-size: 3rem;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .welcome-desc {
            max-width: 800px;
            font-size: 1.3rem;
            color: #555;
            line-height: 1.6;
            font-weight: 300;
        }

        .dot-big {
            width: 45px;
            height: 45px;
            border-radius: 50%;
        }

        .dot-small {
            width: 12px;
            height: 12px;
            background-color: #e0e0e0;
            border-radius: 50%;
            margin-left: 10px;
        }

    /* Responsif buat HP */
    @media (max-width: 768px) {
        .welcome-title { font-size: 2rem; }
        .welcome-box { padding: 40px 20px; }
        .welcome-desc { font-size: 1rem; }
        .dot-big { width: 30px; height: 30px; }
    }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand" href="#">@GNESA</a>
            <div class="d-flex gap-4">
                <a href="{{ route('user.index') }}" class="text-purple text-decoration-none small fw-bold">Beranda</a>
                <a href="{{ route('user.sejarah') }}" class="text-muted text-decoration-none small">Sejarah</a>
                <a href="{{ route('user.produk') }}" class="text-muted text-decoration-none small">Produk</a>
                <a href="{{ route('user.kontak') }}" class="text-muted text-decoration-none small">Kontak</a>
                <a href="{{ route('logout') }}" class="text-danger text-decoration-none small">Log Out</a>
            </div>
        </div>
    </nav>

    <section class="hero-section mt-5">
        <div class="container">
            <div class="welcome-box text-center">
                <h1 class="welcome-title">Selamat Datang di Rumah Batik Agnesa</h1>
            </div>

            <div class="text-center mt-5">
                <p class="welcome-desc mx-auto">
                    Dari tangan para pengrajin lokal, kami menghadirkan batik yang mencerminkan keindahan budaya dan keaslian Indonesia.
                </p>
            </div>

            <div class="d-flex justify-content-center align-items-center gap-3 mt-5">
                <div class="dot dot-big" style="background-color: #f3d7ff;"></div>
                <div class="dot dot-big" style="background-color: #ebd3ff;"></div>
                <div class="dot dot-big" style="background-color: #f9eaff;"></div>
                <div class="dot-small"></div>
            </div>
        </div>
    </section>

    <div class="container py-5">
    <div class="container py-5">
        <h4 class="fw-bold mb-5 text-center" style="letter-spacing: 1px; color: #444;">Layanan Kami</h4>
        <div class="row justify-content-center">
            <div class="col-md-8"> <div class="card mb-5 border-0 shadow-sm" style="border-radius: 20px;">
                    <div class="p-3">
                        <img src="{{ asset('assets/Produksi Kain Batik.jpg') }}" class="img-fluid w-100" style="height: 250px; object-fit: cover; border-radius: 15px;">
                        <div class="card-body px-0">
                            <h6 class="fw-bold">Produksi Kain Batik</h6>
                            <p class="text-muted" style="font-size: 13px; line-height: 1.6;">
                                Agnesa Batik memproduksi kain batik dalam jumlah besar untuk berbagai kebutuhan, seperti seragam kantor, sekolah, komunitas, maupun instansi lainnya.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mb-5 border-0 shadow-sm" style="border-radius: 20px;">
                    <div class="p-3">
                        <img src="{{ asset('assets/Jasa Jahit Seragam Batik.jpg') }}" class="img-fluid w-100" style="height: 250px; object-fit: cover; border-radius: 15px;">
                        <div class="card-body px-0">
                            <h6 class="fw-bold">Jasa Jahit Seragam Batik</h6>
                            <p class="text-muted" style="font-size: 13px; line-height: 1.6;">
                                Agnesa Batik menyediakan layanan konveksi batik profesional untuk menjahit kain batik menjadi seragam siap pakai, baik untuk pria maupun wanita.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mb-5 border-0 shadow-sm" style="border-radius: 20px;">
                    <div class="p-3">
                        <img src="{{ asset('assets/Batik Berlogo.jpg') }}" class="img-fluid w-100" style="height: 250px; object-fit: cover; border-radius: 15px;">
                        <div class="card-body px-0">
                            <h6 class="fw-bold">Pembuatan Seragam Batik Berlogo</h6>
                            <p class="text-muted" style="font-size: 13px; line-height: 1.6;">
                                Agnesa Batik melayani pembuatan seragam batik dengan logo khusus sesuai kebutuhan branding perusahaan, organisasi, maupun acara resmi.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mb-5 border-0 shadow-sm" style="border-radius: 20px;">
                    <div class="p-3">
                        <img src="{{ asset('assets/Motif Sendiri.JPG') }}" class="img-fluid w-100" style="height: 250px; object-fit: cover; border-radius: 15px;">
                        <div class="card-body px-0">
                            <h6 class="fw-bold">Pesan Batik dengan Motif Sendiri</h6>
                            <p class="text-muted" style="font-size: 13px; line-height: 1.6;">
                                Agnesa Batik menerima pesanan batik dengan desain motif eksklusif sesuai permintaan Anda—mulai dari tema, warna, hingga detail ornamen khusus.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mb-5 border-0 shadow-sm" style="border-radius: 20px;">
                    <div class="p-3">
                        <img src="{{ asset('assets/readystock.png') }}" class="img-fluid w-100" style="height: 250px; object-fit: cover; border-radius: 15px;">
                        <div class="card-body px-0">
                            <h6 class="fw-bold">Kain Batik Ready Stock</h6>
                            <p class="text-muted" style="font-size: 13px; line-height: 1.6;">
                                Agnesa Batik menyediakan berbagai koleksi kain batik siap pakai dengan beragam motif dan bahan, siap memenuhi kebutuhan Anda kapan saja.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mb-5 border-0 shadow-sm" style="border-radius: 20px;">
                    <div class="p-3">
                        <img src="{{ asset('assets/Kemitraan.jpeg') }}" class="img-fluid w-100" style="height: 250px; object-fit: cover; border-radius: 15px;">
                        <div class="card-body px-0">
                            <h6 class="fw-bold">Kemitraan B2B & Private Label</h6>
                            <p class="text-muted" style="font-size: 13px; line-height: 1.6;">
                                Agnesa Batik siap menjadi mitra produksi terpercaya untuk membantu Anda membangun dan mengembangkan brand batik sendiri.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
