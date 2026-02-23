<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Dinle.tm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'DM Sans', sans-serif; background: #0f0f0f; color: #fff; min-height: 100vh; display: flex; }

        #admin-sidebar {
            width: 220px; min-height: 100vh; background: #181818;
            border-right: 1px solid #282828; flex-shrink: 0;
            display: flex; flex-direction: column; padding: 1.5rem 1rem;
            position: fixed; top: 0; left: 0; height: 100vh; z-index: 100;
        }
        .admin-logo { font-size: 1.25rem; font-weight: 900; color: #1db954; margin-bottom: 2rem; letter-spacing: -0.02em; }
        .admin-logo span { color: #fff; }
        .admin-nav a {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.625rem 0.75rem; border-radius: 8px; color: #b3b3b3;
            text-decoration: none; font-size: 0.875rem; font-weight: 500;
            transition: background 0.15s, color 0.15s; margin-bottom: 2px;
        }
        .admin-nav a:hover { background: #282828; color: #fff; }
        .admin-nav a.active { background: #282828; color: #1db954; }
        .admin-nav i { font-size: 1rem; width: 18px; text-align: center; }
        .admin-user { margin-top: auto; padding-top: 1rem; border-top: 1px solid #282828; font-size: 0.8125rem; color: #b3b3b3; }

        #admin-main { margin-left: 220px; flex: 1; padding: 2rem; min-height: 100vh; }

        .stat-card { background: #181818; border-radius: 12px; padding: 1.25rem 1.5rem; border: 1px solid #282828; }
        .stat-card .stat-num { font-size: 2rem; font-weight: 900; color: #fff; line-height: 1; }
        .stat-card .stat-label { font-size: 0.8125rem; color: #b3b3b3; margin-top: 4px; }

        .section-box { background: #181818; border-radius: 12px; border: 1px solid #282828; overflow: hidden; margin-bottom: 2rem; }
        .section-box-header { padding: 1rem 1.5rem; border-bottom: 1px solid #282828; font-size: 1rem; font-weight: 700; }
        .section-box-body { padding: 1.5rem; }

        .admin-table { width: 100%; border-collapse: collapse; }
        .admin-table th { font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: #b3b3b3; padding: 0.5rem 1rem; border-bottom: 1px solid #282828; text-align: left; }
        .admin-table td { padding: 0.75rem 1rem; border-bottom: 1px solid #1e1e1e; font-size: 0.875rem; vertical-align: middle; }
        .admin-table tr:hover td { background: #1e1e1e; }
        .admin-table tr:last-child td { border-bottom: none; }

        label { display: block; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: #b3b3b3; margin-bottom: 6px; }
        .admin-input { background: #282828; border: none; border-radius: 8px; padding: 0.625rem 1rem; color: #fff; font-size: 0.875rem; width: 100%; outline: none; transition: background 0.15s; font-family: inherit; }
        .admin-input:focus { background: #333; outline: 2px solid #1db954; outline-offset: -2px; }
        .admin-input option { background: #282828; }

        .btn-green { background: #1db954; color: #000; border: none; border-radius: 500px; padding: 0.5rem 1.25rem; font-size: 0.875rem; font-weight: 700; cursor: pointer; transition: background 0.15s, transform 0.15s; }
        .btn-green:hover { background: #1ed760; transform: scale(1.03); }
        .btn-del { background: transparent; border: 1px solid #535353; color: #b3b3b3; border-radius: 6px; padding: 0.3rem 0.75rem; font-size: 0.8125rem; cursor: pointer; transition: border-color 0.15s, color 0.15s; }
        .btn-del:hover { border-color: #e53e3e; color: #e53e3e; }

        .alert-success { background: #1a3a2a; color: #1db954; border-radius: 8px; padding: 0.75rem 1rem; font-size: 0.875rem; margin-bottom: 1.5rem; border: 1px solid #1db954; }

        @media (max-width: 768px) {
            #admin-sidebar { width: 60px; padding: 1rem 0.5rem; }
            .admin-logo, .admin-nav a span, .admin-user { display: none; }
            .admin-nav a { justify-content: center; padding: 0.75rem; }
            #admin-main { margin-left: 60px; padding: 1rem; }
        }
    </style>
</head>
<body>
<aside id="admin-sidebar">
    <div class="admin-logo">dinle<span>.tm</span></div>
    <nav class="admin-nav">
        <a href="{{ route('admin.dashboard') }}"        class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-fill"></i><span>Dashboard</span>
        </a>
        <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <i class="bi bi-tags-fill"></i><span>Categories</span>
        </a>
        <a href="{{ route('admin.artists.index') }}"    class="{{ request()->routeIs('admin.artists.*') ? 'active' : '' }}">
            <i class="bi bi-person-fill"></i><span>Artists</span>
        </a>
        <a href="{{ route('admin.songs.index') }}"      class="{{ request()->routeIs('admin.songs.*') ? 'active' : '' }}">
            <i class="bi bi-music-note-beamed"></i><span>Songs</span>
        </a>
        <a href="{{ route('admin.videos.index') }}"     class="{{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">
            <i class="bi bi-camera-video-fill"></i><span>Videos</span>
        </a>
    </nav>
    <div class="admin-user">
        <div>{{ auth('admin')->user()->name }}</div>
        <form method="POST" action="{{ route('admin.logout') }}" style="margin-top: 6px;">
            @csrf
            <button type="submit" style="background: none; border: none; color: #b3b3b3; cursor: pointer; font-size: 0.8125rem; padding: 0;">
                <i class="bi bi-box-arrow-left me-1"></i>Logout
            </button>
        </form>
    </div>
</aside>
<main id="admin-main">
    @if(session('success'))
        <div class="alert-success">✓ {{ session('success') }}</div>
    @endif
    @yield('content')
</main>
</body>
</html>