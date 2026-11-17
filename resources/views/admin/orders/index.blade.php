@extends('layouts.admin')

@section('title', 'Pesanan Masuk')

@section('content')
    <div class="topbar">
        <div>
            <h2 class="page-title">Pesanan Masuk</h2>
            <p class="page-subtitle">Kelola antrean jahitan, status pembayaran, dan progres pengerjaan</p>
        </div>
        <div class="user-badge">
            <span class="user-dot"></span>
            <span>Feni Andini</span>
        </div>
    </div>

    <div class="toolbar-card">
        <form action="" method="GET">
            <input type="text" name="search" class="search-input" placeholder="Cari kode pesanan / pelanggan...">
        </form>

        <div class="filter-group">
            <a href="#" class="filter-pill active">Semua</a>
            <a href="#" class="filter-pill">Menunggu</a>
            <a href="#" class="filter-pill">Diproses</a>
            <a href="#" class="filter-pill">Dijahit</a>
            <a href="#" class="filter-pill">Selesai</a>
            <a href="#" class="filter-pill">Diambil</a>
        </div>
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Pelanggan</th>
                    <th>Pakaian</th>
                    <th>Pembayaran</th>
                    <th>Pelunasan Via</th>
                    <th>Revisi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>JHT-202611-014</strong></td>
                    <td>Rina Maharani</td>
                    <td>Gaun Pesta A-Line</td>
                    <td><span class="badge badge-mauve">DP</span></td>
                    <td>—</td>
                    <td>Tidak</td>
                    <td><span class="badge badge-berry">Dijahit</span></td>
                    <td><a href="#" class="btn-detail">Detail</a></td>
                </tr>
                <tr>
                    <td><strong>JHT-202611-013</strong></td>
                    <td>Dewi Lestari</td>
                    <td>Kebaya Modern Brokat</td>
                    <td><span class="badge badge-mauve">DP</span></td>
                    <td>—</td>
                    <td>Tidak</td>
                    <td><span class="badge badge-cocoa">Diproses</span></td>
                    <td><a href="#" class="btn-detail">Detail</a></td>
                </tr>
                <tr>
                    <td><strong>JHT-202610-011</strong></td>
                    <td>Rina Maharani</td>
                    <td>Rok Plisket Midi</td>
                    <td><span class="badge badge-dark">Lunas</span></td>
                    <td>QR</td>
                    <td>Ya (1x)</td>
                    <td><span class="badge badge-dark">Selesai</span></td>
                    <td><a href="#" class="btn-detail">Detail</a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection