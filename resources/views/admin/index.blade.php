{{-- filepath: d:\EventUniversitas\FrontEnd-Laravel\resources\views\admin\index.blade.php --}}
@extends('layouts.sidebar')
@section('content')
    <div class="dashboard-container">
        <!-- Main Content -->
        <main class="dashboard-main">
            <!-- Header -->
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title" style="padding: 10px">
                        <h1>Administrator Dashboard</h1>
                    </div>
                </div>
            </header>

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

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <div class="dashboard-welcome">
                    <h2>Administrator Control Panel</h2>
                    <p>Manage users, teams, and system settings</p>
                </div>

                <div class="dashboard-stats">
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $totalUsers }}</h3>
                            <p>Total Users</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $activeEvents }}</h3>
                            <p>Seminar Aktif</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon purple">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $committeeCount }}</h3>
                            <p>Panitia</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $financeCount }}</h3>
                            <p>Keuangan</p>
                        </div>
                    </div>
                </div>

                <div class="dashboard-sections">
                    <div class="section user-management">
                        <div class="section-header">
                            <h3>Team Management</h3>
                        </div>
                        <div class="user-table-wrapper">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teamMembers as $member)
                                        <tr>
                                            <td>
                                                <div class="user-info">
                                                    <span>{{ $member->nama }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $member->role->nama_role }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="section recent-activities">
                        <div class="section-header">
                            <h3>Aktivitas Terkini</h3>
                        </div>
                        <div class="activity-list">
                            @foreach ($recentActivities as $activity)
                                <div class="activity-item">
                                    <div class="activity-icon {{ $activity->color }}">
                                        <i class="fas {{ $activity->icon }}"></i>
                                    </div>
                                    <div class="activity-details">
                                        <p>{!! $activity->description !!}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="dashboard-sections">
                    <div class="section system-summary">
                        <div class="section-header">
                            <h3>Ringkasan Sistem</h3>
                        </div>
                        <div class="summary-cards">
                            <div class="summary-card">
                                <div class="summary-header">
                                    <h4>Distribusi Pengguna</h4>
                                </div>
                                <div class="summary-content">
                                    <div class="chart-placeholder" style="width:220px; margin:auto;">
                                        <canvas id="userPieChart" width="200" height="200"></canvas>
                                    </div>
                                    <div class="chart-legend">
                                        <div class="legend-item">
                                            <span class="legend-color regular"
                                                style="background:rgba(54,162,235,0.7);"></span>
                                            <span class="legend-label">Peserta</span>
                                            <span class="legend-value">{{ $regularMembers }}</span>
                                        </div>
                                        <div class="legend-item">
                                            <span class="legend-color committee"
                                                style="background:rgba(255,206,86,0.7);"></span>
                                            <span class="legend-label">Panitia</span>
                                            <span class="legend-value">{{ $committeeCount }}</span>
                                        </div>
                                        <div class="legend-item">
                                            <span class="legend-color finance"
                                                style="background:rgba(255,99,132,0.7);"></span>
                                            <span class="legend-label">Keuangan</span>
                                            <span class="legend-value">{{ $financeCount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-card">
                                <div class="summary-header">
                                    <h4>Seminars Overview</h4>
                                </div>
                                <div class="summary-content">
                                    <div class="stats-grid">
                                        <div class="stat-box">
                                            <h5>{{ $activeEvents }}</h5>
                                            <p>Seminar Aktif</p>
                                        </div>
                                        <div class="stat-box">
                                            <h5>{{ $eventsThisWeek }}</h5>
                                            <p>This Week</p>
                                        </div>
                                        <div class="stat-box">
                                            <h5>{{ $eventsThisMonth }}</h5>
                                            <p>This Month</p>
                                        </div>
                                        <div class="stat-box">
                                            <h5>{{ $totalRegistrations }}</h5>
                                            <p>Registrations</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const userDistribution = @json([$regularMembers, $committeeCount, $financeCount]);
        const userLabels = @json(['Peserta', 'Panitia', 'Keuangan']);
        const ctx = document.getElementById('userPieChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: userLabels,
                datasets: [{
                    data: userDistribution,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)', // Peserta
                        'rgba(255, 206, 86, 0.7)', // Panitia
                        'rgba(255, 99, 132, 0.7)' // Keuangan
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false // Legend sudah ada di HTML
                    }
                }
            }
        });
    </script>
@endsection
