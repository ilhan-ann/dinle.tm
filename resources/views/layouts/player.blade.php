<div class="container-lg fixed-bottom">
    <div class="glass-nav px-3 mb-3 rounded-5">
        <div class="py-3 d-flex flex-column gap-2" id="global-player">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <strong id="player-song-name">Player</strong><br>
                    <small id="player-artist-name" class="text-secondary"></small>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <small id="player-current-time">0:00</small>
                    <span>/</span>
                    <small id="player-duration">0:00</small>
                    <div class="rounded-4">
                        <button id="player-prev-btn" class="btn btn-glass glass text-black rounded-circle">
                            <i class="bi bi-skip-start-fill"></i>
                        </button>
                        <button id="player-play-btn" class="btn btn-glass glass text-black rounded-circle">
                            <i class="bi bi-play-fill"></i>
                        </button>
                        <button id="player-next-btn" class="btn btn-glass glass text-black rounded-circle">
                            <i class="bi bi-skip-end-fill"></i>
                        </button>
                    </div>
                </div>
            </div>
            <input type="range" id="player-progress" min="0" value="0" step="1" class="form-range w-100">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-volume-down"></i>
                <input type="range" id="player-volume" min="0" max="1" step="0.01" value="1" class="form-range"
                    style="width:120px;">
                <i class="bi bi-volume-up"></i>
            </div>
            <audio id="player-audio" preload="metadata"></audio>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const audio = document.getElementById('player-audio');
        const playBtn = document.getElementById('player-play-btn');
        const nextBtn = document.getElementById('player-next-btn');
        const prevBtn = document.getElementById('player-prev-btn');
        const songName = document.getElementById('player-song-name');
        const artistName = document.getElementById('player-artist-name');
        const durationEl = document.getElementById('player-duration');
        const currentTimeEl = document.getElementById('player-current-time');
        const progress = document.getElementById('player-progress');
        const volumeSlider = document.getElementById('player-volume');
        let playlist = [];
        let currentIndex = -1;
        let dragging = false;
        const buttons = document.querySelectorAll('.select-song-btn');
        playlist = Array.from(buttons).map(btn => ({
            src: btn.dataset.src,
            name: btn.dataset.name,
            artist: btn.dataset.artist,
            btn
        }));
        function formatTime(sec) {
            if (isNaN(sec)) return '0:00';
            const m = Math.floor(sec / 60);
            const s = Math.floor(sec % 60);
            return `${m}:${s.toString().padStart(2, '0')}`;
        }
        function loadTrack(index, autoplay = true) {
            if (index < 0 || index >= playlist.length) return;
            if (currentIndex >= 0) playlist[currentIndex].btn.innerHTML = '<i class="bi bi-play-fill"></i>';
            currentIndex = index;
            const track = playlist[currentIndex];
            audio.src = track.src;
            songName.textContent = track.name;
            artistName.textContent = track.artist;

            playlist[currentIndex].btn.innerHTML = '<i class="bi bi-pause-fill"></i>';
            playBtn.innerHTML = '<i class="bi bi-pause-fill"></i>';

            audio.load();
            if (autoplay) audio.play().catch(err => console.log('playback blocked', err));
        }
        buttons.forEach((btn, i) => {
            btn.addEventListener('click', () => {
                if (i === currentIndex) {
                    if (audio.paused) {
                        audio.play();
                        playBtn.innerHTML = '<i class="bi bi-pause-fill"></i>';
                        btn.innerHTML = '<i class="bi bi-pause-fill"></i>';
                    } else {
                        audio.pause();
                        playBtn.innerHTML = '<i class="bi bi-play-fill"></i>';
                        btn.innerHTML = '<i class="bi bi-play-fill"></i>';
                    }
                } else {
                    loadTrack(i);
                }
            });
        });
        playBtn.addEventListener('click', () => {
            if (!audio.src) return;
            if (audio.paused) {
                audio.play();
                playBtn.innerHTML = '<i class="bi bi-pause-fill"></i>';
                if (currentIndex >= 0) playlist[currentIndex].btn.innerHTML = '<i class="bi bi-pause-fill"></i>';
            } else {
                audio.pause();
                playBtn.innerHTML = '<i class="bi bi-play-fill"></i>';
                if (currentIndex >= 0) playlist[currentIndex].btn.innerHTML = '<i class="bi bi-play-fill"></i>';
            }
        });
        nextBtn.addEventListener('click', () => {
            if (playlist.length === 0) return;
            const nextIndex = (currentIndex + 1) % playlist.length;
            loadTrack(nextIndex);
        });
        prevBtn.addEventListener('click', () => {
            if (playlist.length === 0) return;
            const prevIndex = (currentIndex - 1 + playlist.length) % playlist.length;
            loadTrack(prevIndex);
        });
        audio.addEventListener('timeupdate', () => {
            if (!dragging) {
                progress.value = Math.floor(audio.currentTime);
                currentTimeEl.textContent = formatTime(audio.currentTime);
            }
        });
        audio.addEventListener('loadedmetadata', () => {
            progress.max = Math.floor(audio.duration);
            durationEl.textContent = formatTime(audio.duration);
        });
        progress.addEventListener('input', () => {
            dragging = true;
            currentTimeEl.textContent = formatTime(progress.value);
        });
        progress.addEventListener('change', () => {
            dragging = false;
            audio.currentTime = progress.value;
        });
        volumeSlider.addEventListener('input', () => {
            audio.volume = volumeSlider.value;
        });
        audio.addEventListener('ended', () => {
            playBtn.innerHTML = '<i class="bi bi-play-fill"></i>';
            if (currentIndex >= 0) playlist[currentIndex].btn.innerHTML = '<i class="bi bi-play-fill"></i>';
            const nextIndex = (currentIndex + 1) % playlist.length;
            loadTrack(nextIndex);
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.song-duration').forEach(el => {
            const audio = new Audio(el.dataset.src);
            audio.addEventListener('loadedmetadata', () => {
                const d = audio.duration;
                const minutes = Math.floor(d / 60);
                const seconds = Math.floor(d % 60).toString().padStart(2, '0');
                el.innerHTML = `<i class="bi bi-clock me-1"></i> ${minutes}:${seconds}`;
            });
        });
    });
</script>