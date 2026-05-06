<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - @gnesa</title>
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
        .btn-google-custom {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 12px;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 12px; /* Menyesuaikan style @gnesa */
            text-decoration: none;
            color: #000000;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-google-custom:hover {
            background-color: #f8f9fa;
            border-color: #cccccc;
            color: #000000;
        }

        .btn-google-custom img {
            width: 20px;
            margin-right: 10px;
        }

        .btn-google-custom span {
            font-size: 14px;
        }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="text-center mb-5">
                    <h1 class="brand-logo">@gnesa</h1>
                </div>

                @if(session('success'))
                    <div class="alert alert-success border-0 small mb-4" style="border-radius: 15px;">{{ session('success') }}</div>
                @endif

                @if($errors->has('loginError'))
                <div class="alert alert-danger border-0 small mb-4 d-flex align-items-center"
                     style="border-radius: 15px; background-color: #fff2f2; color: #eb5757;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-exclamation-circle-fill me-2" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                    <div>{{ $errors->first('loginError') }}</div>
                </div>
                @endif

                <div class="card auth-card p-4">
                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small text-muted">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="name@example.com"
                                style="border-radius: 12px; padding: 12px;">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Masuk</button>
                    </form>

                    <div class="d-flex align-items-center my-4">
                        <hr class="flex-grow-1 text-muted opacity-25">
                        <span class="mx-3 small text-muted fw-light">atau</span>
                        <hr class="flex-grow-1 text-muted opacity-25">
                    </div>
                        <a href="{{url('/auth/google/redirect')}}" class="btn-google-custom">
                            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo">
                            <span>Masuk dengan Google</span>
                        </a>
                    </div>

                    <p class="text-center small text-muted mt-4 fw-light">
                        Belum punya akun? <a href="{{ route('register') }}" class="text-dark text-decoration-none">Daftar</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const eyeIcon = document.querySelector('#eyeIcon');

    togglePassword.addEventListener('click', function () {
        // Toggle tipe input
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Toggle ikon mata (eye / eye-slash)
        eyeIcon.classList.toggle('bi-eye');
        eyeIcon.classList.toggle('bi-eye-slash');
    });
    </script>
</body>
</html>
