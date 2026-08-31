<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Daftar Siswa PKL')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
            line-height: 1.6;
        }
        .navbar {
            background: #1e293b;
            color: #fff;
            padding: 1rem 1.5rem;
        }
        .navbar .container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .navbar h1 { font-size: 1.25rem; font-weight: 600; }
        .navbar a { color: #93c5fd; text-decoration: none; font-size: .9rem; }
        .navbar a:hover { text-decoration: underline; }
        .container { max-width: 1100px; margin: 0 auto; padding: 2rem 1.5rem; }
        .card {
            background: #fff;
            border-radius: .5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,.1);
            padding: 1.5rem;
        }
        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        .card-header h2 { font-size: 1.25rem; }
        .btn {
            display: inline-block;
            padding: .5rem 1rem;
            border: none;
            border-radius: .375rem;
            font-size: .875rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
        }
        .btn-primary { background: #2563eb; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-success { background: #16a34a; }
        .btn-success:hover { background: #15803d; }
        .btn-danger { background: #dc2626; }
        .btn-danger:hover { background: #b91c1c; }
        .btn-sm { padding: .25rem .75rem; font-size: .75rem; }
        .btn-secondary { background: #64748b; }
        .btn-secondary:hover { background: #475569; }
        table { width: 100%; border-collapse: collapse; font-size: .875rem; }
        thead th {
            text-align: left;
            padding: .75rem;
            background: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
            color: #475569;
            font-weight: 600;
        }
        tbody td { padding: .75rem; border-bottom: 1px solid #e2e8f0; }
        tbody tr:hover { background: #f8fafc; }
        .alert {
            padding: .75rem 1rem;
            border-radius: .375rem;
            margin-bottom: 1.5rem;
            font-size: .875rem;
        }
        .alert-success { background: #f0fdf4; border: 1px solid #86efac; color: #166534; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; font-size: .875rem; font-weight: 500; margin-bottom: .375rem; }
        .form-group input, .form-group select {
            width: 100%;
            padding: .5rem .75rem;
            border: 1px solid #cbd5e1;
            border-radius: .375rem;
            font-size: .875rem;
        }
        .form-group input:focus, .form-group select:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,.1);
        }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .form-actions { margin-top: 1.5rem; display: flex; gap: .75rem; }
        .error { color: #dc2626; font-size: .75rem; margin-top: .25rem; }
        .badge {
            display: inline-block;
            padding: .25rem .75rem;
            border-radius: 9999px;
            font-size: .75rem;
            font-weight: 500;
        }
        .badge-aktif { background: #dcfce7; color: #166534; }
        .badge-selesai { background: #dbeafe; color: #1e40af; }
        .badge-berhenti { background: #fee2e2; color: #991b1b; }
        .empty { text-align: center; color: #64748b; padding: 2rem; }
        @media (max-width: 640px) {
            .form-row { grid-template-columns: 1fr; }
            .table-responsive { overflow-x: auto; }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <h1>Daftar Siswa PKL</h1>
            <a href="{{ route('siswa.index') }}">Data Siswa</a>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
