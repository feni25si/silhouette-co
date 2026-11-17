<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Silhouette & Co.</title>
    
    <!-- Google Fonts: Cormorant Upright & Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright:wght@600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-canvas: #FAF8F8;
            --bg-surface: #FFFFFF;
            --plum-dark: #2D1920;
            --plum-mid: #351E26;
            --cocoa: #4C3B40;
            --taupe: #73696C;
            --mauve: #9C7782;
            --berry: #CC7188;
        }

        /* Seluruh elemen default menggunakan Poppins */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--bg-canvas);
            color: var(--plum-dark);
            font-size: 13.5px;
            font-weight: 400;
            line-height: 1.5;
            display: flex;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* Sidebar */
        .sidebar {
            width: 245px;
            background: linear-gradient(180deg, var(--plum-mid) 0%, var(--plum-dark) 100%);
            color: #FFFFFF;
            padding: 24px 18px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .brand {
            padding-bottom: 16px;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--cocoa);
        }

        /* Logo menggunakan Cormorant Upright */
        .brand h1 {
            font-family: 'Cormorant Upright', serif !important;
            font-size: 28px;
            font-weight: 700;
            color: #FFFFFF;
            line-height: 1.1;
        }

        .brand h1 span {
            font-family: 'Cormorant Upright', serif !important;
            color: var(--berry);
        }

        .brand p {
            font-size: 9.5px;
            font-weight: 500;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: var(--mauve);
            margin-top: 4px;
        }

        .nav-group { margin-bottom: 18px; }

        .nav-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.3px;
            text-transform: uppercase;
            color: var(--mauve);
            padding: 0 12px;
            margin-bottom: 6px;
        }

        .nav-link {
            display: block;
            padding: 9px 14px;
            border-radius: 10px;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 400;
            margin-bottom: 3px;
            transition: 0.2s;
        }

        .nav-link:hover {
            background-color: rgba(76, 59, 64, 0.65);
            color: #FFFFFF;
        }

        .nav-link.active {
            background-color: var(--berry);
            color: #FFFFFF;
            font-weight: 600;
        }

        /* Main Area */
        .main-content {
            flex: 1;
            padding: 28px 34px;
            overflow-x: hidden;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
        }

        /* Judul Halaman menggunakan Cormorant Upright */
        .page-title, h2 {
            font-family: 'Cormorant Upright', serif !important;
            font-size: 32px;
            font-weight: 700;
            color: var(--plum-dark);
            line-height: 1.1;
        }

        .page-subtitle {
            font-size: 13px;
            color: var(--taupe);
            margin-top: 3px;
        }

        .user-badge {
            background: var(--bg-surface);
            border: 1px solid rgba(156, 119, 130, 0.35);
            padding: 7px 16px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .user-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--berry);
        }

        /* Alert */
        .alert-success {
            background: rgba(156, 119, 130, 0.15);
            border: 1px solid rgba(156, 119, 130, 0.4);
            color: var(--plum-mid);
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        /* Kartu Statistik Dashboard */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--bg-surface);
            border: 1px solid rgba(156, 119, 130, 0.25);
            border-radius: 14px;
            padding: 16px 18px;
            transition: 0.2s;
        }

        .stat-card:hover { border-color: var(--berry); }

        .stat-label {
            font-size: 12.5px;
            font-weight: 500;
            color: var(--taupe);
            margin-bottom: 6px;
            display: block;
        }

        .stat-value {
            font-size: 26px;
            font-weight: 600;
            color: var(--plum-dark);
            line-height: 1.2;
        }

        /* Toolbar Pencarian & Filter */
        .toolbar-card {
            background: var(--bg-surface);
            border: 1px solid rgba(156, 119, 130, 0.25);
            border-radius: 14px;
            padding: 14px 18px;
            margin-bottom: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .search-input {
            padding: 8px 14px;
            border: 1px solid rgba(156, 119, 130, 0.35);
            border-radius: 10px;
            background: var(--bg-canvas);
            font-size: 13px;
            color: var(--plum-dark);
            width: 250px;
            outline: none;
        }

        .search-input:focus { border-color: var(--berry); }

        .filter-group {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .filter-pill {
            padding: 6px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 500;
            text-decoration: none;
            background: var(--bg-canvas);
            color: var(--taupe);
            border: 1px solid rgba(156, 119, 130, 0.25);
            transition: 0.2s;
        }

        .filter-pill:hover, .filter-pill.active {
            background: var(--plum-dark);
            color: #FFFFFF;
            border-color: var(--plum-dark);
        }

        /* Tabel */
        .table-card {
            background: var(--bg-surface);
            border: 1px solid rgba(156, 119, 130, 0.25);
            border-radius: 14px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead tr {
            background: var(--plum-mid);
            color: #FFFFFF;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        th, td { padding: 12px 16px; }

        tbody tr {
            border-bottom: 1px solid rgba(156, 119, 130, 0.15);
            font-size: 13px;
        }

        tbody tr:hover { background: var(--bg-canvas); }

        /* Badge Status & Tombol */
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 11.5px;
            font-weight: 500;
        }

        .badge-berry { background: rgba(204, 113, 136, 0.16); color: var(--berry); }
        .badge-mauve { background: rgba(156, 119, 130, 0.18); color: var(--mauve); }
        .badge-cocoa { background: rgba(115, 105, 108, 0.16); color: var(--cocoa); }
        .badge-dark  { background: var(--plum-mid); color: #FFFFFF; }

        .btn-detail {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 500;
            text-decoration: none;
            background: var(--bg-canvas);
            color: var(--plum-mid);
            border: 1px solid rgba(156, 119, 130, 0.4);
            transition: 0.2s;
        }

        .btn-detail:hover {
            background: var(--berry);
            color: #FFFFFF;
            border-color: var(--berry);
        }

        @media (max-width: 768px) {
            body { flex-direction: column; }
            .sidebar { width: 100%; }
            .main-content { padding: 18px; }
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div>
            <div class="brand">
                <h1>Silhouette <span>&</span> Co.</h1>
                <p>Fashion & Tailoring</p>
            </div>

            <div class="nav-group">
                <a href="/admin/dashboard" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">Dashboard</a>
            </div>

            <div class="nav-group">
                <div class="nav-label">Operasional</div>
                <a href="/admin/orders" class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }}">Pesanan Masuk</a>
                <a href="/admin/bookings" class="nav-link">Booking & Kalender</a>
                <a href="/admin/sizes" class="nav-link">Ukuran Pelanggan</a>
            </div>

            <div class="nav-group">
                <div class="nav-label">Konten</div>
                <a href="/admin/categories" class="nav-link">Kategori Layanan</a>
                <a href="/admin/services" class="nav-link">Katalog Layanan</a>
                <a href="/admin/portfolios" class="nav-link">Galeri Portofolio</a>
                <a href="/admin/articles" class="nav-link">Artikel & Tips</a>
                <a href="/admin/testimonials" class="nav-link">Testimoni</a>
            </div>

            <div class="nav-group">
                <div class="nav-label">Pengaturan</div>
                <a href="/admin/profile" class="nav-link">Profil Usaha</a>
                <a href="/admin/accounts" class="nav-link">Kelola Akun</a>
            </div>
        </div>
    </aside>

    <main class="main-content">
        @yield('content')
    </main>

</body>
</html>