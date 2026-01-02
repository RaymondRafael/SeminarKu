@extends('layouts.sidebar')

@section('content')
    {{-- Setup Logic PHP --}}
    @php
        $userId = session('user.id') ?? rand(100, 999);
        $timestamp = time();
        $qrString = 'PAY-SEMINAR-' . $kegiatan->id_kegiatan . '-' . $userId . '-' . $timestamp;
    @endphp

    <style>
        /* Scope Styles agar tidak merusak layout sidebar asli */
        :root {
            --primary: #435ebe;
            --bg-light: #f3f4f6;
            --text-dark: #25396f;
            --text-grey: #7c8db5;
        }

        /* Pastikan Container mengikuti layout sidebar */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
            background-color: var(--bg-light);
        }

        .dashboard-main {
            flex-grow: 1;
            padding: 30px;
            /* Jarak aman dari sidebar & atas */
            overflow-x: hidden;
            /* Mencegah scroll samping */
        }

        /* Header Styling */
        .header-title h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .header-subtitle {
            color: var(--text-grey);
            margin-bottom: 30px;
        }

        /* --- GRID SYSTEM BARU (2 Kolom) --- */
        .checkout-grid {
            display: grid;
            grid-template-columns: 1.8fr 1fr;
            /* Kiri 65%, Kanan 35% */
            gap: 25px;
            align-items: start;
        }

        /* Card Putih Bersih */
        .card-white {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #fff;
        }

        .card-header-text {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px dashed #e0e0e0;
        }

        /* Checkbox Sesi yang Elegan */
        .session-card {
            display: flex;
            align-items: center;
            background: #fff;
            border: 1px solid #e6e9ef;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: 0.2s;
            position: relative;
        }

        .session-card:hover {
            border-color: var(--primary);
            background-color: #f8faff;
            transform: translateY(-2px);
        }

        .custom-checkbox {
            width: 20px;
            height: 20px;
            margin-right: 15px;
            accent-color: var(--primary);
        }

        .session-info {
            flex: 1;
        }

        .session-name {
            font-weight: 700;
            color: var(--text-dark);
            display: block;
            margin-bottom: 4px;
        }

        .session-date {
            font-size: 0.85rem;
            color: var(--text-grey);
            display: block;
        }

        .session-price {
            font-weight: 800;
            color: var(--primary);
            font-size: 1rem;
        }

        /* Total Bar */
        .total-section {
            background-color: #eef1f6;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
        }

        .total-label {
            font-weight: 600;
            color: var(--text-dark);
        }

        .total-amount {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--primary);
        }

        /* Bagian Kanan (QR & Upload) */
        .timer-alert {
            background: #fff0f0;
            color: #d32f2f;
            padding: 12px;
            text-align: center;
            border-radius: 8px;
            font-weight: 700;
            border: 1px solid #ffdbdb;
            margin-bottom: 20px;
        }

        .qr-wrapper {
            /* Tambahkan 4 baris ini untuk centering yang sempurna */
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Ini yang bikin gambar ke tengah horizontal */
            justify-content: center;

            text-align: center;
            margin-bottom: 20px;
            padding: 20px;
            border: 2px dashed #e0e0e0;
            border-radius: 12px;
            background: #fafafc;
        }

        /* Tombol Upload */
        .upload-area {
            margin-bottom: 15px;
        }

        .btn-upload {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            width: 100%;
            padding: 12px;
            background: white;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            color: #6b7280;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-upload:hover {
            background: #f9fafb;
            border-color: #9ca3af;
        }

        .btn-confirm {
            width: 100%;
            padding: 14px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(67, 94, 190, 0.3);
            transition: 0.2s;
        }

        .btn-confirm:hover {
            background-color: #354a96;
            transform: translateY(-1px);
        }

        /* Responsif Mobile (Stack ke bawah) */
        @media (max-width: 992px) {
            .checkout-grid {
                grid-template-columns: 1fr;
            }

            .dashboard-main {
                padding: 20px;
            }
        }
    </style>

    {{-- GUNAKAN STRUKTUR ASLI SIDEBAR --}}
    <div class="dashboard-container">
        <main class="dashboard-main">

            {{-- Header Halaman --}}
            <div class="header-section">
                <div class="header-title">
                    <h1>Pembayaran Seminar</h1>
                </div>
                <p class="header-subtitle">Selesaikan pendaftaran untuk event:
                    <strong>{{ $kegiatan->nama_kegiatan }}</strong>
                </p>
            </div>

            <form method="POST" action="{{ route('peserta.event.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="tanggal_registrasi" value="{{ now() }}">
                <div class="checkout-grid">
                    {{-- KOLOM KIRI: Daftar Sesi --}}
                    <div class="left-col">
                        <div class="card-white">
                            <div class="card-header-text">Rincian Tagihan</div>

                            {{-- Alert Error --}}
                            @if ($errors->any())
                                <div class="alert alert-danger"
                                    style="background:#fde8e8; color:#c81e1e; padding:10px; border-radius:8px; margin-bottom:15px; font-size:0.9rem;">
                                    <ul style="margin:0; padding-left:20px;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <p style="margin-bottom: 15px; color: var(--text-grey); font-size: 0.9rem;">Pilih sesi yang
                                ingin diikuti:</p>

                            @foreach ($sesiKegiatans as $sesi)
                                <label class="session-card" for="sesi-{{ $sesi->id_detail_kegiatan }}">
                                    <input type="checkbox" id="sesi-{{ $sesi->id_detail_kegiatan }}"
                                        name="id_detail_kegiatan[]" value="{{ $sesi->id_detail_kegiatan }}"
                                        class="custom-checkbox session-check" data-price="{{ $sesi->biaya_registrasi }}"
                                        checked> {{-- Default Checked agar user langsung lihat harga --}}

                                    <div class="session-info">
                                        <span class="session-name">Sesi {{ $sesi->sesi }}: {{ $sesi->nama_sesi }}</span>
                                        <span class="session-date">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($sesi->tanggal)->format('d M Y') }} •
                                            <i class="far fa-clock"></i>
                                            {{ \Carbon\Carbon::parse($sesi->waktu_mulai)->format('H:i') }}
                                        </span>
                                    </div>
                                    <div class="session-price">
                                        Rp {{ number_format($sesi->biaya_registrasi, 0, ',', '.') }}
                                    </div>
                                </label>
                            @endforeach

                            <div class="total-section">
                                <span class="total-label">Total Yang Harus Dibayar</span>
                                <span class="total-amount" id="display-total">Rp 0</span>
                            </div>
                        </div>
                    </div>

                    {{-- KOLOM KANAN: Pembayaran --}}
                    <div class="right-col">
                        <div class="card-header-text" style="font-size:1rem; border:none; margin-bottom:10px;">
                            Upload Bukti Transfer
                        </div>

                        <div class="upload-area">
                            <input 
                            type="file" 
                            name="bukti_pembayaran" 
                            id="fileInput" 
                            accept="image/jpeg,image/png,image/jpg"
                            required>
                            <label for="fileInput" class="btn-upload" id="uploadLabel">
                                <i class="fas fa-cloud-upload-alt"></i> <span>Pilih File Bukti...</span>
                            </label>
                        </div>

                        <button type="submit" class="btn-confirm">
                            Konfirmasi Pembayaran
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>

    {{-- SCRIPT LOGIC --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. LOGIC TOTAL HARGA
            const checkboxes = document.querySelectorAll('.session-check');
            const totalDisplay = document.getElementById('display-total');

            function formatRupiah(angka) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(angka);
            }

            function calculateTotal() {
                let total = 0;
                checkboxes.forEach(box => {
                    if (box.checked) total += parseFloat(box.dataset.price);
                });
                totalDisplay.textContent = formatRupiah(total);
            }

            checkboxes.forEach(box => box.addEventListener('change', calculateTotal));
            calculateTotal();

            // 2. LOGIC UPLOAD FILE NAME
            const fileInput = document.getElementById('fileInput');
            const uploadLabel = document.getElementById('uploadLabel');
            const labelSpan = uploadLabel.querySelector('span');

            fileInput.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    let name = this.files[0].name;
                    if (name.length > 25) name = name.substring(0, 25) + '...';

                    labelSpan.textContent = name;
                    uploadLabel.style.borderColor = '#435ebe';
                    uploadLabel.style.color = '#435ebe';
                    uploadLabel.style.background = '#eef2ff';
                    uploadLabel.innerHTML = '<i class="fas fa-check-circle"></i> ' + name;
                }
            });

        });
    </script>
@endsection
