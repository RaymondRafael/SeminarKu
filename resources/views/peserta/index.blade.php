@extends('layouts.sidebar')
@section('content')
    @if (session('success'))
        <!-- Overlay Background -->
        <div id="success-overlay" class="success-overlay">
            <!-- Success Card -->
            <div class="success-card">
                <!-- Animated Background Circles -->
                <div class="success-bg-circle circle-1"></div>
                <div class="success-bg-circle circle-2"></div>
                <div class="success-bg-circle circle-3"></div>

                <!-- Success Icon with Checkmark Animation -->
                <div class="success-icon-container">
                    <div class="success-checkmark-circle">
                        <svg class="success-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                    </div>
                </div>

                <!-- Content -->
                <div class="success-content-wrapper">
                    <h2 class="success-main-title">Berhasil!</h2>
                    <p class="success-description">{{ session('success') }}</p>
                </div>

                <!-- Action Button -->
                <button onclick="closeSuccessPopup()" class="success-action-btn">
                    <span>Tutup</span>
                    <i class="fas fa-check"></i>
                </button>

                <!-- Close Icon (X) -->
                <button onclick="closeSuccessPopup()" class="success-close-icon">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <style>
            /* Overlay */
            .success-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.6);
                backdrop-filter: blur(8px);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 99999;
                animation: fadeIn 0.3s ease-out;
                padding: 20px;
            }

            /* Success Card */
            .success-card {
                background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
                border-radius: 24px;
                padding: 50px 40px;
                max-width: 480px;
                width: 100%;
                position: relative;
                box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
                animation: scaleIn 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
                overflow: hidden;
                text-align: center;
            }

            /* Animated Background Circles */
            .success-bg-circle {
                position: absolute;
                border-radius: 50%;
                opacity: 0.1;
                animation: float 6s ease-in-out infinite;
            }

            .circle-1 {
                width: 150px;
                height: 150px;
                background: linear-gradient(135deg, #10b981, #059669);
                top: -50px;
                left: -50px;
                animation-delay: 0s;
            }

            .circle-2 {
                width: 100px;
                height: 100px;
                background: linear-gradient(135deg, #34d399, #10b981);
                bottom: -30px;
                right: -30px;
                animation-delay: 2s;
            }

            .circle-3 {
                width: 80px;
                height: 80px;
                background: linear-gradient(135deg, #6ee7b7, #34d399);
                top: 50%;
                right: -20px;
                animation-delay: 4s;
            }

            /* Success Icon Container */
            .success-icon-container {
                position: relative;
                z-index: 1;
                margin-bottom: 30px;
            }

            .success-checkmark-circle {
                width: 120px;
                height: 120px;
                margin: 0 auto;
                position: relative;
            }

            /* SVG Checkmark Animation */
            .success-checkmark {
                width: 120px;
                height: 120px;
                border-radius: 50%;
                display: block;
                stroke-width: 3;
                stroke: #fff;
                stroke-miterlimit: 10;
                box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
                animation: fillCircle 0.4s ease-in-out 0.4s forwards, scaleCircle 0.3s ease-in-out 0.9s both;
            }

            .checkmark-circle {
                stroke-dasharray: 166;
                stroke-dashoffset: 166;
                stroke-width: 3;
                stroke-miterlimit: 10;
                stroke: #10b981;
                fill: none;
                animation: strokeCircle 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
            }

            .checkmark-check {
                transform-origin: 50% 50%;
                stroke-dasharray: 48;
                stroke-dashoffset: 48;
                stroke: #10b981;
                stroke-width: 4;
                animation: strokeCheck 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
            }

            /* Content */
            .success-content-wrapper {
                position: relative;
                z-index: 1;
                margin-bottom: 30px;
            }

            .success-main-title {
                font-size: 32px;
                font-weight: 800;
                color: #1f2937;
                margin-bottom: 12px;
                animation: slideUp 0.6s ease-out 0.3s both;
            }

            .success-description {
                font-size: 16px;
                color: #6b7280;
                line-height: 1.6;
                animation: slideUp 0.6s ease-out 0.4s both;
            }

            /* Action Button */
            .success-action-btn {
                position: relative;
                z-index: 1;
                background: linear-gradient(135deg, #10b981 0%, #059669 100%);
                color: white;
                border: none;
                padding: 16px 48px;
                border-radius: 50px;
                font-size: 16px;
                font-weight: 700;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 8px 24px rgba(16, 185, 129, 0.4);
                display: inline-flex;
                align-items: center;
                gap: 10px;
                animation: slideUp 0.6s ease-out 0.5s both;
            }

            .success-action-btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 12px 32px rgba(16, 185, 129, 0.5);
            }

            .success-action-btn:active {
                transform: translateY(-1px);
            }

            /* Close Icon (X) */
            .success-close-icon {
                position: absolute;
                top: 20px;
                right: 20px;
                background: rgba(107, 114, 128, 0.1);
                border: none;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.3s ease;
                z-index: 2;
                color: #6b7280;
            }

            .success-close-icon:hover {
                background: rgba(107, 114, 128, 0.2);
                transform: rotate(90deg);
                color: #1f2937;
            }

            /* Animations */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            @keyframes scaleIn {
                from {
                    opacity: 0;
                    transform: scale(0.5);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px) translateX(0px);
                }

                50% {
                    transform: translateY(-20px) translateX(10px);
                }
            }

            @keyframes strokeCircle {
                100% {
                    stroke-dashoffset: 0;
                }
            }

            @keyframes strokeCheck {
                100% {
                    stroke-dashoffset: 0;
                }
            }

            @keyframes fillCircle {
                100% {
                    box-shadow: inset 0 0 0 60px #10b981;
                }
            }

            @keyframes scaleCircle {

                0%,
                100% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.1);
                }
            }

            @keyframes fadeOut {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0;
                }
            }

            @keyframes scaleOut {
                from {
                    opacity: 1;
                    transform: scale(1);
                }

                to {
                    opacity: 0;
                    transform: scale(0.8);
                }
            }

            /* Responsive */
            @media (max-width: 640px) {
                .success-card {
                    padding: 40px 30px;
                }

                .success-checkmark-circle {
                    width: 100px;
                    height: 100px;
                }

                .success-checkmark {
                    width: 100px;
                    height: 100px;
                }

                .success-main-title {
                    font-size: 26px;
                }

                .success-description {
                    font-size: 14px;
                }

                .success-action-btn {
                    padding: 14px 40px;
                    font-size: 14px;
                }
            }
        </style>

        <script>
            function closeSuccessPopup() {
                const overlay = document.getElementById('success-overlay');
                const card = overlay.querySelector('.success-card');

                // Animate out
                overlay.style.animation = 'fadeOut 0.3s ease-out forwards';
                card.style.animation = 'scaleOut 0.3s ease-out forwards';

                setTimeout(() => {
                    overlay.remove();
                }, 300);
            }

            // Auto close after 4 seconds
            setTimeout(() => {
                const overlay = document.getElementById('success-overlay');
                if (overlay) {
                    closeSuccessPopup();
                }
            }, 4000);

            // Close on overlay click
            document.getElementById('success-overlay').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeSuccessPopup();
                }
            });
        </script>
    @endif
    <div class="dashboard-container">
        <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title" style="padding: 10px">
                        <h1>Dashboard Peserta</h1>
                    </div>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="dashboard-stats">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $totalRegistrasi }}</h3>
                            <p>Registered Events</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $totalSertifikat }}</h3>
                            <p>Certificates Earned</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $totalUpcoming }}</h3>
                            <p>Upcoming Events</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Rp {{ number_format($totalBayar, 0, ',', '.') }}</h3>
                            <p>Total Spent</p>
                        </div>
                    </div>
                </div>

                <div class="dashboard-sections">
                    <div class="section upcoming-events">
                        <div class="section-header">
                            <h3>Upcoming Seminars</h3>
                        </div>
                        <div class="event-list">
                            @forelse ($upcomingEvents as $event)
                                <div class="event-item">
                                    <div class="event-date">
                                        <span
                                            class="day">{{ \Carbon\Carbon::parse($event->tanggal)->format('d') }}</span>
                                        <span
                                            class="month">{{ \Carbon\Carbon::parse($event->tanggal)->format('M') }}</span>
                                    </div>
                                    <div class="event-details">
                                        <h4>{{ $event->detailKegiatan->kegiatan->nama_kegiatan }}</h4>
                                        <p><i class="fas fa-map-marker-alt"></i> {{ $event->detailKegiatan->lokasi }}</p>
                                        <p><i class="fas fa-clock"></i> {{ $event->detailKegiatan->waktu_mulai }} -
                                            {{ $event->detailKegiatan->waktu_selesai }}</p>
                                    </div>
                                    <div class="event-status">
                                        <span class="status"
                                            style="background: {{ $event->status_konfirmasi == 'Pending' ? '#fef9c3' : ($event->status_konfirmasi == 'Ditolak' ? '#fee2e2' : '#dcfce7') }};color: {{ $event->status_konfirmasi == 'Pending' ? '#b45309' : ($event->status_konfirmasi == 'Ditolak' ? '#b91c1c' : '#15803d') }};
                                                border-radius: 8px;
                                                padding: 4px 14px;
                                                font-weight: 600;
                                                display: inline-block;
                                            ">
                                            {{ $event->status_konfirmasi }}
                                        </span>
                                        <button class="btn-detail mt-1"
                                            onclick="openModal({{ $event->id_registrasi }})">Lihat Detail</button>
                                    </div>
                                </div>

                                <div id="modal-{{ $event->id_registrasi }}" class="custom-modal">
                                    <div class="modal-content">
                                        <span class="close"
                                            onclick="closeModal({{ $event->id_registrasi }})">&times;</span>
                                        <h4>Detail Registrasi</h4>
                                        <p><strong>Nama Kegiatan:</strong>
                                            {{ $event->detailKegiatan->kegiatan->nama_kegiatan }}</p>
                                        <p><strong>Tanggal:</strong> {{ $event->detailKegiatan->tanggal }}</p>
                                        <p><strong>Waktu:</strong> {{ $event->detailKegiatan->waktu_mulai }} -
                                            {{ $event->detailKegiatan->waktu_selesai }}</p>
                                        <p><strong>Lokasi:</strong> {{ $event->detailKegiatan->lokasi }}</p>
                                        <p><strong>Status:</strong> {{ $event->status_konfirmasi }}</p>
                                        @if ($event->status_konfirmasi == 'Ditolak')
                                            <div class="alert alert-danger mt-2">
                                                <strong>Alasan Penolakan:</strong><br>
                                                {{ $event->keterangan ?? 'Tidak ada keterangan.' }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-600 px-4" style="text-align: center;">Belum ada event mendatang.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="section recent-certificates">
                        <div class="section-header">
                            <h3>Recent Certificates</h3>
                        </div>
                        <div class="certificates-list">
                            @forelse ($sertifikat as $item)
                                <div class="certificate-item">
                                    <div class="certificate-preview"
                                        style="width: 130px; height: 160px; border: 1px solid #ccc; overflow: hidden; border-radius: 8px;">
                                        <iframe src="{{ asset('storage/' . $item->sertifikat) }}" width="130px"
                                            height="130px" frameborder="0" style="pointer-events: none;"></iframe>
                                        <p class="text-center mt-2">
                                            <a href="{{ asset('storage/' . $item->sertifikat) }}" target="_blank"
                                                class="btn btn-sm btn-outline-primary">Lihat Sertifikat</a>
                                        </p>
                                    </div>
                                    <div class="certificate-details" style="margin-left: 20px;">
                                        <h4>{{ $item->registrasi->detailKegiatan->kegiatan->nama_kegiatan }}</h4>
                                        <p>Issued on {{ \Carbon\Carbon::parse($item->waktu_unggah)->format('d M Y') }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="px-4 text-gray-500">Belum ada sertifikat tersedia.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function openModal(id) {
            document.getElementById('modal-' + id).style.display = 'block';
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).style.display = 'none';
        }

        window.addEventListener('click', function(event) {
            document.querySelectorAll('.custom-modal').forEach(function(modal) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
@endsection
