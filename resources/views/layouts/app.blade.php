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
            --ink: #111111;
            --red: #E6392F;
            --blue: #1D4ED8;
            --yellow: #FFD400;
            --border: 3px solid var(--ink);
            --shadow: 6px 6px 0 var(--ink);
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

        /* ---- TOP STRIP ---- */
        .topstrip {
            background: var(--ink);
            color: var(--paper);
            border-bottom: var(--border);
            overflow: hidden;
        }
        .topstrip .inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 14px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }
        .topstrip .code {
            font-size: 12px;
            letter-spacing: 3px;
            background: var(--yellow);
            color: var(--ink);
            padding: 4px 10px;
            border: 2px solid var(--paper);
            font-weight: 700;
        }
        .topstrip .brand {
            font-family: "Archivo Black", "Arial Black", sans-serif;
            text-transform: uppercase;
            font-size: clamp(18px, 3vw, 26px);
        }

        .wrap { max-width: 1200px; margin: 0 auto; padding: 0 28px; }

        .pagehead {
            padding: 48px 0 32px;
            border-bottom: var(--border);
            position: relative;
        }
        .pagehead h1 { font-size: clamp(32px, 6vw, 64px); }
        .pagehead .eyebrow {
            display: inline-block;
            font-size: 13px;
            letter-spacing: 4px;
            text-transform: uppercase;
            font-weight: 700;
            background: var(--ink);
            color: var(--paper);
            padding: 4px 12px;
            margin-bottom: 16px;
        }
        .pagehead .meta {
            margin-top: 18px;
            font-size: 13px;
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .pagehead .meta span b { background: var(--red); color: var(--paper); padding: 2px 6px; font-weight: 700; }

        main { padding: 40px 0 80px; }

        /* ---- TOOLBAR ---- */
        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 32px;
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
            transition: transform .06s ease, box-shadow .06s ease;
        }
        .btn:hover { transform: translate(3px, 3px); box-shadow: 2px 2px 0 var(--ink); }
        .btn:active { transform: translate(6px, 6px); box-shadow: 0 0 0 var(--ink); }
        .btn-primary { background: var(--blue); color: var(--paper); }
        .btn-danger { background: var(--red); color: var(--paper); }
        .btn-ink { background: var(--ink); color: var(--paper); }
        .btn-sm { padding: 6px 12px; font-size: 12px; box-shadow: 4px 4px 0 var(--ink); }

        /* ---- ALERT ---- */
        .alert {
            border: var(--border);
            background: var(--yellow);
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
        tbody tr:nth-child(even) { background: #E9E4D8; }
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
        .badge-aktif { background: #3DDC84; color: var(--ink); }
        .badge-selesai { background: var(--blue); color: var(--paper); }
        .badge-berhenti { background: var(--red); color: var(--paper); }

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
            background: var(--paper);
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
            padding: 24px 0;
        }
        .pagefoot .wrap { display: flex; justify-content: space-between; gap: 14px; flex-wrap: wrap; font-size: 12px; letter-spacing: 1px; text-transform: uppercase; }
        .barcode {
            font-family: "Space Mono", monospace;
            letter-spacing: 6px; color: var(--yellow);
            font-size: 16px; font-weight: 700;
        }

        /* ---- NAV ---- */
        .topnav { display: flex; gap: 8px; flex-wrap: wrap; }
        .topnav a {
            font-family: "Space Mono", monospace;
            font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;
            color: var(--ink); background: var(--paper);
            border: 2px solid var(--paper); padding: 6px 12px; text-decoration: none;
        }
        .topnav a:hover, .topnav a.active { background: var(--yellow); }

        @media (max-width: 720px) {
            .frow { grid-template-columns: 1fr; }
            .wrap { padding: 0 18px; }
            .pagehead { padding: 32px 0 24px; }
            main { padding: 28px 0 60px; }
        }
    </style>
</head>
<body>
    <div class="topstrip">
        <div class="inner">
            <span class="code">REGISTER//01</span>
            <span class="brand">Daftar Siswa PKL</span>
            <nav class="topnav">
                <a href="{{ route('siswa.index') }}" class="{{ request()->is('siswa*') && !request()->is('perusahaan*') && !request()->is('kompetensi*') ? 'active' : '' }}">Siswa</a>
                <a href="{{ route('perusahaan.index') }}" class="{{ request()->is('perusahaan*') ? 'active' : '' }}">Perusahaan</a>
                <a href="{{ route('kompetensi.index') }}" class="{{ request()->is('kompetensi*') ? 'active' : '' }}">Kompetensi</a>
            </nav>
        </div>
    </div>

    <div class="wrap">
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
        <div class="wrap">
            <span>© Sekolah &mdash; Kartu Register PKL</span>
            <span class="barcode">||| ||||| ||||</span>
        </div>
    </footer>
</body>
</html>
