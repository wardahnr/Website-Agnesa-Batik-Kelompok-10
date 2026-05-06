<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - @gnesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fcfaff; color: #333; }
        .auth-card { border: none; border-radius: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.02); background: #fff; }
        .btn-dark { background-color: #1a1a1a; border: none; border-radius: 15px; padding: 12px; font-weight: 400; transition: 0.3s; }
        .btn-dark:hover { background-color: #333; transform: translateY(-2px); }
        .form-control { border-radius: 15px; padding: 12px; border: 1px solid #eee; background-color: #f9f9f9; font-size: 14px; font-weight: 300; }
        .brand-logo { color: #d899f5; font-size: 32px; letter-spacing: -1.5px; font-weight: 500; }
        .sub-title { font-weight: 300; color: #aaa; font-size: 13px; }
        .social-btn { width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; border-radius: 12px; background-color: #fff; border: 1px solid #f0f0f0; transition: 0.3s; }
        .social-btn:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.05); border-color: #d899f5; }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="text-center mb-5">
                    <h1 class="brand-logo">@gnesa</h1>
                </div>
                <div class="card auth-card p-4">
                    <form action="{{ route('register.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small text-secondary fw-light">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small text-secondary fw-light">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="admin@agnesa.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small text-muted">Password</label>
                            <div class="input-group"> <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                style="border-radius: 12px 0 0 12px; border-right: none; padding: 12px;">

                            <span class="input-group-text" id="togglePassword"
                                style="border-radius: 0 12px 12px 0; background-color: #fff; border-left: none; cursor: pointer;">
                                <i class="bi bi-eye-slash" id="eyeIcon"></i>
                            </span>
                            @error('password')
                                <div class="invalid-feedback" style="font-size: 12px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label small text-muted">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" style="border-radius: 12px 0 0 12px;">
                                <span class="input-group-text" id="togglePasswordConfirm" style="border-radius: 0 12px 12px 0; cursor: pointer;">
                                    <i class="bi bi-eye-slash"></i>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Daftar Sekarang</button>
                    </form>

                    <p class="text-center small text-muted mt-4 fw-light">
                        Sudah punya akun? <a href="{{ route('login') }}" class="text-dark text-decoration-none">Masuk</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Fungsi untuk Password Utama
            const togglePassword = document.querySelector('#togglePassword');
            const passwordField = document.querySelector('#password');

            if (togglePassword) {
                togglePassword.addEventListener('click', function () {
                    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordField.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('bi-eye');
                    this.querySelector('i').classList.toggle('bi-eye-slash');
                });
            }

            // Fungsi untuk Konfirmasi Password (ID Baru)
            const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
            const confirmField = document.querySelector('#password_confirmation');

            if (togglePasswordConfirm) {
                togglePasswordConfirm.addEventListener('click', function () {
                    const type = confirmField.getAttribute('type') === 'password' ? 'text' : 'password';
                    confirmField.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('bi-eye');
                    this.querySelector('i').classList.toggle('bi-eye-slash');
                });
            }
        });
    </script>
</body>
</html>
