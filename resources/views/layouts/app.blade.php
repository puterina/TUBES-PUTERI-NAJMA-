<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistem Manajemen Kos')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --brand: #0f766e;
            --brand-soft: #ccfbf1;
            --ink: #0f172a;
            --muted: #64748b;
            --line: #e2e8f0;
            --bg: #f6f8fa;
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); color: var(--ink); }

        /* Sidebar */
        .sidebar { width: 250px; min-height: 100vh; background: #fff; border-right: 1px solid var(--line); position: fixed; top: 0; left: 0; padding: 1.5rem 1rem; }
        .brand { display: flex; align-items: center; gap: .6rem; font-weight: 700; font-size: 1.1rem; margin-bottom: 2rem; padding: 0 .5rem; }
        .brand-icon { width: 36px; height: 36px; border-radius: 10px; background: var(--brand); color: #fff; display: grid; place-items: center; }
        .nav-label { font-size: .7rem; letter-spacing: .08em; text-transform: uppercase; color: var(--muted); padding: 0 .75rem; margin: 1rem 0 .4rem; }
        .side-link { display: flex; align-items: center; gap: .7rem; padding: .6rem .75rem; border-radius: 10px; color: var(--muted); text-decoration: none; font-weight: 500; font-size: .93rem; }
        .side-link:hover { background: var(--bg); color: var(--ink); }
        .side-link.active { background: var(--brand-soft); color: var(--brand); font-weight: 600; }
        .side-link.disabled { opacity: .45; pointer-events: none; }
        .main { margin-left: 250px; padding: 2rem; }

        /* Komponen */
        .card-clean { background: #fff; border: 1px solid var(--line); border-radius: 16px; }
        .stat { display: flex; align-items: center; gap: 1rem; padding: 1.1rem 1.25rem; }
        .stat-icon { width: 46px; height: 46px; border-radius: 12px; display: grid; place-items: center; font-size: 1.3rem; }
        .stat-num { font-size: 1.6rem; font-weight: 700; line-height: 1; }
        .stat-label { font-size: .82rem; color: var(--muted); }
        .btn-brand { background: var(--brand); color: #fff; border: 0; border-radius: 10px; padding: .55rem 1.1rem; font-weight: 600; }
        .btn-brand:hover { background: #0b5f59; color: #fff; }
        .form-control, .form-select { border-radius: 10px; border-color: var(--line); padding: .6rem .85rem; }
        .form-control:focus, .form-select:focus { border-color: var(--brand); box-shadow: 0 0 0 .2rem rgba(15,118,110,.15); }

        .table > :not(caption) > * > * { padding: .9rem 1rem; border-color: var(--line); }
        .table thead th { font-size: .75rem; text-transform: uppercase; letter-spacing: .05em; color: var(--muted); background: #fafbfc; font-weight: 600; }
        .table tbody tr:hover { background: #fafcfc; }
        .avatar { width: 38px; height: 38px; border-radius: 50%; background: var(--brand-soft); color: var(--brand); display: grid; place-items: center; font-weight: 700; flex-shrink: 0; }
        .pill { padding: .25rem .65rem; border-radius: 999px; font-size: .75rem; font-weight: 600; white-space: nowrap; }
        .pill-pagi { background: #fef3c7; color: #92400e; }
        .pill-siang { background: #e0f2fe; color: #075985; }
        .pill-malam { background: #e2e8f0; color: #334155; }
        .pill-aktif { background: #dcfce7; color: #166534; }
        .pill-nonaktif { background: #f1f5f9; color: #64748b; }
        .icon-btn { width: 34px; height: 34px; display: inline-grid; place-items: center; border-radius: 9px; border: 1px solid var(--line); background: #fff; color: var(--muted); }
        .icon-btn:hover { background: var(--bg); color: var(--ink); }
        .icon-btn.danger:hover { background: #fee2e2; color: #b91c1c; border-color: #fecaca; }

        @media (max-width: 768px) {
            .sidebar { display: none; }
            .main { margin-left: 0; padding: 1rem; }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="brand">
            <span class="brand-icon"><i class="bi bi-house-door-fill"></i></span>
            Kos Manager
        </div>

        <div class="nav-label">Menu</div>
        <a href="{{ route('housekeepers.index') }}"
           class="side-link {{ request()->routeIs('housekeepers.*') ? 'active' : '' }}">
            <i class="bi bi-person-badge"></i> Housekeeper
        </a>
        <a class="side-link disabled"><i class="bi bi-door-closed"></i> Master Kamar</a>
        <a class="side-link disabled"><i class="bi bi-people"></i> Data Penghuni</a>
        <a class="side-link disabled"><i class="bi bi-box-seam"></i> Inventaris Aset</a>
    </aside>

    <main class="main">
        @if (session('success'))
            <div class="alert alert-success border-0 rounded-3 d-flex align-items-center gap-2" role="alert">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>