<div class="container-lg">
    <div class="row">
        <div class="glass py-3 px-4">
            <div class="mb-2">
                <a href="/" class="text-decoration-none text-black {{ Request::is('/') ? 'border-bottom border-black' : '' }}">
                    <i class="bi bi-house me-2"></i>Home
                </a>
            </div>
            <div class="mb-2">
                <a href="/videos" class="text-decoration-none text-black {{ Request::is('videos') ? 'border-bottom border-black' : '' }}">
                    <i class="bi bi-camera-video me-2"></i>Video
                </a>
            </div>
            <div class="mb-2">
                <a href="/trends" class="text-decoration-none text-black {{ Request::is('trends') ? 'border-bottom border-black' : '' }}">
                    <i class="bi bi-soundwave me-2"></i>Trends
                </a>
            </div>
            <div>
                <a href="/search" class="text-decoration-none text-black {{ Request::is('search') ? 'border-bottom border-black' : '' }}">
                    <i class="bi bi-search me-2"></i>Search
                </a>
            </div>
        </div>
    </div>
</div>