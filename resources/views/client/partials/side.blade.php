<div class="d-none d-md-block">
    <div style="background: #181818; border-radius: 0.75rem; padding: 1rem 0.75rem;">

        <p style="font-size: 0.65rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #b3b3b3; padding: 0 0.75rem; margin-bottom: 0.75rem;">Menu</p>

        <a href="/" class="side-link {{ Request::is('/') ? 'side-link--active' : '' }}">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
            Home
        </a>
        <a href="/videos" class="side-link {{ Request::is('videos') ? 'side-link--active' : '' }}">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"/></svg>
            Video
        </a>
        <a href="/trends" class="side-link {{ Request::is('trends') ? 'side-link--active' : '' }}">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/></svg>
            Trends
        </a>
        <a href="/search" class="side-link {{ Request::is('search') ? 'side-link--active' : '' }}">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
            Search
        </a>

    </div>
</div>

<style>
.side-link {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.625rem 0.75rem;
    border-radius: 0.5rem;
    color: #b3b3b3;
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    transition: color .15s, background .15s;
    margin-bottom: 0.125rem;
}
.side-link svg { width: 20px; height: 20px; flex-shrink: 0; }
.side-link:hover { color: #fff; background: #282828; }
.side-link--active { color: #fff; font-weight: 600; }
.side-link--active svg { color: #1db954; }
</style>