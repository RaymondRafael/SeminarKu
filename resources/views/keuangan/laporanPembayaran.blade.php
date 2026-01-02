@extends('layouts.sidebar')

@section('content')
    <style>
        /* Styling Tambahan untuk Badge Status */
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }

        .badge-lunas {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .badge-tolak {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .badge-pending {
            background-color: #fef3c7;
            color: #92400e;
            border: 1px solid #fde68a;
        }

        /* Container Table & Layout */
        .dashboard-content {
            padding: 20px;
        }

        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-top: 20px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            background: #f8f9fa;
            color: #4b5563;
            font-weight: 600;
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #e5e7eb;
        }

        .data-table td {
            padding: 15px;
            border-bottom: 1px solid #f3f4f6;
            vertical-align: middle;
            color: #1f2937;
        }

        .data-table tr:hover {
            background-color: #f9fafb;
        }

        /* Tombol & Modal Styling (Sama seperti sebelumnya) */
        .btn-icon {
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.2s;
            margin: 0 2px;
        }

        .view-receipt {
            background: #e0f2fe;
            color: #0284c7;
        }

        .approve {
            background: #dcfce7;
            color: #16a34a;
        }

        .reject {
            background: #fee2e2;
            color: #dc2626;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .modal-box {
            background: white;
            padding: 25px;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            cursor: pointer;
            font-size: 1.2rem;
            color: #9ca3af;
        }

        /* Modern SweetAlert2 Styling */
        .modern-swal-popup {
            border-radius: 20px !important;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3) !important;
            padding: 30px !important;
        }

        .modern-swal-confirm,
        .modern-swal-confirm-danger,
        .modern-swal-cancel {
            padding: 12px 32px !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
            font-size: 15px !important;
            transition: all 0.3s ease !important;
            border: none !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
        }

        .modern-swal-confirm {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
        }

        .modern-swal-confirm:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4) !important;
        }

        .modern-swal-confirm-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%) !important;
        }

        .modern-swal-confirm-danger:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4) !important;
        }

        .modern-swal-cancel {
            background: #f3f4f6 !important;
            color: #374151 !important;
        }

        .modern-swal-cancel:hover {
            background: #e5e7eb !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1) !important;
        }

        /* Icon Styling */
        .swal2-icon {
            border-width: 3px !important;
            width: 70px !important;
            height: 70px !important;
        }

        .swal2-icon.swal2-question {
            border-color: #667eea !important;
            color: #667eea !important;
        }

        .swal2-icon.swal2-warning {
            border-color: #f59e0b !important;
            color: #f59e0b !important;
        }

        /* Title Styling */
        .swal2-title {
            font-size: 24px !important;
            font-weight: 700 !important;
            color: #1f2937 !important;
            margin-bottom: 20px !important;
        }

        /* HTML Content */
        .swal2-html-container {
            margin: 20px 0 !important;
            font-size: 15px !important;
            line-height: 1.6 !important;
        }

        /* Loading State */
        .swal2-loading .swal2-title {
            color: #667eea !important;
        }
    </style>

    <div class="dashboard-container">
        <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle"><i class="fas fa-bars"></i></button>
                    <div class="header-title" style="padding: 10px">
                        <h1>Keuangan Dashboard</h1>
                    </div>
                </div>
            </header>

            @if (session('success'))
    <div id="success-alert" class="success-alert-modern" style="margin: 20px;">
        
        <!-- Icon Circle with Animation -->
        <div class="success-icon-wrapper">
            <div class="success-icon-circle">
                <i class="fas fa-check"></i>
            </div>
        </div>

        <!-- Content -->
        <div class="success-content">
            <strong class="success-title">Berhasil!</strong>
            <span class="success-message">{{ session('success') }}</span>
        </div>

        <!-- Close Button -->
        <button onclick="closeSuccessAlert()" class="success-close-btn">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <style>
        .success-alert-modern {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 16px;
            padding: 20px 24px;
            box-shadow: 0 10px 40px rgba(16, 185, 129, 0.4);
            display: flex;
            align-items: center;
            gap: 16px;
            position: relative;
            overflow: hidden;
            animation: slideInDown 0.5s ease-out;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        /* Background Pattern */
        .success-alert-modern::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        /* Icon Wrapper with Animation */
        .success-icon-wrapper {
            position: relative;
            z-index: 1;
            flex-shrink: 0;
        }

        .success-icon-circle {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: bounceIn 0.6s ease-out;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .success-icon-circle i {
            color: #10b981;
            font-size: 24px;
            animation: checkPop 0.4s ease-out 0.3s both;
        }

        /* Content Styling */
        .success-content {
            flex: 1;
            position: relative;
            z-index: 1;
            color: white;
        }

        .success-title {
            display: block;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 4px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .success-message {
            display: block;
            font-size: 14px;
            opacity: 0.95;
            line-height: 1.5;
        }

        /* Close Button */
        .success-close-btn {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
            backdrop-filter: blur(10px);
        }

        .success-close-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg) scale(1.1);
        }

        .success-close-btn i {
            color: white;
            font-size: 18px;
        }

        /* Animations */
        @keyframes slideInDown {
            from {
                transform: translateY(-100px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes checkPop {
            0% {
                transform: scale(0);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes slideOutUp {
            from {
                transform: translateY(0);
                opacity: 1;
            }
            to {
                transform: translateY(-100px);
                opacity: 0;
            }
        }

        /* Responsive */
        @media (max-width: 640px) {
            .success-alert-modern {
                padding: 16px 20px;
            }

            .success-icon-circle {
                width: 44px;
                height: 44px;
            }

            .success-icon-circle i {
                font-size: 20px;
            }

            .success-title {
                font-size: 16px;
            }

            .success-message {
                font-size: 13px;
            }
        }
    </style>

    <script>
        function closeSuccessAlert() {
            const alert = document.getElementById('success-alert');
            alert.style.animation = 'slideOutUp 0.4s ease-in forwards';
            setTimeout(() => {
                alert.remove();
            }, 400);
        }

        // Auto close after 5 seconds
        setTimeout(() => {
            const alert = document.getElementById('success-alert');
            if (alert) {
                closeSuccessAlert();
            }
        }, 5000);
    </script>
@endif

            <div class="dashboard-content">
                <div class="dashboard-welcome">
                    <h2>Manajemen Keuangan</h2>
                    <p>Verifikasi pembayaran peserta seminar</p>
                </div>

                <div style="margin: 20px 0;">
                    <form method="GET" action="{{ route('keuangan.laporanPembayaran') }}"
                        style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">

                        {{-- Filter 1: Nama Event --}}
                        <div>
                            <label style="font-weight: 600; color: #374151; display:block; margin-bottom:5px;">Filter
                                Event:</label>
                            <select name="event" onchange="this.form.submit()"
                                style="background: white; border: 1px solid #d1d5db; padding: 10px; border-radius: 8px; min-width: 250px;">
                                <option value="">🔍 Semua Seminar</option>
                                @foreach ($allEvents as $event)
                                    <option value="{{ $event->id_kegiatan }}"
                                        {{ request('event') == $event->id_kegiatan ? 'selected' : '' }}>
                                        {{ $event->nama_kegiatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Filter 2: Status (BARU) --}}
                        <div>
                            <label style="font-weight: 600; color: #374151; display:block; margin-bottom:5px;">Filter
                                Status:</label>
                            <select name="status" onchange="this.form.submit()"
                                style="background: white; border: 1px solid #d1d5db; padding: 10px; border-radius: 8px; min-width: 150px;">
                                <option value="">📂 Semua Data</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>⏳ Menunggu
                                </option>
                                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>✅ Selesai
                                </option>
                            </select>
                        </div>

                    </form>
                </div>

                <div class="section pending-payments">
                    <div class="section-header">
                        <h3>Daftar Transaksi</h3>
                    </div>

                    <div class="table-container">
                        <div style="overflow-x: auto;">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Peserta</th>
                                        <th>Info Sesi</th>
                                        <th>Biaya</th>
                                        <th>Tanggal</th>
                                        <th>Bukti</th>
                                        <th style="text-align: center;">Status / Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($registrasiData as $reg)
                                        <tr>
                                            <td>
                                                <div style="font-weight: bold;">{{ $reg->user->nama }}</div>
                                                <div style="font-size: 0.85rem; color: #6b7280;">{{ $reg->user->email }}
                                                </div>
                                            </td>
                                            <td>
                                                {{ $reg->detailKegiatan->nama_sesi ?? 'N/A' }}<br>
                                                <small style="color: #6b7280;">Sesi
                                                    {{ $reg->detailKegiatan->sesi }}</small>
                                            </td>
                                            <td style="font-weight: 600; color: #435ebe;">
                                                Rp {{ number_format($reg->detailKegiatan->biaya_registrasi, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($reg->tanggal_registrasi)->format('d M Y') }}
                                            </td>
                                            <td>
                                                @if ($reg->bukti_pembayaran)
                                                    <button type="button" class="btn-icon view-receipt"
                                                        onclick="openImageModal('{{ asset('storage/' . $reg->bukti_pembayaran) }}')">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                @else
                                                    <span class="text-red-500 text-sm">Empty</span>
                                                @endif
                                            </td>

                                            <!-- Tambahkan SweetAlert2 CDN di head jika belum ada -->
                                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                            <td style="text-align: center;">
                                                @if ($reg->status_konfirmasi == 'Pending')
                                                    <div style="display: flex; gap: 5px; justify-content: center;">
                                                        <form id="approve-form-{{ $reg->id_registrasi }}"
                                                            action="{{ route('keuangan.terima', $reg->id_registrasi) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="button" class="btn-icon approve" title="Setujui"
                                                                onclick="confirmApprove('{{ $reg->id_registrasi }}', '{{ $reg->nama ?? 'peserta ini' }}')">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </form>
                                                        <button type="button" class="btn-icon reject" title="Tolak"
                                                            onclick="confirmReject('{{ route('keuangan.tolak', $reg->id_registrasi) }}', '{{ $reg->nama ?? 'peserta ini' }}')">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                @elseif($reg->status_konfirmasi == 'Disetujui')
                                                    <span class="badge badge-lunas"><i class="fas fa-check-circle"></i>
                                                        Lunas</span>
                                                @elseif($reg->status_konfirmasi == 'Ditolak')
                                                    <span class="badge badge-tolak"><i class="fas fa-ban"></i>
                                                        Ditolak</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" style="text-align: center; padding: 30px; color: #6b7280;">
                                                Tidak ada data pembayaran yang sesuai filter.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="imageModal" class="modal-overlay" onclick="closeModals(event)">
        <div class="modal-box" style="text-align: center;">
            <span class="close-modal" onclick="document.getElementById('imageModal').style.display='none'">&times;</span>
            <h3 style="margin-top:0;">Bukti Transfer</h3>
            <img id="modalImageSrc" src=""
                style="max-width: 100%; max-height: 70vh; margin-top: 15px; border-radius: 4px;">
        </div>
    </div>

    <div id="rejectModal" class="modal-overlay">
        <div class="modal-box">
            <span class="close-modal" onclick="document.getElementById('rejectModal').style.display='none'">&times;</span>
            <h3 style="margin-top:0; color:#dc2626;">Tolak Pembayaran</h3>
            <form id="rejectForm" method="POST" action="">
                @csrf
                <label style="display:block; margin: 15px 0 5px;">Alasan Penolakan:</label>
                <textarea name="alasan_penolakan" rows="3"
                    style="width: 100%; padding: 10px; border:1px solid #ccc; border-radius:6px;" required></textarea>
                <div style="text-align: right; margin-top: 15px;">
                    <button type="submit"
                        style="padding: 8px 15px; background: #dc2626; color: white; border: none; border-radius: 6px; cursor: pointer;">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openImageModal(src) {
            document.getElementById('modalImageSrc').src = src;
            document.getElementById('imageModal').style.display = 'flex';
        }

        function openRejectModal(url) {
            document.getElementById('rejectForm').action = url;
            document.getElementById('rejectModal').style.display = 'flex';
        }

        function closeModals(e) {
            if (e.target.classList.contains('modal-overlay')) e.target.style.display = 'none';
        }

        // Konfirmasi Setujui Pembayaran
        function confirmApprove(registrasiId, namaPeserta) {
            Swal.fire({
                title: 'Setujui Pembayaran?',
                html: `
            <div style="text-align: left; padding: 10px 20px;">
                <p style="margin-bottom: 10px; color: #666;">Anda akan menyetujui pembayaran</p>
                <p style="color: #888; font-size: 14px;">
                    <i class="fas fa-info-circle" style="margin-right: 5px;"></i>
                    Setelah disetujui, status akan berubah menjadi <strong>Lunas</strong>
                </p>
            </div>
        `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Setujui',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'modern-swal-popup',
                    confirmButton: 'modern-swal-confirm',
                    cancelButton: 'modern-swal-cancel'
                },
                showClass: {
                    popup: 'animate__animated animate__fadeInDown animate__faster'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp animate__faster'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan loading
                    Swal.fire({
                        title: 'Memproses...',
                        html: 'Sedang menyetujui pembayaran',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Submit form
                    document.getElementById('approve-form-' + registrasiId).submit();
                }
            });
        }

        // Konfirmasi Tolak Pembayaran
        function confirmReject(rejectUrl, namaPeserta) {
            Swal.fire({
                title: 'Tolak Pembayaran?',
                html: `
            <div style="text-align: left; padding: 10px 20px;">
                <p style="margin-bottom: 10px; color: #666;">Anda akan menolak pembayaran</p>
                <p style="color: #dc2626; font-size: 14px; background: #fee2e2; padding: 10px; border-radius: 8px; border-left: 4px solid #ef4444;">
                    <i class="fas fa-exclamation-triangle" style="margin-right: 5px;"></i>
                    <strong>Perhatian:</strong> Tindakan ini akan menolak pembayaran peserta
                </p>
            </div>
        `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Tolak',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'modern-swal-popup',
                    confirmButton: 'modern-swal-confirm-danger',
                    cancelButton: 'modern-swal-cancel'
                },
                showClass: {
                    popup: 'animate__animated animate__fadeInDown animate__faster'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp animate__faster'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    openRejectModal(rejectUrl);
                }
            });
        }
    </script>
@endsection
