<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'REGISTER SISWA PKL')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --paper: #F3F0E9;
            --paper-2: #E9E4D8;
            --ink: #111111;
            --red: #E6392F;
            --blue: #1D4ED8;
            --green: #3DDC84;
            --yellow: #FFD400;
            --border: 3px solid var(--ink);
            --border-sm: 2px solid var(--ink);
            --shadow: 6px 6px 0 var(--ink);
            --sidebar-w: 250px;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            font-family: "Space Mono", "Courier New", monospace;
            background: var(--paper);
            color: var(--ink);
            line-height: 1.55;
            font-size: 15px;
        }
        h1, h2, h3, .display {
            font-family: "Archivo Black", "Arial Black", sans-serif;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -.5px;
            line-height: 1.05;
        }

        /* ================= LAYOUT SHELL ================= */
        .shell { display: flex; min-height: 100vh; }

        /* ---- SIDEBAR ---- */
        .sidebar {
            width: var(--sidebar-w);
            flex: 0 0 var(--sidebar-w);
            background: var(--ink);
            color: var(--paper);
            border-right: var(--border);
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }
        .sidebar .sb-brand {
            padding: 22px 20px;
            border-bottom: var(--border-sm);
        }
        .sidebar .sb-brand .code {
            display: inline-block;
            font-size: 11px;
            letter-spacing: 3px;
            background: var(--yellow);
            color: var(--ink);
            padding: 3px 8px;
            border: var(--border-sm);
            font-weight: 700;
            margin-bottom: 12px;
        }
        .sidebar .sb-brand .name {
            font-family: "Archivo Black", "Arial Black", sans-serif;
            text-transform: uppercase;
            font-size: 20px;
            line-height: 1.05;
        }
        .sidebar .sb-brand .sub {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            opacity: .55;
            margin-top: 6px;
        }

        .sb-nav { padding: 14px 12px; flex: 1; }
        .sb-nav .sect {
            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--yellow);
            opacity: .8;
            padding: 12px 10px 6px;
            font-weight: 700;
        }
        .sb-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 12px;
            margin-bottom: 4px;
            color: var(--paper);
            font-family: "Space Mono", monospace;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            border: 2px solid transparent;
            transition: background .08s ease, color .08s ease, transform .08s ease;
        }
        .sb-nav a .ic {
            width: 24px; height: 24px;
            display: inline-flex; align-items: center; justify-content: center;
            border: 2px solid var(--paper);
            font-family: "Space Mono", monospace;
            font-size: 11px; font-weight: 700; color: var(--ink);
            background: var(--paper);
            flex: 0 0 24px;
        }
        .sb-nav a:hover { background: var(--paper); color: var(--ink); }
        .sb-nav a:hover .ic { border-color: var(--ink); }
        .sb-nav a.active { background: var(--yellow); color: var(--ink); border-color: var(--paper); }
        .sb-nav a.active .ic { border-color: var(--ink); }

        .sidebar .sb-foot {
            padding: 16px 20px;
            border-top: var(--border-sm);
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            opacity: .5;
        }

        /* ---- MAIN COLUMN ---- */
        .main { flex: 1; min-width: 0; display: flex; flex-direction: column; }

        .topbar {
            background: var(--ink);
            color: var(--paper);
            border-bottom: var(--border);
            padding: 14px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }
        .topbar .crumb { font-size: 11px; letter-spacing: 2px; text-transform: uppercase; }
        .topbar .crumb span { opacity: .55; }
        .topbar .crumb b { background: var(--yellow); color: var(--ink); padding: 2px 8px; font-weight: 700; }
        .topbar .tick {
            font-size: 11px; letter-spacing: 2px; text-transform: uppercase;
            background: var(--paper); color: var(--ink); padding: 4px 10px; font-weight: 700;
        }

        .content { flex: 1; padding: 0 32px 60px; }

        .pagehead {
            padding: 40px 0 28px;
            border-bottom: var(--border);
            position: relative;
            margin-bottom: 32px;
        }
        .pagehead h1 { font-size: clamp(30px, 5vw, 52px); }
        .pagehead .eyebrow {
            display: inline-block;
            font-size: 12px;
            letter-spacing: 4px;
            text-transform: uppercase;
            font-weight: 700;
            background: var(--red);
            color: var(--paper);
            padding: 4px 12px;
            margin-bottom: 14px;
        }
        .pagehead .meta {
            margin-top: 14px;
            font-size: 12px;
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .pagehead .meta span b { background: var(--ink); color: var(--paper); padding: 2px 6px; font-weight: 700; }

        /* ---- TOOLBAR ---- */
        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }
        .toolbar .label {
            font-family: "Archivo Black", "Arial Black", sans-serif;
            font-size: 14px;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding-left: 12px;
            border-left: 12px solid var(--red);
        }

        /* ---- BUTTONS ---- */
        .btn {
            display: inline-block;
            font-family: "Space Mono", monospace;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
            padding: 12px 22px;
            background: var(--yellow);
            color: var(--ink);
            border: var(--border);
            box-shadow: var(--shadow);
            cursor: pointer;
            text-decoration: none;
            transition: transform .06s ease, box-shadow .06s ease, background .06s ease;
        }
        .btn:hover { transform: translate(3px, 3px); box-shadow: 2px 2px 0 var(--ink); }
        .btn:active { transform: translate(6px, 6px); box-shadow: 0 0 0 var(--ink); }
        .btn-primary { background: var(--blue); color: var(--paper); }
        .btn-danger { background: var(--red); color: var(--paper); }
        .btn-ink { background: var(--ink); color: var(--paper); }
        .btn-green { background: var(--green); color: var(--ink); }
        .btn-sm { padding: 6px 12px; font-size: 12px; box-shadow: 4px 4px 0 var(--ink); }

        /* ---- ALERT ---- */
        .alert {
            border: var(--border);
            background: var(--green);
            padding: 14px 18px;
            margin-bottom: 28px;
            font-weight: 700;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .alert::before { content: "■"; font-size: 20px; }

        /* ---- TABLE ---- */
        .tablebox { border: var(--border); background: var(--paper); box-shadow: var(--shadow); }
        .tablebox .tbl-head {
            display: flex; justify-content: space-between; align-items: center;
            background: var(--ink); color: var(--paper);
            padding: 10px 16px; font-family: "Archivo Black", sans-serif;
            letter-spacing: 2px; font-size: 13px; text-transform: uppercase;
        }
        .table-scroll { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        thead th {
            text-align: left;
            background: var(--paper);
            color: var(--ink);
            padding: 12px 14px;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-bottom: var(--border);
            font-weight: 700;
            white-space: nowrap;
        }
        tbody td {
            padding: 12px 14px;
            border-bottom: 2px solid var(--ink);
            vertical-align: middle;
        }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:nth-child(even) { background: var(--paper-2); }
        tbody tr:hover { background: var(--yellow); }
        td .nick { font-family: "Archivo Black", "Arial Black", sans-serif; text-transform: uppercase; font-size: 13px; }
        td .sub { font-size: 12px; opacity: .65; text-transform: uppercase; letter-spacing: 1px; }
        td.num { font-weight: 700; }

        /* ---- BADGE/STATUS ---- */
        .badge {
            display: inline-block;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 1px;
            padding: 3px 8px;
            border: 2px solid var(--ink);
        }
        .badge-aktif { background: var(--green); color: var(--ink); }
        .badge-selesai { background: var(--blue); color: var(--paper); }
        .badge-berhenti { background: var(--red); color: var(--paper); }
        .mb-1 { margin-bottom: 4px; }

        .actions { display: flex; gap: 8px; flex-wrap: wrap; }

        /* ---- EMPTY ---- */
        .empty { padding: 48px 24px; text-align: center; }
        .empty .stamp {
            font-family: "Archivo Black", sans-serif;
            font-size: 20px; text-transform: uppercase;
            border: 4px solid var(--red); color: var(--red);
            display: inline-block; padding: 10px 18px;
            transform: rotate(-3deg); letter-spacing: 2px;
        }
        .empty p { margin-top: 18px; }

        /* ---- FORMS ---- */
        .formbox { border: var(--border); background: var(--paper); box-shadow: var(--shadow); }
        .formbox .fb-head {
            background: var(--ink); color: var(--paper);
            padding: 14px 20px; font-family: "Archivo Black", sans-serif;
            letter-spacing: 2px; font-size: 15px; text-transform: uppercase;
            border-bottom: var(--border);
        }
        .formbox form { padding: 24px 20px; }
        .frow { display: grid; grid-template-columns: 1fr 1fr; gap: 20px 24px; }
        .fgroup label {
            display: block; font-size: 12px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px;
        }
        .fgroup label b { color: var(--red); }
        .fgroup input, .fgroup select, .fgroup textarea {
            width: 100%;
            font-family: "Space Mono", monospace;
            font-size: 15px;
            padding: 10px 12px;
            background: #fff;
            color: var(--ink);
            border: 2px solid var(--ink);
            border-radius: 0;
            outline: none;
            transition: box-shadow .06s ease;
        }
        .fgroup textarea { resize: vertical; }
        .fgroup input:focus, .fgroup select:focus, .fgroup textarea:focus {
            box-shadow: 4px 4px 0 var(--blue);
            border-color: var(--ink);
        }
        .fgroup input.error, .fgroup select.error, .fgroup textarea.error { border-color: var(--red); background: #fde; }
        .err { color: var(--red); font-size: 12px; font-weight: 700; margin-top: 4px; text-transform: uppercase; }
        .factions { margin-top: 28px; display: flex; gap: 14px; flex-wrap: wrap; }
        .fnote { margin-top: 22px; font-size: 12px; opacity: .6; text-transform: uppercase; letter-spacing: 1px; }

        /* ---- CHECKBOX GRID ---- */
        .ckgrid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px 20px; margin-top: 10px; }
        .ck label { display: flex; align-items: center; gap: 10px; font-size: 14px; margin-bottom: 0; cursor: pointer; }
        .ck input[type="checkbox"] {
            width: 20px; height: 20px; accent-color: var(--blue);
            border: 2px solid var(--ink); cursor: pointer;
        }

        /* ---- PAGE FOOTER ---- */
        .pagefoot {
            border-top: var(--border);
            background: var(--ink); color: var(--paper);
            padding: 20px 28px;
            font-size: 12px; letter-spacing: 1px; text-transform: uppercase;
            display: flex; justify-content: space-between; gap: 14px; flex-wrap: wrap;
        }
        .barcode {
            font-family: "Space Mono", monospace;
            letter-spacing: 6px; color: var(--yellow);
            font-size: 16px; font-weight: 700;
        }

        /* ---- SIDEBAR MOBILE TOGGLE ---- */
        .menu-toggle {
            display: none;
            background: var(--yellow); color: var(--ink);
            border: var(--border); box-shadow: var(--shadow);
            font-family: "Archivo Black", sans-serif;
            font-size: 13px; letter-spacing: 1px; text-transform: uppercase;
            padding: 10px 16px; cursor: pointer;
        }
        .scrim {
            display: none; position: fixed; inset: 0;
            background: rgba(17,17,17,.5); z-index: 49;
        }

        @media (max-width: 820px) {
            .menu-toggle { display: inline-block; }
            .sidebar {
                position: fixed; left: 0; top: 0;
                z-index: 50;
                transform: translateX(-100%);
                transition: transform .18s ease;
                height: 100vh;
            }
            body.sb-open .sidebar { transform: translateX(0); box-shadow: 8px 0 0 rgba(17,17,17,.25); }
            body.sb-open .scrim { display: block; }
            .topbar .crumb { display: none; }
            .content { padding: 0 18px 40px; }
            .frow { grid-template-columns: 1fr; }
            .pagehead { padding: 28px 0 22px; }
        }
    </style>
</head>
<body id="app">
    <div class="shell">
        <aside class="sidebar">
            <div class="sb-brand">
                <span class="code">REGISTER//01</span>
                <div class="name">Daftar<br>Siswa PKL</div>
                <div class="sub">Kartu Internship</div>
            </div>

            <nav class="sb-nav">
                <div class="sect">Menu Utama</div>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="ic">01</span> Dashboard
                </a>
                <a href="{{ route('siswa.index') }}" class="{{ request()->routeIs('siswa.*') ? 'active' : '' }}">
                    <span class="ic">02</span> Siswa
                </a>
                <a href="{{ route('perusahaan.index') }}" class="{{ request()->routeIs('perusahaan.*') ? 'active' : '' }}">
                    <span class="ic">03</span> Perusahaan
                </a>
                <a href="{{ route('kompetensi.index') }}" class="{{ request()->routeIs('kompetensi.*') ? 'active' : '' }}">
                    <span class="ic">04</span> Kompetensi
                </a>
            </nav>

            <div class="sb-foot">Arsip Pusat // PKL Office</div>
        </aside>

        <div class="scrim" onclick="document.body.classList.remove('sb-open')"></div>

        <div class="main">
            <header class="topbar">
                <span class="menu-toggle" onclick="document.body.classList.toggle('sb-open')">☰ Menu</span>
                <span class="crumb">PKL Office <span>/</span> <b>@yield('crumb', 'Papan Kontrol')</b></span>
                <span class="tick">{{ now()->format('d M Y') }}</span>
            </header>

            <div class="content">
                <header class="pagehead">
                    <span class="eyebrow">Arsip ● Data ● Internship</span>
                    <h1>@yield('title', 'Register Siswa PKL')</h1>
                    <div class="meta">
                        <span>Status: <b>OPEN</b> untuk pendaftaran</span>
                        <span>Entri: <b>MANUAL</b></span>
                    </div>
                </header>

                @if (session('success'))
                    <div class="alert">Ter-record! {{ session('success') }}</div>
                @endif

                <main>
                    @yield('content')
                </main>
            </div>

            <footer class="pagefoot">
                <span>© Sekolah &mdash; Kartu Register PKL</span>
                <span class="barcode">||| ||||| ||||</span>
            </footer>
        </div>
    </div>
</body>
</html>
