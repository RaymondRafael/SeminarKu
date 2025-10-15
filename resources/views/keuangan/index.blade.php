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
                    <h1>Keuangan Dashboard</h1>
                </div>
            </div>
        </header>

        @if (session('success'))
        <div id="success-alert"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 flex justify-between items-center gap-4"
            role="alert" style="width: 100%;">
            <div class="flex items-start gap-2">
                <i class="fas fa-check-circle text-green-600 mt-1 text-lg"></i>
                <div>
                    <strong class="font-semibold">Success!</strong>
                    <span class="block">{{ session('success') }}</span>
                </div>
            </div>
            <button onclick="document.getElementById('success-alert').remove()"
                class="text-green-700 hover:text-green-900 focus:outline-none self-center">
                <i class="fas fa-times text-xl" style="margin-right: 20px"></i>
            </button>
        </div>
        @endif

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="dashboard-welcome">
                <h2>Manajemen Keuangan</h2>
                <p>Mengelola pembayaran dan catatan keuangan untuk event universitas</p>
            </div>
        </div>
    </main>
</div>
@endsection
