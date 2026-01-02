@extends('layouts.sidebar')
@section('content')
    <div class="app-container">
        <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title" style="padding: 10px">
                        <h1>Buat Seminar</h1>
                    </div>
                </div>
            </header>

            <!-- Event Filters -->
            <section class="event-filters">
                <div class="container">
                    <div class="filter-container">
                        <div class="filter-group">
                            <label for="date">Date</label>
                            <select id="date" name="date">
                                <option value="">Any Date</option>
                                <option value="today">Today</option>
                                <option value="week">This Week</option>
                                <option value="month">This Month</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label for="location">Location</label>
                            <select id="location" name="location">
                                <option value="">All Locations</option>
                                <option value="main-auditorium">Main Auditorium</option>
                                <option value="business-school">Business School</option>
                                <option value="engineering-building">Engineering Building</option>
                                <option value="campus-square">Campus Square</option>
                            </select>
                        </div>
                        <div class="filter-group search-filter">
                            <label for="search">Search</label>
                            <div class="search-input">
                                <input type="text" id="search" name="search" placeholder="Search events...">
                                <button type="button" class="search-button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="create-event-button" style="margin-top: 20px;">
                            <a href="{{ route('panitia.event.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Buat Seminar Baru
                            </a>
                        </div>
                    </div>
                    <div class="view-toggle">
                        <button type="button" class="view-button active" data-view="grid">
                            <i class="fas fa-th"></i>
                        </button>
                        <button type="button" class="view-button" data-view="list">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
            </section>

            @if (session('success'))
                <div id="success-alert" class="success-alert-modern" style="margin-top: -15px; margin-bottom: 15px;">

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
                        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                        border-radius: 16px;
                        padding: 20px 24px;
                        box-shadow: 0 10px 40px rgba(102, 126, 234, 0.4);
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
                        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
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
                        color: #667eea;
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
            
            <!-- Events List -->
            <section class="events-list">
                <div class="container">
                    <div class="event-grid">
                        @forelse ($events as $event)
                            <div class="event-card">
                                <div class="event-image">
                                    <img src="https://images.pexels.com/photos/2774556/pexels-photo-2774556.jpeg"
                                        alt="{{ $event->nama_kegiatan }}">
                                    <div class="event-date">
                                        <span class="day">{{ $event->tanggal_display }}</span>
                                    </div>

                                </div>
                                <div class="event-content">
                                    <div class="event-category tech">Seminar</div>
                                    <h3 class="event-title">{{ $event->nama_kegiatan }}</h3>
                                    <div class="event-info">
                                        <p><i class="fas fa-pencil-alt"></i> Status : {{ $event->status }}</p>
                                    </div>
                                    <div class="event-footer">
                                        <a href="{{ route('panitia.event.createSesi', ['id_kegiatan' => $event->id_kegiatan]) }}"
                                            class="btn btn-sm btn-outline">Buat Sesi</a>
                                        <a href="{{ route('event.detailEvent', ['id' => $event->id_kegiatan]) }}"
                                            class="btn btn-sm btn-outline">Details Event</a>
                                        <a href="{{ route('panitia.event.edit', ['id_kegiatan' => $event->id_kegiatan]) }}"
                                            class="btn btn-sm btn-outline">Edit Event</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Tidak ada seminar yang tersedia.</p>
                        @endforelse
                    </div>

            </section>
        </main>
    </div>
@endsection
