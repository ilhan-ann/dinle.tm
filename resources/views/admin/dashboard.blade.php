@extends('admin.layouts.admin')

@section('content')
    <h1 style="font-size: 1.75rem; font-weight: 900; margin-bottom: 1.5rem; letter-spacing: -0.02em;">Dashboard</h1>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
        <div class="stat-card">
            <i class="bi bi-tags-fill" style="color: #1db954; font-size: 1.25rem;"></i>
            <div class="stat-num mt-2">{{ $categoriesCount }}</div>
            <div class="stat-label">Categories</div>
        </div>
        <div class="stat-card">
            <i class="bi bi-person-fill" style="color: #1db954; font-size: 1.25rem;"></i>
            <div class="stat-num mt-2">{{ $artistsCount }}</div>
            <div class="stat-label">Artists</div>
        </div>
        <div class="stat-card">
            <i class="bi bi-music-note-beamed" style="color: #1db954; font-size: 1.25rem;"></i>
            <div class="stat-num mt-2">{{ $songsCount }}</div>
            <div class="stat-label">Songs</div>
        </div>
        <div class="stat-card">
            <i class="bi bi-camera-video-fill" style="color: #1db954; font-size: 1.25rem;"></i>
            <div class="stat-num mt-2">{{ $videosCount }}</div>
            <div class="stat-label">Videos</div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 1rem;">
        <a href="{{ route('admin.categories.index') }}" style="text-decoration: none;">
            <div class="stat-card" style="cursor: pointer; transition: background 0.15s, border-color 0.15s;" onmouseenter="this.style.background='#222';this.style.borderColor='#1db95440'" onmouseleave="this.style.background='#181818';this.style.borderColor='#282828'">
                <i class="bi bi-tags-fill" style="color: #1db954; font-size: 1.25rem;"></i>
                <div style="margin-top: 0.75rem; font-weight: 700;">Categories</div>
                <div style="font-size: 0.8125rem; color: #b3b3b3; margin-top: 2px;">Add or delete</div>
            </div>
        </a>
        <a href="{{ route('admin.artists.index') }}" style="text-decoration: none;">
            <div class="stat-card" style="cursor: pointer; transition: background 0.15s, border-color 0.15s;" onmouseenter="this.style.background='#222';this.style.borderColor='#1db95440'" onmouseleave="this.style.background='#181818';this.style.borderColor='#282828'">
                <i class="bi bi-person-fill" style="color: #1db954; font-size: 1.25rem;"></i>
                <div style="margin-top: 0.75rem; font-weight: 700;">Artists</div>
                <div style="font-size: 0.8125rem; color: #b3b3b3; margin-top: 2px;">Add or delete</div>
            </div>
        </a>
        <a href="{{ route('admin.songs.index') }}" style="text-decoration: none;">
            <div class="stat-card" style="cursor: pointer; transition: background 0.15s, border-color 0.15s;" onmouseenter="this.style.background='#222';this.style.borderColor='#1db95440'" onmouseleave="this.style.background='#181818';this.style.borderColor='#282828'">
                <i class="bi bi-music-note-beamed" style="color: #1db954; font-size: 1.25rem;"></i>
                <div style="margin-top: 0.75rem; font-weight: 700;">Songs</div>
                <div style="font-size: 0.8125rem; color: #b3b3b3; margin-top: 2px;">Upload or delete</div>
            </div>
        </a>
        <a href="{{ route('admin.videos.index') }}" style="text-decoration: none;">
            <div class="stat-card" style="cursor: pointer; transition: background 0.15s, border-color 0.15s;" onmouseenter="this.style.background='#222';this.style.borderColor='#1db95440'" onmouseleave="this.style.background='#181818';this.style.borderColor='#282828'">
                <i class="bi bi-camera-video-fill" style="color: #1db954; font-size: 1.25rem;"></i>
                <div style="margin-top: 0.75rem; font-weight: 700;">Videos</div>
                <div style="font-size: 0.8125rem; color: #b3b3b3; margin-top: 2px;">Upload or delete</div>
            </div>
        </a>
    </div>
@endsection