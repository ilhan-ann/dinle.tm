<div class="container-lg fixed-bottom">
    <div class="glass-nav py-2 px-3 mb-3">
        <div class="py-3 d-flex justify-content-between align-items-center" id="global-player">
            <div>
                <strong id="player-song-name">Player</strong><br>
                <small id="player-artist-name" class="text-secondary"></small>
            </div>

            <div>
                <button id="player-play-btn" class="btn btn-light">▶️ Play</button>
            </div>

            <audio id="player-audio" preload="none"></audio>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const audio = document.getElementById('player-audio');
    const playBtn = document.getElementById('player-play-btn');
    const songName = document.getElementById('player-song-name');
    const artistName = document.getElementById('player-artist-name');

    let currentSrc = null;
    let currentButton = null;

    // 🎵 Нажатие на кнопку в карточке
    document.querySelectorAll('.select-song-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const src = btn.dataset.src;
            const name = btn.dataset.name;
            const artist = btn.dataset.artist;

            // Если выбрали ту же песню → переключаем Play/Pause
            if (src === currentSrc) {
                if (audio.paused) {
                    audio.play();
                    btn.textContent = '⏸ Pause';
                    playBtn.textContent = '⏸ Pause';
                } else {
                    audio.pause();
                    btn.textContent = '▶️ Play';
                    playBtn.textContent = '▶️ Play';
                }
                return;
            }

            // Если другая песня — сбрасываем предыдущую кнопку
            if (currentButton) {
                currentButton.textContent = '▶️ Play';
            }

            // Настраиваем новую песню
            currentSrc = src;
            currentButton = btn;

            audio.src = src;
            songName.textContent = name;
            artistName.textContent = artist;

            audio.play();
            playBtn.textContent = '⏸ Pause';
            btn.textContent = '⏸ Pause';
        });
    });

    // 🎧 Кнопка Play/Pause внизу
    playBtn.addEventListener('click', () => {
        if (!audio.src) return;

        if (audio.paused) {
            audio.play();
            playBtn.textContent = '⏸ Pause';
            if (currentButton) currentButton.textContent = '⏸ Pause';
        } else {
            audio.pause();
            playBtn.textContent = '▶️ Play';
            if (currentButton) currentButton.textContent = '▶️ Play';
        }
    });

    // 🔁 Когда песня закончилась
    audio.addEventListener('ended', () => {
        playBtn.textContent = '▶️ Play';
        if (currentButton) currentButton.textContent = '▶️ Play';
    });
});
</script>