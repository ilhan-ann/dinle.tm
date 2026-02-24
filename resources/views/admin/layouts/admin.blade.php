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
            width: 220px; background: #181818;
            border-right: 1px solid #282828; flex-shrink: 0;
            display: flex; flex-direction: column; padding: 1.5rem 1rem;
            position: fixed; top: 0; left: 0; height: 100vh;
            z-index: 200; overflow-y: auto;
            transition: width 0.2s, padding 0.2s;
        }
        .admin-logo { font-size: 1.25rem; font-weight: 900; color: #1db954; margin-bottom: 2rem; letter-spacing: -0.02em; overflow: hidden; display: flex; align-items: center; gap: 0; }
        .admin-logo .logo-full { white-space: nowrap; }
        .admin-logo .logo-full span { color: #fff; }
        .admin-logo .logo-short { display: none; font-size: 1.4rem; }
        .admin-nav a {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.625rem 0.75rem; border-radius: 8px; color: #b3b3b3;
            text-decoration: none; font-size: 0.875rem; font-weight: 500;
            transition: background 0.15s, color 0.15s; margin-bottom: 2px;
            white-space: nowrap; overflow: hidden;
        }
        .admin-nav a:hover { background: #282828; color: #fff; }
        .admin-nav a.active { background: #282828; color: #1db954; }
        .admin-nav i { font-size: 1rem; width: 18px; text-align: center; flex-shrink: 0; }
        .admin-user { margin-top: auto; padding-top: 1rem; border-top: 1px solid #282828; }
        .admin-user-name { font-size: 0.75rem; color: #b3b3b3; padding: 0 0.75rem; margin-bottom: 4px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .admin-user a, .admin-user button {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.625rem 0.75rem; border-radius: 8px; color: #b3b3b3;
            text-decoration: none; font-size: 0.875rem; font-weight: 500;
            transition: background 0.15s, color 0.15s; margin-bottom: 2px;
            background: transparent; border: none; cursor: pointer;
            width: 100%; font-family: inherit; white-space: nowrap; overflow: hidden;
        }
        .admin-user a:hover { background: #282828; color: #1db954; }
        .admin-user button:hover { background: #282828; color: #e53e3e; }
        .admin-user i { font-size: 1rem; width: 18px; text-align: center; flex-shrink: 0; }

        #admin-main { margin-left: 220px; flex: 1; padding: 2rem; min-height: 100vh; max-width: 100%; overflow-x: hidden; }

        .stat-card { background: #181818; border-radius: 12px; padding: 1.25rem 1.5rem; border: 1px solid #282828; }
        .stat-card .stat-num { font-size: 2rem; font-weight: 900; color: #fff; line-height: 1; }
        .stat-card .stat-label { font-size: 0.8125rem; color: #b3b3b3; margin-top: 4px; }

        .section-box { background: #181818; border-radius: 12px; border: 1px solid #282828; overflow: hidden; margin-bottom: 2rem; }
        .section-box-header { padding: 1rem 1.5rem; border-bottom: 1px solid #282828; font-size: 1rem; font-weight: 700; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.5rem; }
        .section-box-body { padding: 1.5rem; }

        .table-wrap { overflow-x: auto; -webkit-overflow-scrolling: touch; }
        .admin-table { width: 100%; border-collapse: collapse; min-width: 400px; }
        .admin-table th { font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: #b3b3b3; padding: 0.5rem 1rem; border-bottom: 1px solid #282828; text-align: left; white-space: nowrap; }
        .admin-table td { padding: 0.75rem 1rem; border-bottom: 1px solid #1e1e1e; font-size: 0.875rem; vertical-align: middle; }
        .admin-table tr:hover td { background: #1e1e1e; }
        .admin-table tr:last-child td { border-bottom: none; }

        label { display: block; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: #b3b3b3; margin-bottom: 6px; }
        .admin-input { background: #282828; border: none; border-radius: 8px; padding: 0.625rem 1rem; color: #fff; font-size: 0.875rem; width: 100%; outline: none; transition: background 0.15s; font-family: inherit; }
        .admin-input:focus { background: #333; outline: 2px solid #1db954; outline-offset: -2px; }
        .admin-input option { background: #282828; }

        .btn-green { background: #1db954; color: #000; border: none; border-radius: 500px; padding: 0.5rem 1.25rem; font-size: 0.875rem; font-weight: 700; cursor: pointer; transition: background 0.15s, transform 0.15s; white-space: nowrap; }
        .btn-green:hover { background: #1ed760; transform: scale(1.03); }
        .btn-del { background: transparent; border: 1px solid #535353; color: #b3b3b3; border-radius: 6px; padding: 0.3rem 0.75rem; font-size: 0.8125rem; cursor: pointer; transition: border-color 0.15s, color 0.15s; }
        .btn-del:hover { border-color: #e53e3e; color: #e53e3e; }

        .alert-success { background: #1a3a2a; color: #1db954; border-radius: 8px; padding: 0.75rem 1rem; font-size: 0.875rem; margin-bottom: 1.5rem; border: 1px solid #1db954; }

        .search-wrap { position: relative; }
        .search-wrap i { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #b3b3b3; font-size: 0.8rem; pointer-events: none; }
        .search-wrap .admin-input { padding-left: 2rem; width: 220px; font-size: 0.8125rem; }

        @media (max-width: 900px) {
            #admin-sidebar { width: 64px; padding: 1rem 0.5rem; }
            .admin-logo .logo-full { display: none; }
            .admin-logo .logo-short { display: block; }
            .admin-nav a { justify-content: center; padding: 0.75rem; gap: 0; }
            .admin-nav a span { display: none; }
            .admin-user-name { display: none; }
            .admin-user a, .admin-user button { justify-content: center; padding: 0.75rem; gap: 0; }
            .admin-user a span, .admin-user button span { display: none; }
            #admin-main { margin-left: 64px; padding: 1.25rem; }
        }
        @media (max-width: 600px) {
            #admin-sidebar { display: none; }
            #admin-main { margin-left: 0; padding: 1rem; padding-bottom: 5rem; }
            #mobile-nav {
                display: flex !important;
                position: fixed; bottom: 0; left: 0; right: 0;
                background: #181818; border-top: 1px solid #282828;
                z-index: 300; padding: 0.5rem 0;
            }
            #mobile-nav a, #mobile-nav button {
                flex: 1; display: flex; flex-direction: column; align-items: center;
                gap: 3px; color: #b3b3b3; text-decoration: none; font-size: 0.6rem;
                font-weight: 600; background: transparent; border: none; cursor: pointer;
                font-family: inherit; padding: 0.25rem 0; transition: color 0.15s;
            }
            #mobile-nav a i, #mobile-nav button i { font-size: 1.25rem; }
            #mobile-nav a.active, #mobile-nav a:hover { color: #1db954; }
            #mobile-nav button:hover { color: #e53e3e; }
            .search-wrap .admin-input { width: 100%; }
            .section-box-header { flex-direction: column; align-items: flex-start; }
        }

        #mobile-nav { display: none; }
    </style>
</head>
<body>

<aside id="admin-sidebar">
    <div class="admin-logo"><span class="logo-full">dinle<span>.tm</span></span><span class="logo-short">D</span></div>
    <nav class="admin-nav">
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-fill"></i><span>Dashboard</span>
        </a>
        <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <i class="bi bi-tags-fill"></i><span>Categories</span>
        </a>
        <a href="{{ route('admin.artists.index') }}" class="{{ request()->routeIs('admin.artists.*') ? 'active' : '' }}">
            <i class="bi bi-person-fill"></i><span>Artists</span>
        </a>
        <a href="{{ route('admin.songs.index') }}" class="{{ request()->routeIs('admin.songs.*') ? 'active' : '' }}">
            <i class="bi bi-music-note-beamed"></i><span>Songs</span>
        </a>
        <a href="{{ route('admin.videos.index') }}" class="{{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">
            <i class="bi bi-camera-video-fill"></i><span>Videos</span>
        </a>
    </nav>
    <div class="admin-user">
        <div class="admin-user-name">{{ auth('admin')->user()->name }}</div>
        <a href="{{ route('home') }}">
            <i class="bi bi-box-arrow-up-right"></i><span>Go to Site</span>
        </a>
        <form method="POST" action="{{ route('admin.logout') }}" style="margin:0;">
            @csrf
            <button type="submit">
                <i class="bi bi-box-arrow-left"></i><span>Logout</span>
            </button>
        </form>
    </div>
</aside>

<nav id="mobile-nav">
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-grid-fill"></i>Home
    </a>
    <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
        <i class="bi bi-tags-fill"></i>Categories
    </a>
    <a href="{{ route('admin.artists.index') }}" class="{{ request()->routeIs('admin.artists.*') ? 'active' : '' }}">
        <i class="bi bi-person-fill"></i>Artists
    </a>
    <a href="{{ route('admin.songs.index') }}" class="{{ request()->routeIs('admin.songs.*') ? 'active' : '' }}">
        <i class="bi bi-music-note-beamed"></i>Songs
    </a>
    <a href="{{ route('admin.videos.index') }}" class="{{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">
        <i class="bi bi-camera-video-fill"></i>Videos
    </a>
    <form method="POST" action="{{ route('admin.logout') }}" style="flex:1;display:contents;">
        @csrf
        <button type="submit"><i class="bi bi-box-arrow-left"></i>Logout</button>
    </form>
</nav>

<main id="admin-main">
    @if(session('success'))
        <div class="alert-success">✓ {{ session('success') }}</div>
    @endif
    @yield('content')
</main>
</body>
</html>