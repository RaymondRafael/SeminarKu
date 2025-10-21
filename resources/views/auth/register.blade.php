<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SeminarKu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="form-page">
    <div class="app-container">
        <!-- Header -->
        <header class="header">
            <div class="container">
                <div class="header-content">
                    <a href="index.html" class="logo">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span>SeminarKu</span>
                    </a>
                    <div class="auth-actions">
                        <a href={{ route('login.index') }} class="btn btn-outline">Log In</a>
                        <a href={{ route('register.index') }} class="btn btn-primary active">Sign Up</a>
                    </div>
                    <button class="mobile-menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Form Section -->
        <section class="form-section">
            <div class="container">
                <div class="form-container">
                    <div class="form-sidebar">
                        <div class="form-sidebar-content">
                            <h2>Gabung di SeminarKu</h2>
                            <p>Bikin akun biar bisa cari dan ikut berbagai seminar seru di kampus.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> Daftar seminar spesial buat kamu</li>
                                <li><i class="fas fa-check"></i> Lihat riwayat seminar yang pernah diikutin</li>
                                <li><i class="fas fa-check"></i> Dapat sertifikat otomatis setelah hadir</li>
                                <li><i class="fas fa-check"></i> Rekomendasi seminar yang sesuai minat kamu</li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-content">
                        <h1>Buat Akun</h1>
                        <p class="form-subtitle">Isi data anda</p>

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6"
                                style="margin-top:-15px;" role="alert">
                                @foreach ($errors->all() as $error)
                                    <p style="margin-top: 11px;">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form class="registration-form" method="POST"action="{{ route('register.submit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="nama" placeholder="Masukan nama" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Alamat Email</label>
                                <input type="email" id="email" name="email" placeholder="Masukan email address"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="password-input">
                                    <input type="password" id="password" name="password" placeholder="Buat password"
                                        required>
                                    <button type="button" class="password-toggle">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group checkbox">
                                <input type="checkbox" id="terms" name="terms" required>
                                <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a
                                        href="#">Privacy Policy</a></label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Buat Akun</button>
                            </div>

                            <div class="form-footer">
                                <p>Sudah punya akun? <a href={{ route('login.index') }}>Log In</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer footer-light">
            <div class="container">
                <div class="footer-bottom">
                    <p>&copy; 2025 SeminarKu. All rights reserved.</p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
