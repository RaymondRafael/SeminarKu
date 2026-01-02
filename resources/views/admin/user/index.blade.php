@extends('layouts.sidebar')
@section('content')
    <div class="dashboard-container">
        <!-- Main Content -->
        <main class="dashboard-main">
            <style>
                .delete-btn {
                    background: none;
                    border: none;
                    color: #ef4444;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    padding: 8px;
                    border-radius: 8px;
                }

                .delete-btn:hover {
                    background: #fee2e2;
                    color: #dc2626;
                    transform: scale(1.1);
                }

                /* Custom SweetAlert Delete Styling */
                .swal2-delete-popup {
                    border-radius: 24px !important;
                    padding: 40px 30px !important;
                    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3) !important;
                }

                .swal2-delete-icon {
                    border-width: 4px !important;
                    width: 80px !important;
                    height: 80px !important;
                    margin: 20px auto 30px !important;
                }

                .swal2-icon.swal2-warning {
                    border-color: #f59e0b !important;
                    color: #f59e0b !important;
                    animation: pulseWarning 2s ease-in-out infinite !important;
                }

                .swal2-delete-title {
                    font-size: 28px !important;
                    font-weight: 800 !important;
                    color: #1f2937 !important;
                    margin-bottom: 15px !important;
                }

                .swal2-delete-content {
                    font-size: 15px !important;
                    line-height: 1.8 !important;
                    color: #6b7280 !important;
                }

                .swal2-delete-user-info {
                    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
                    border-left: 4px solid #f59e0b;
                    padding: 16px 20px;
                    border-radius: 12px;
                    margin: 20px 0;
                    text-align: left;
                }

                .swal2-delete-warning-box {
                    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
                    border-left: 4px solid #ef4444;
                    padding: 16px 20px;
                    border-radius: 12px;
                    margin: 20px 0;
                    text-align: left;
                }

                .swal2-delete-confirm {
                    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%) !important;
                    color: white !important;
                    border: none !important;
                    padding: 14px 40px !important;
                    border-radius: 12px !important;
                    font-weight: 700 !important;
                    font-size: 16px !important;
                    box-shadow: 0 8px 20px rgba(239, 68, 68, 0.4) !important;
                    transition: all 0.3s ease !important;
                }

                .swal2-delete-confirm:hover {
                    transform: translateY(-3px) !important;
                    box-shadow: 0 12px 28px rgba(239, 68, 68, 0.5) !important;
                }

                .swal2-delete-cancel {
                    background: #f3f4f6 !important;
                    color: #374151 !important;
                    border: 2px solid #e5e7eb !important;
                    padding: 14px 40px !important;
                    border-radius: 12px !important;
                    font-weight: 700 !important;
                    font-size: 16px !important;
                    transition: all 0.3s ease !important;
                }

                .swal2-delete-cancel:hover {
                    background: #e5e7eb !important;
                    transform: translateY(-3px) !important;
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1) !important;
                }

                @keyframes pulseWarning {

                    0%,
                    100% {
                        transform: scale(1);
                        opacity: 1;
                    }

                    50% {
                        transform: scale(1.05);
                        opacity: 0.9;
                    }
                }

                /* Loading State */
                .swal2-delete-loading {
                    border-color: #ef4444 !important;
                }

                .swal2-loading .swal2-delete-title {
                    color: #ef4444 !important;
                }

                /* Main Alert Container */
                .ultra-success-alert {
                    position: relative;
                    background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 50%, #dcfce7 100%);
                    border: 2px solid #86efac;
                    border-radius: 20px;
                    padding: 24px 28px;
                    width: 100%;
                    display: flex;
                    align-items: center;
                    gap: 20px;
                    overflow: hidden;
                    box-shadow:
                        0 10px 40px rgba(16, 185, 129, 0.15),
                        0 0 0 1px rgba(16, 185, 129, 0.1) inset;
                    animation: slideInRight 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
                }

                /* Animated Particles */
                .success-particles {
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    overflow: hidden;
                    pointer-events: none;
                }

                .particle {
                    position: absolute;
                    background: linear-gradient(135deg, #10b981, #34d399);
                    border-radius: 50%;
                    opacity: 0.2;
                    animation: floatParticle 4s ease-in-out infinite;
                }

                .particle:nth-child(1) {
                    width: 8px;
                    height: 8px;
                    top: 20%;
                    left: 10%;
                    animation-delay: 0s;
                }

                .particle:nth-child(2) {
                    width: 12px;
                    height: 12px;
                    top: 60%;
                    left: 30%;
                    animation-delay: 1s;
                }

                .particle:nth-child(3) {
                    width: 6px;
                    height: 6px;
                    top: 40%;
                    right: 20%;
                    animation-delay: 2s;
                }

                .particle:nth-child(4) {
                    width: 10px;
                    height: 10px;
                    top: 70%;
                    right: 40%;
                    animation-delay: 1.5s;
                }

                .particle:nth-child(5) {
                    width: 8px;
                    height: 8px;
                    top: 30%;
                    right: 10%;
                    animation-delay: 0.5s;
                }

                /* Glowing Border */
                .success-glow {
                    position: absolute;
                    top: -2px;
                    left: -2px;
                    right: -2px;
                    bottom: -2px;
                    border-radius: 20px;
                    background: linear-gradient(45deg, #10b981, #34d399, #6ee7b7, #34d399, #10b981);
                    background-size: 300% 300%;
                    opacity: 0.3;
                    filter: blur(8px);
                    z-index: -1;
                    animation: gradientShift 3s ease infinite;
                }

                /* Icon Container with Ripple */
                .success-icon-wrapper {
                    position: relative;
                    flex-shrink: 0;
                    z-index: 1;
                }

                .ripple-circle {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 60px;
                    height: 60px;
                    border: 2px solid #10b981;
                    border-radius: 50%;
                    opacity: 0;
                    animation: ripple 2s ease-out infinite;
                }

                .ripple-circle:nth-child(2) {
                    animation-delay: 1s;
                }

                .success-icon-circle {
                    width: 60px;
                    height: 60px;
                    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    box-shadow:
                        0 8px 24px rgba(16, 185, 129, 0.3),
                        0 0 0 4px rgba(16, 185, 129, 0.1);
                    animation: bounceIn 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) 0.2s both;
                    position: relative;
                }

                /* SVG Checkmark */
                .success-check-svg {
                    width: 32px;
                    height: 32px;
                    fill: white;
                }

                .check-path {
                    stroke-dasharray: 50;
                    stroke-dashoffset: 50;
                    animation: drawCheck 0.5s ease-out 0.6s forwards;
                }

                /* Content */
                .success-content {
                    flex: 1;
                    z-index: 1;
                }

                .success-title {
                    font-size: 20px;
                    font-weight: 800;
                    color: #065f46;
                    margin-bottom: 4px;
                    animation: slideUp 0.6s ease-out 0.3s both;
                    text-shadow: 0 1px 2px rgba(6, 95, 70, 0.1);
                }

                .success-message {
                    font-size: 15px;
                    color: #047857;
                    line-height: 1.5;
                    animation: slideUp 0.6s ease-out 0.4s both;
                }

                /* Progress Bar */
                .success-progress-bar {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    height: 4px;
                    background: rgba(16, 185, 129, 0.1);
                    overflow: hidden;
                }

                .success-progress-fill {
                    height: 100%;
                    background: linear-gradient(90deg, #10b981, #34d399, #6ee7b7);
                    background-size: 200% 100%;
                    animation:
                        progressFill 5s linear forwards,
                        progressShine 2s ease-in-out infinite;
                }

                /* Close Button */
                .ultra-close-btn {
                    position: relative;
                    z-index: 1;
                    background: rgba(16, 185, 129, 0.1);
                    border: none;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    flex-shrink: 0;
                    color: #059669;
                }

                .ultra-close-btn:hover {
                    background: rgba(16, 185, 129, 0.2);
                    transform: rotate(90deg) scale(1.1);
                }

                .ultra-close-btn i {
                    font-size: 18px;
                }

                /* Animations */
                @keyframes slideInRight {
                    from {
                        opacity: 0;
                        transform: translateX(100px);
                    }

                    to {
                        opacity: 1;
                        transform: translateX(0);
                    }
                }

                @keyframes bounceIn {
                    0% {
                        opacity: 0;
                        transform: scale(0);
                    }

                    50% {
                        transform: scale(1.15);
                    }

                    70% {
                        transform: scale(0.95);
                    }

                    100% {
                        opacity: 1;
                        transform: scale(1);
                    }
                }

                @keyframes slideUp {
                    from {
                        opacity: 0;
                        transform: translateY(10px);
                    }

                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                @keyframes floatParticle {

                    0%,
                    100% {
                        transform: translateY(0) translateX(0) scale(1);
                        opacity: 0.2;
                    }

                    50% {
                        transform: translateY(-30px) translateX(20px) scale(1.2);
                        opacity: 0.4;
                    }
                }

                @keyframes ripple {
                    0% {
                        width: 60px;
                        height: 60px;
                        opacity: 0.6;
                    }

                    100% {
                        width: 120px;
                        height: 120px;
                        opacity: 0;
                    }
                }

                @keyframes drawCheck {
                    to {
                        stroke-dashoffset: 0;
                    }
                }

                @keyframes gradientShift {

                    0%,
                    100% {
                        background-position: 0% 50%;
                    }

                    50% {
                        background-position: 100% 50%;
                    }
                }

                @keyframes progressFill {
                    from {
                        width: 0%;
                    }

                    to {
                        width: 100%;
                    }
                }

                @keyframes progressShine {

                    0%,
                    100% {
                        background-position: 0% 50%;
                    }

                    50% {
                        background-position: 100% 50%;
                    }
                }

                @keyframes slideOutRight {
                    from {
                        opacity: 1;
                        transform: translateX(0);
                    }

                    to {
                        opacity: 0;
                        transform: translateX(100px);
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

                /* Responsive */
                @media (max-width: 640px) {
                    .ultra-success-alert {
                        padding: 20px 24px;
                        gap: 16px;
                    }

                    .success-icon-circle {
                        width: 50px;
                        height: 50px;
                    }

                    .success-check-svg {
                        width: 26px;
                        height: 26px;
                    }

                    .success-title {
                        font-size: 18px;
                    }

                    .success-message {
                        font-size: 14px;
                    }

                    .ultra-close-btn {
                        width: 36px;
                        height: 36px;
                    }
                }
            </style>
            <!-- Header -->
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title" style="padding: 10px">
                        <h1>Data User</h1>
                    </div>
                </div>

            </header>

            <!-- User Management Content -->
            <div class="dashboard-content">
                <form method="GET" action="{{ route('admin.user.index') }}" style="margin-bottom: 30px;">
                    <div
                        style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); padding: 25px; border-radius: 15px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                        <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                            <label for="role"
                                style="font-weight: 600; color: #374151; font-size: 14px; min-width: 80px;">Filter
                                Role:</label>
                            <select id="role" name="role" onchange="this.form.submit()"
                                style="background: white; border: 2px solid #e5e7eb; padding: 12px 16px; border-radius: 10px; color: #374151; font-weight: 500; min-width: 200px; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.05);"
                                onfocus="this.style.borderColor='#4f46e5'; this.style.boxShadow='0 0 0 3px rgba(79, 70, 229, 0.1)'"
                                onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.05)'">
                                <option value="">🔍 Semua Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->nama_role }}"
                                        {{ $roleFilter == $role->nama_role ? 'selected' : '' }}>
                                        {{ $role->nama_role }}
                                    </option>
                                @endforeach
                            </select>

                            <!-- Input Search Email -->
                            <label for="email"
                                style="font-weight: 600; color: #374151; font-size: 14px; min-width: 80px;">
                                Cari Email:
                            </label>
                            <div style="display: flex; align-items: center; gap: 10px; flex-grow: 1; width: 100%;">
                                <input type="text" id="email" name="email" placeholder="Masukkan email..."
                                    value="{{ request('email') }}"
                                    style="padding: 12px 16px; border-radius: 10px; border: 2px solid #e5e7eb; min-width: 250px; color: #374151; font-weight: 500;"
                                    onfocus="this.style.borderColor='#4f46e5'; this.style.boxShadow='0 0 0 3px rgba(79, 70, 229, 0.1)'"
                                    onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">
                                <button type="submit"
                                    style="background: #4f46e5; color: white; padding: 8px 20px; border-radius: 10px; border: none; cursor: pointer; font-weight: 600; display: flex; align-items: center; transition: background 0.3s ease;">
                                    <i class="fas fa-search" style="margin-right: 8px;"></i>
                                    Cari
                                </button>

                            </div>

                            <div style="margin-left: auto;">
                                <span
                                    style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); color: white; padding: 8px 16px; border-radius: 20px; font-size: 12px; font-weight: 600;">{{ count($users) }}
                                    User Ditemukan</span>
                            </div>
                        </div>
                    </div>
                </form>

                @if (session('success'))
                    <div id="success-alert" class="ultra-success-alert">
                        <!-- Animated Background Effects -->
                        <div class="success-particles">
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                        </div>

                        <!-- Glowing Border Effect -->
                        <div class="success-glow"></div>

                        <!-- Icon with Ripple Effect -->
                        <div class="success-icon-wrapper">
                            <div class="ripple-circle"></div>
                            <div class="ripple-circle"></div>
                            <div class="success-icon-circle">
                                <svg class="success-check-svg" viewBox="0 0 24 24">
                                    <path class="check-path" d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="success-content">
                            <h3 class="success-title">Berhasil!</h3>
                            <p class="success-message">{{ session('success') }}</p>
                        </div>

                        <!-- Progress Bar -->
                        <div class="success-progress-bar">
                            <div class="success-progress-fill"></div>
                        </div>

                        <!-- Close Button -->
                        <button onclick="closeUltraSuccess()" class="ultra-close-btn">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                {{-- tamabah user --}}
                <div class="create-event-button"
                    style="margin-top: 20px; margin-right:50px; margin-bottom:25px; text-align: right;">
                    <a href={{ route('admin.user.create') }} class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah User
                    </a>
                </div>

                {{-- table user --}}
                <div
                    style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border: 1px solid #e2e8f0;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
                                <th
                                    style="padding: 20px; text-align: center; font-weight: 700; color: #374151; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e5e7eb;">
                                    <i class="fas fa-user" style="margin-right: 8px; color: #6b7280;"></i>Nama
                                </th>
                                <th
                                    style="padding: 20px; text-align: center; font-weight: 700; color: #374151; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e5e7eb;">
                                    <i class="fas fa-envelope" style="margin-right: 8px; color: #6b7280;"></i>Email
                                </th>
                                <th
                                    style="padding: 20px; text-align: center; font-weight: 700; color: #374151; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e5e7eb;">
                                    <i class="fas fa-shield-alt" style="margin-right: 8px; color: #6b7280;"></i>Role
                                </th>
                                <th
                                    style="padding: 20px; text-align: center; font-weight: 700; color: #374151; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e5e7eb;">
                                    <i class="fas fa-cogs" style="margin-right: 8px; color: #6b7280;"></i>Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr style="transition: all 0.3s ease; border-bottom: 1px solid #f3f4f6;"
                                    onmouseover="this.style.background='#f8fafc'; this.style.transform='scale(1.01)'"
                                    onmouseout="this.style.background='white'; this.style.transform='scale(1)'">
                                    <td style="padding: 20px; text-align: center; color: #374151; font-weight: 600;">
                                        <div
                                            style="display: flex; align-items: center; justify-content: center; gap: 12px;">
                                            <div
                                                style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 16px;">
                                                {{ strtoupper(substr($user['nama'], 0, 1)) }}
                                            </div>
                                            <span>{{ $user['nama'] }}</span>
                                        </div>
                                    </td>
                                    <td style="padding: 20px; text-align: center; color: #6b7280; font-weight: 500;">
                                        <span
                                            style="background: #f3f4f6; padding: 6px 12px; border-radius: 20px; font-size: 13px;">{{ $user['email'] }}</span>
                                    </td>
                                    <td style="padding: 20px; text-align: center;">{{ $user->role['nama_role'] }}</td>
                                    <td style="padding: 20px; text-align: center;">
                                        <div>
                                            <a href="{{ route('admin.user.edit', ['id' => $user->id_user]) }}"
                                                class="btn-icon" title="Edit"><i class="fas fa-edit"></i></a>
                                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                            <form id="delete-form-{{ $user->id_user }}"
                                                action="{{ route('admin.user.delete', ['id' => $user->id_user]) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                <button type="button" class="btn-icon delete-btn" title="Delete"
                                                    onclick="confirmDelete('{{ $user->id_user }}', '{{ $user->nama }}', '{{ $user->email }}')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="padding: 60px; text-align: center; color: #6b7280;">
                                        <div
                                            style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
                                            <i class="fas fa-users" style="font-size: 48px; color: #d1d5db;"></i>
                                            <h3 style="margin: 0; color: #374151; font-weight: 600;">Tidak ada data user
                                            </h3>
                                            <p style="margin: 0; color: #6b7280;">Belum ada user yang terdaftar dalam
                                                sistem
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="pagination">
                    <a href="#" class="pagination-arrow disabled">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="#" class="pagination-number active">1</a>
                    <a href="#" class="pagination-number">2</a>
                    <a href="#" class="pagination-number">3</a>
                    <span class="pagination-ellipsis">...</span>
                    <a href="#" class="pagination-number">8</a>
                    <a href="#" class="pagination-arrow">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </main>
        <script>
            function closeUltraSuccess() {
                const alert = document.getElementById('success-alert');
                alert.style.animation = 'slideOutRight 0.5s ease-out forwards';

                setTimeout(() => {
                    alert.remove();
                }, 500);
            }

            // Auto close after 5 seconds
            setTimeout(() => {
                const alert = document.getElementById('success-alert');
                if (alert) {
                    closeUltraSuccess();
                }
            }, 5000);

            function confirmDelete(userId, userName, userEmail) {
                Swal.fire({
                    title: 'Hapus User?',
                    html: `
            <div style="text-align: left;">
                <p style="color: #6b7280; margin-bottom: 20px; font-size: 15px;">
                    Anda akan menghapus user berikut:
                </p>
                
                <div class="swal2-delete-user-info">
                    <div style="display: flex; align-items: center; margin-bottom: 10px;">
                        <i class="fas fa-user" style="color: #f59e0b; margin-right: 10px; font-size: 18px;"></i>
                        <div>
                            <div style="font-weight: 700; color: #92400e; font-size: 16px;">${userName}</div>
                            <div style="color: #92400e; font-size: 13px; margin-top: 2px;">
                                <i class="fas fa-envelope" style="margin-right: 5px; font-size: 11px;"></i>${userEmail}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swal2-delete-warning-box">
                    <div style="display: flex; align-items: start; gap: 10px;">
                        <i class="fas fa-exclamation-triangle" style="color: #ef4444; font-size: 20px; margin-top: 2px;"></i>
                        <div>
                            <div style="font-weight: 700; color: #991b1b; margin-bottom: 5px;">Peringatan!</div>
                            <div style="color: #991b1b; font-size: 14px; line-height: 1.6;">
                                • Data user akan dihapus permanen<br>
                                • Semua riwayat registrasi akan hilang<br>
                                • Tindakan ini tidak dapat dibatalkan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: '<i class="fas fa-trash-alt"></i> Ya, Hapus User',
                    cancelButtonText: '<i class="fas fa-times"></i> Batal',
                    reverseButtons: true,
                    customClass: {
                        popup: 'swal2-delete-popup',
                        title: 'swal2-delete-title',
                        htmlContainer: 'swal2-delete-content',
                        icon: 'swal2-delete-icon',
                        confirmButton: 'swal2-delete-confirm',
                        cancelButton: 'swal2-delete-cancel',
                        loader: 'swal2-delete-loading'
                    },
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown animate__faster'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp animate__faster'
                    },
                    focusCancel: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Show loading state
                        Swal.fire({
                            title: 'Menghapus User...',
                            html: `
                    <div style="padding: 20px;">
                        <div style="color: #6b7280; margin-bottom: 15px;">
                            Sedang memproses penghapusan data
                        </div>
                        <div style="background: #fee2e2; padding: 12px; border-radius: 8px; border-left: 4px solid #ef4444;">
                            <i class="fas fa-trash-alt" style="color: #ef4444; margin-right: 8px;"></i>
                            <span style="color: #991b1b; font-weight: 600;">${userName}</span>
                        </div>
                    </div>
                `,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            didOpen: () => {
                                Swal.showLoading();
                            },
                            customClass: {
                                popup: 'swal2-delete-popup',
                                loader: 'swal2-delete-loading'
                            }
                        });

                        // Submit the form
                        document.getElementById('delete-form-' + userId).submit();
                    }
                });
            }
        </script>
    </div>
@endsection
