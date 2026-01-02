<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeminarKu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @stack('styles')
    <style>
        .animated-popup {
            border-radius: 15px !important;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2) !important;
        }

        .btn-confirm {
            padding: 10px 30px !important;
            border-radius: 8px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
        }

        .btn-confirm:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 5px 15px rgba(211, 51, 51, 0.4) !important;
        }

        .btn-cancel {
            padding: 10px 30px !important;
            border-radius: 8px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
        }

        .btn-cancel:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 5px 15px rgba(48, 133, 214, 0.4) !important;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="dashboard-sidebar">
        <div class="sidebar-header">
            <a href="index.html" class="logo">
                <i class="fa-solid fa-calendar-check"></i>
                <span>SeminarKu</span>
            </a>
            <button type="button" class="close-sidebar">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="user-profile">
            <div
                style="margin-right: 10px ; width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 16px;">
                {{ strtoupper(substr(session('user')['nama'], 0, 1)) }}
            </div>
            <div class="profile-info">
                <h3>{{ session('user')['nama'] }}</h3>
                <p>{{ session('user')['nama_role'] }}</p>
            </div>
        </div>

        <nav class="sidebar-nav">
            <ul>
                {{-- admin --}}
                @if (session('user.id_role') == 1)
                    <li><a href="/admin/index"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
                    <li><a href="/admin/user/index"><i class="fas fa-users"></i><span>Data User</span></a></li>
                    {{-- Panitia --}}
                @elseif (session('user.id_role') == 2)
                    <li><a href="/panitia/index"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
                    <li><a href="{{ route('panitia.event.index') }}"><i class="fas fa-plus-circle"></i><span>Buat
                                Seminar</span></a></li>
                    <li><a href="{{ route('panitia.absen') }}"><i class="fas fa-qrcode"></i><span>Absensi
                                Scanner</span></a></li>
                    <li><a href="{{ route('panitia.sertifikat.index') }}"><i class="fas fa-file-upload"></i><span>Upload
                                Sertifikat</span></a></li>
                    {{-- Keuangan --}}
                @elseif (session('user.id_role') == 3)
                    <li><a href="/keuangan/index"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
                    <li><a href="{{ route('keuangan.laporanPembayaran') }}"><i class="fas fa-clock"></i><span>Laporan
                                Pembayaran</span></a></li>
                    </li>
                    {{-- peserta --}}
                @elseif (session('user.id_role') == 4)
                    <li><a href="{{ route('peserta.index') }}"><i class="fas fa-home"></i><span>Dashboard</span></a>
                    </li>
                    <li><a href="{{ route('peserta.event.index') }}"><i
                                class="fas fa-calendar-alt"></i><span>Seminar</span></a></li>
                    <li><a href="{{ route('peserta.sertifikat') }}"><i
                                class="fas fa-certificate"></i><span>Sertifikat</span></a></li>
                    <li><a href="/peserta/eventQr"><i class="fas fa-qrcode"></i><span>QR Codes</span></a></li>
                @endif
            </ul>
            {{-- <ul> <li><a href="/setting"><i class="fas fa-cog"></i><span>Settings</span></a></li></ul> --}}
        </nav>
        <div class="sidebar-footer">
            <a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault(); confirmLogout();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </aside>

    <main>
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Konfirmasi Logout',
                text: "Apakah Anda yakin ingin keluar dari akun?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                background: '#fff',
                backdrop: `
                rgba(0,0,0,0.4)
                left top
                no-repeat
            `,
                customClass: {
                    popup: 'animated-popup',
                    confirmButton: 'btn-confirm',
                    cancelButton: 'btn-cancel'
                },
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan loading
                    Swal.fire({
                        title: 'Logging out...',
                        text: 'Mohon tunggu sebentar',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Submit form logout
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
    @stack('scripts')
</body>

</html>
