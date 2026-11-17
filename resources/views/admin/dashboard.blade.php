@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="topbar">
        <div>
            <h2 class="page-title">Dashboard</h2>
            <p class="page-subtitle">Pantau aktivitas produksi dan pesanan pelanggan</p>
        </div>
        <div class="user-badge">
            <span class="user-dot"></span>
            <span>Feni Andini</span>
        </div>
    </div>

    @if(session('success'))
        <div class="alert-success">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div class="stats-grid">
        <div class="stat-card">
            <span class="stat-label">Pesanan Menunggu</span>
            <span class="stat-value" style="color: #CC7188;">{{ $menunggu ?? 0 }}</span>
        </div>
        <div class="stat-card">
            <span class="stat-label">Pesanan Diproses</span>
            <span class="stat-value" style="color: #CC7188;">{{ $diproses ?? 0 }}</span>
        </div>
        <div class="stat-card">
            <span class="stat-label">Pesanan Dijahit</span>
            <span class="stat-value" style="color: #CC7188;">{{ $dijahit ?? 0 }}</span>
        </div>
        <div class="stat-card">
            <span class="stat-label">Pesanan Selesai</span>
            <span class="stat-value" style="color: #CC7188;">{{ $selesai ?? 0 }}</span>
        </div>
        <div class="stat-card">
            <span class="stat-label">Pesanan Diambil</span>
            <span class="stat-value" style="color: #CC7188;">{{ $diambil ?? 0 }}</span>
        </div>
        <div class="stat-card">
            <span class="stat-label">Pesanan Dibatalkan</span>
            <span class="stat-value" style="color: #CC7188;">{{ $dibatalkan ?? 0 }}</span>
        </div>
    </div>
@endsection