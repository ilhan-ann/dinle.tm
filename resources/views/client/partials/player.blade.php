<div id="sp-player" class="fixed-bottom">

    <div id="sp-player-inner">
        <div id="sp-track-info">
            <div id="sp-album-art">
                <svg id="sp-album-placeholder" viewBox="0 0 24 24" fill="currentColor" style="width:28px;height:28px;color:#535353;">
                    <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                </svg>
                <img id="sp-album-img" src="" alt="" style="display:none;width:100%;height:100%;object-fit:cover;">
            </div>
            <div id="sp-meta">
                <div id="sp-song-name">Select a track</div>
                <div id="sp-artist-name">—</div>
            </div>
        </div>
        <div id="sp-center">
            <div id="sp-controls">
                <button class="sp-btn sp-btn--sm" id="sp-shuffle">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M10.59 9.17L5.41 4 4 5.41l5.17 5.17 1.42-1.41zM14.5 4l2.04 2.04L4 18.59 5.41 20 17.96 7.46 20 9.5V4h-5.5zm.33 9.41l-1.41 1.41 3.13 3.13L14.5 20H20v-5.5l-2.04 2.04-3.13-3.13z"/></svg>
                </button>
                <button class="sp-btn sp-btn--md" id="sp-prev">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M6 6h2v12H6zm3.5 6 8.5 6V6z"/></svg>
                </button>
                <button class="sp-btn sp-btn--play" id="sp-play">
                    <svg id="sp-icon-play"  viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                    <svg id="sp-icon-pause" viewBox="0 0 24 24" fill="currentColor" style="display:none"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                </button>
                <button class="sp-btn sp-btn--md" id="sp-next">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M6 18l8.5-6L6 6v12zm2-8.14L11.03 12 8 14.14V9.86zM16 6h2v12h-2z"/></svg>
                </button>
                <button class="sp-btn sp-btn--sm" id="sp-repeat">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 7h10v3l4-4-4-4v3H5v6h2V7zm10 10H7v-3l-4 4 4 4v-3h12v-6h-2v4z"/></svg>
                </button>
            </div>
            <div id="sp-progress-row">
                <span id="sp-current">0:00</span>
                <div id="sp-bar-wrap">
                    <div id="sp-bar-bg">
                        <div id="sp-bar-fill"></div>
                        <div id="sp-bar-thumb"></div>
                    </div>
                </div>
                <span id="sp-duration">0:00</span>
            </div>
        </div>
        <div id="sp-right">
            <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px;color:#b3b3b3;flex-shrink:0">
                <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02z"/>
            </svg>
            <div id="sp-vol-wrap">
                <div id="sp-vol-bg">
                    <div id="sp-vol-fill"></div>
                    <div id="sp-vol-thumb"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="sp-mobile-bar">
        <div id="sp-mob-track">
            <div id="sp-mob-album-art">
                <svg viewBox="0 0 24 24" fill="currentColor" style="width:20px;height:20px;color:#535353;">
                    <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                </svg>
                <img id="sp-mob-album-img" src="" alt="" style="display:none;width:100%;height:100%;object-fit:cover;">
            </div>
            <div id="sp-mob-info">
                <div id="sp-mini-song">Select a track</div>
                <div id="sp-mini-artist">—</div>
            </div>
            <div id="sp-mob-controls">
                <button class="sp-btn sp-btn--md" id="sp-mob-prev">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M6 6h2v12H6zm3.5 6 8.5 6V6z"/></svg>
                </button>
                <button class="sp-btn sp-btn--play sp-btn--play-sm" id="sp-play-mobile">
                    <svg id="sp-mob-icon-play"  viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                    <svg id="sp-mob-icon-pause" viewBox="0 0 24 24" fill="currentColor" style="display:none"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                </button>
                <button class="sp-btn sp-btn--md" id="sp-mob-next">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M6 18l8.5-6L6 6v12zm2-8.14L11.03 12 8 14.14V9.86zM16 6h2v12h-2z"/></svg>
                </button>
            </div>
        </div>
        <div id="sp-mob-progress">
            <span id="sp-mob-current">0:00</span>
            <div id="sp-mini-bar-wrap">
                <div id="sp-mini-bar-bg">
                    <div id="sp-mini-bar-fill"></div>
                    <div id="sp-mini-bar-thumb"></div>
                </div>
            </div>
            <span id="sp-mob-duration">0:00</span>
        </div>
        <nav id="sp-mobile-nav">
            <a href="/"       class="sp-nav {{ Request::is('/')       ? 'sp-nav--active' : '' }}"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg><span>Home</span></a>
            <a href="/videos" class="sp-nav {{ Request::is('videos')  ? 'sp-nav--active' : '' }}"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"/></svg><span>Videos</span></a>
            <a href="/trends" class="sp-nav {{ Request::is('trends')  ? 'sp-nav--active' : '' }}"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/></svg><span>Trends</span></a>
            <a href="/search" class="sp-nav {{ Request::is('search')  ? 'sp-nav--active' : '' }}"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg><span>Search</span></a>
        </nav>
    </div>

    <audio id="sp-audio" preload="metadata"></audio>
</div>

<style>
#sp-player { font-family: 'DM Sans', sans-serif; user-select: none; -webkit-user-select: none; }

#sp-player-inner {
    display: none;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    background: #181818;
    border-top: 1px solid #282828;
    padding: 0 1.5rem;
    height: 90px;
}
@media (min-width: 768px) {
    #sp-player-inner { display: flex; }
}

#sp-track-info { flex: 1; min-width: 0; max-width: 300px; display: flex; align-items: center; gap: 10px; }

#sp-album-art {
    width: 56px; height: 56px; border-radius: 6px; flex-shrink: 0;
    background: #282828; display: flex; align-items: center; justify-content: center;
    overflow: hidden;
}
#sp-mob-album-art {
    width: 38px; height: 38px; border-radius: 4px; flex-shrink: 0;
    background: #282828; display: flex; align-items: center; justify-content: center;
    overflow: hidden;
}

#sp-meta { min-width: 0; flex: 1; }
#sp-song-name   { font-size: .875rem; font-weight: 600; color: #fff; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
#sp-artist-name { font-size: .75rem; color: #b3b3b3; margin-top: 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

#sp-like { flex-shrink: 0; }
#sp-like.liked svg path { fill: #1db954; }
#sp-like.liked { color: #1db954 !important; }

#sp-center {
    display: flex; flex-direction: column; align-items: center; gap: 6px;
    width: clamp(280px, 38vw, 560px);
    flex-shrink: 0;
}
#sp-controls { display: flex; align-items: center; gap: .375rem; }

#sp-right { flex: 1; display: flex; align-items: center; justify-content: flex-end; gap: 6px; max-width: 260px; }

.sp-btn {
    background: transparent; border: none; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    color: #b3b3b3; border-radius: 50%;
    transition: color .15s, transform .15s, background .15s;
    padding: 0; outline: none; flex-shrink: 0;
}
.sp-btn svg { display: block; pointer-events: none; }
.sp-btn--sm     { width: 32px; height: 32px; } .sp-btn--sm svg  { width: 16px; height: 16px; }
.sp-btn--md     { width: 32px; height: 32px; } .sp-btn--md svg  { width: 20px; height: 20px; }
.sp-btn--play   { width: 40px; height: 40px; background: #fff; color: #000; }
.sp-btn--play svg { width: 22px; height: 22px; }
.sp-btn--play-sm  { width: 36px; height: 36px; } .sp-btn--play-sm svg { width: 20px; height: 20px; }
.sp-btn--play:hover  { background: #1ed760; transform: scale(1.06); }
.sp-btn:not(.sp-btn--play):hover { color: #fff; transform: scale(1.1); }
.sp-btn--active { color: #1db954 !important; }

#sp-progress-row { display: flex; align-items: center; gap: 8px; width: 100%; }
#sp-current, #sp-duration { font-size: .68rem; color: #b3b3b3; min-width: 34px; font-variant-numeric: tabular-nums; }
#sp-duration { text-align: right; }

#sp-bar-wrap { flex: 1; height: 20px; display: flex; align-items: center; cursor: pointer; touch-action: none; }
#sp-bar-bg { position: relative; width: 100%; height: 4px; background: #535353; border-radius: 2px; transition: height .12s; }
#sp-bar-wrap:hover #sp-bar-bg, #sp-bar-wrap.scrubbing #sp-bar-bg { height: 6px; }
#sp-bar-fill { position: absolute; left: 0; top: 0; height: 100%; width: 0%; background: #b3b3b3; border-radius: 2px; pointer-events: none; transition: background .15s; }
#sp-bar-wrap:hover #sp-bar-fill, #sp-bar-wrap.scrubbing #sp-bar-fill { background: #1db954; }
#sp-bar-thumb { position: absolute; top: 50%; left: 0%; width: 13px; height: 13px; background: #fff; border-radius: 50%; pointer-events: none; transform: translate(-50%,-50%) scale(0); transition: transform .12s; box-shadow: 0 2px 6px rgba(0,0,0,.4); }
#sp-bar-wrap:hover #sp-bar-thumb, #sp-bar-wrap.scrubbing #sp-bar-thumb { transform: translate(-50%,-50%) scale(1); }

#sp-vol-wrap { width: 90px; height: 20px; display: flex; align-items: center; cursor: pointer; touch-action: none; }
#sp-vol-bg { position: relative; width: 100%; height: 4px; background: #535353; border-radius: 2px; transition: height .12s; }
#sp-vol-wrap:hover #sp-vol-bg { height: 6px; }
#sp-vol-fill { position: absolute; left: 0; top: 0; height: 100%; width: 100%; background: #b3b3b3; border-radius: 2px; pointer-events: none; transition: background .15s; }
#sp-vol-wrap:hover #sp-vol-fill { background: #1db954; }
#sp-vol-thumb { position: absolute; top: 50%; left: 100%; width: 13px; height: 13px; background: #fff; border-radius: 50%; pointer-events: none; transform: translate(-50%,-50%) scale(0); transition: transform .12s; }
#sp-vol-wrap:hover #sp-vol-thumb { transform: translate(-50%,-50%) scale(1); }

#sp-mobile-bar { background: #181818; border-top: 1px solid #282828; }
@media (min-width: 768px) {
    #sp-mobile-bar { display: none; }
}

#sp-mob-track { display: flex; align-items: center; padding: .625rem 1rem .3rem; gap: .75rem; }
#sp-mob-info  { flex: 1; min-width: 0; }
#sp-mini-song   { font-size: .875rem; font-weight: 600; color: #fff; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
#sp-mini-artist { font-size: .75rem; color: #b3b3b3; margin-top: 1px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
#sp-mob-controls { display: flex; align-items: center; gap: .25rem; flex-shrink: 0; }

#sp-mob-progress { display: flex; align-items: center; gap: 8px; padding: 0 1rem .5rem; }
#sp-mob-current, #sp-mob-duration { font-size: .65rem; color: #b3b3b3; min-width: 28px; font-variant-numeric: tabular-nums; }
#sp-mob-duration { text-align: right; }

#sp-mini-bar-wrap { flex: 1; height: 20px; display: flex; align-items: center; cursor: pointer; touch-action: none; }
#sp-mini-bar-bg { position: relative; width: 100%; height: 3px; background: #535353; border-radius: 2px; transition: height .12s; }
#sp-mini-bar-wrap:hover #sp-mini-bar-bg, #sp-mini-bar-wrap.scrubbing #sp-mini-bar-bg { height: 5px; }
#sp-mini-bar-fill { position: absolute; left: 0; top: 0; height: 100%; width: 0%; background: #1db954; border-radius: 2px; pointer-events: none; }
#sp-mini-bar-thumb { position: absolute; top: 50%; left: 0%; width: 11px; height: 11px; background: #fff; border-radius: 50%; pointer-events: none; transform: translate(-50%,-50%) scale(0); transition: transform .12s; }
#sp-mini-bar-wrap:hover #sp-mini-bar-thumb, #sp-mini-bar-wrap.scrubbing #sp-mini-bar-thumb { transform: translate(-50%,-50%) scale(1); }

#sp-mobile-nav { display: flex; border-top: 1px solid #282828; padding: .25rem 0 .5rem; }
.sp-nav { flex: 1; display: flex; flex-direction: column; align-items: center; gap: 3px; padding: .4rem 0; color: #b3b3b3; text-decoration: none; font-size: .65rem; font-weight: 500; letter-spacing: .02em; transition: color .15s; }
.sp-nav svg { width: 20px; height: 20px; }
.sp-nav:hover, .sp-nav--active { color: #fff; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const audio = document.getElementById('sp-audio');
    const $ = id => document.getElementById(id);

    const iconPlay    = $('sp-icon-play'),      iconPause    = $('sp-icon-pause');
    const mobIconPlay = $('sp-mob-icon-play'),   mobIconPause = $('sp-mob-icon-pause');
    const songName    = $('sp-song-name'),        artistName   = $('sp-artist-name');
    const miniSong    = $('sp-mini-song'),         miniArtist   = $('sp-mini-artist');
    const currentEl   = $('sp-current'),           durationEl   = $('sp-duration');
    const mobCurEl    = $('sp-mob-current'),        mobDurEl     = $('sp-mob-duration');
    const barWrap     = $('sp-bar-wrap'),           barFill      = $('sp-bar-fill'),       barThumb     = $('sp-bar-thumb');
    const miniBarWrap = $('sp-mini-bar-wrap'),      miniBarFill  = $('sp-mini-bar-fill'),   miniBarThumb = $('sp-mini-bar-thumb');
    const volWrap     = $('sp-vol-wrap'),           volFill      = $('sp-vol-fill'),        volThumb     = $('sp-vol-thumb');
    const albumImg    = $('sp-album-img'),          albumPlaceholder = $('sp-album-placeholder');
    const mobAlbumImg = $('sp-mob-album-img');
    const likeBtn     = $('sp-like');

    let playlist = [], idx = -1, shuffleOn = false, repeatOn = false;
    let likedSongs = new Set(JSON.parse(localStorage.getItem('liked') || '[]'));

    const fmt = s => (!isFinite(s)||isNaN(s)) ? '0:00' : `${Math.floor(s/60)}:${(Math.floor(s%60)+'').padStart(2,'0')}`;
    const cx  = e => e.touches ? e.touches[0].clientX : e.clientX;

    function setPct(fill, thumb, pct) {
        fill.style.width = pct + '%';
        if (thumb) thumb.style.left = pct + '%';
    }
    function syncProgress(cur, dur) {
        const pct = (dur > 0 && isFinite(dur)) ? cur / dur * 100 : 0;
        setPct(barFill, barThumb, pct);
        setPct(miniBarFill, miniBarThumb, pct);
        currentEl.textContent = mobCurEl.textContent = fmt(cur);
    }
    function setPlaying(on) {
        iconPlay.style.display    = on ? 'none'  : 'block';
        iconPause.style.display   = on ? 'block' : 'none';
        mobIconPlay.style.display  = on ? 'none'  : 'block';
        mobIconPause.style.display = on ? 'block' : 'none';
    }
    function setMeta(n, a, cover) {
        songName.textContent = miniSong.textContent   = n;
        artistName.textContent = miniArtist.textContent = a;

        if (cover) {
            albumImg.src = cover;
            albumImg.style.display = 'block';
            albumPlaceholder.style.display = 'none';
            mobAlbumImg.src = cover;
            mobAlbumImg.style.display = 'block';
        } else {
            albumImg.style.display = 'none';
            albumPlaceholder.style.display = 'block';
            mobAlbumImg.style.display = 'none';
        }
    }
    function updateLikeBtn(src) {
        if (likedSongs.has(src)) {
            likeBtn.classList.add('liked');
        } else {
            likeBtn.classList.remove('liked');
        }
    }
    function resetBtns() {
        document.querySelectorAll('.select-song-btn').forEach(b => b.innerHTML = '<i class="bi bi-play-fill"></i>');
    }
    function loadTrack(i) {
        if (i < 0 || i >= playlist.length) return;
        resetBtns(); idx = i;
        const t = playlist[i];
        audio.src = t.src;
        setMeta(t.name, t.artist, t.cover || null);
        updateLikeBtn(t.src);
        syncProgress(0, 0);
        durationEl.textContent = mobDurEl.textContent = '0:00';
        audio.play().then(() => { setPlaying(true); t.btn.innerHTML = '<i class="bi bi-pause-fill"></i>'; }).catch(e => console.warn(e));
    }

    playlist = Array.from(document.querySelectorAll('.select-song-btn')).map(btn => ({
        src: btn.dataset.src, name: btn.dataset.name, artist: btn.dataset.artist,
        cover: btn.dataset.cover || null, btn
    }));
    playlist.forEach((t, i) => {
        t.btn.addEventListener('click', () => {
            if (i === idx) {
                if (audio.paused) { audio.play(); setPlaying(true); t.btn.innerHTML='<i class="bi bi-pause-fill"></i>'; }
                else              { audio.pause(); setPlaying(false); t.btn.innerHTML='<i class="bi bi-play-fill"></i>'; }
            } else { loadTrack(i); }
        });
    });



    function togglePlay() {
        if (idx < 0 && playlist.length) { loadTrack(0); return; }
        if (!audio.src) return;
        if (audio.paused) { audio.play(); setPlaying(true); if(idx>=0) playlist[idx].btn.innerHTML='<i class="bi bi-pause-fill"></i>'; }
        else              { audio.pause(); setPlaying(false); if(idx>=0) playlist[idx].btn.innerHTML='<i class="bi bi-play-fill"></i>'; }
    }
    function goNext() { if (playlist.length) loadTrack(shuffleOn ? (Math.random()*playlist.length|0) : (idx+1)%playlist.length); }
    function goPrev() {
        if (!playlist.length) return;
        if (audio.currentTime > 3) { audio.currentTime = 0; return; }
        loadTrack((idx - 1 + playlist.length) % playlist.length);
    }

    $('sp-play').addEventListener('click', togglePlay);     $('sp-play-mobile').addEventListener('click', togglePlay);
    $('sp-next').addEventListener('click', goNext);          $('sp-mob-next').addEventListener('click', goNext);
    $('sp-prev').addEventListener('click', goPrev);          $('sp-mob-prev').addEventListener('click', goPrev);
    $('sp-shuffle').addEventListener('click', () => { shuffleOn=!shuffleOn; $('sp-shuffle').classList.toggle('sp-btn--active',shuffleOn); });
    $('sp-repeat').addEventListener('click',  () => { repeatOn=!repeatOn; audio.loop=repeatOn; $('sp-repeat').classList.toggle('sp-btn--active',repeatOn); });

    audio.addEventListener('timeupdate', () => {
        if (!document.querySelector('.scrubbing') && isFinite(audio.duration))
            syncProgress(audio.currentTime, audio.duration);
    });
    audio.addEventListener('durationchange', () => {
        durationEl.textContent = mobDurEl.textContent = fmt(audio.duration);
    });
    audio.addEventListener('ended', () => {
        if (repeatOn) return;
        setPlaying(false); resetBtns(); goNext();
    });

    function makeScrubber(wrap, onPct) {
        const calc = e => {
            const r = wrap.getBoundingClientRect();
            return Math.max(0, Math.min(1, (cx(e) - r.left) / r.width));
        };
        wrap.addEventListener('mousedown',  e => { wrap.classList.add('scrubbing');    onPct(calc(e)); });
        wrap.addEventListener('touchstart', e => { wrap.classList.add('scrubbing');    onPct(calc(e)); }, { passive: true });
        document.addEventListener('mousemove', e => { if (wrap.classList.contains('scrubbing')) onPct(calc(e)); });
        document.addEventListener('touchmove', e => { if (wrap.classList.contains('scrubbing')) onPct(calc(e)); }, { passive: true });
        document.addEventListener('mouseup',   () => wrap.classList.remove('scrubbing'));
        document.addEventListener('touchend',  () => wrap.classList.remove('scrubbing'));
    }

    function seekTo(pct) {
        if (!isFinite(audio.duration)) return;
        const t = pct * audio.duration;
        setPct(barFill, barThumb, pct * 100);
        setPct(miniBarFill, miniBarThumb, pct * 100);
        currentEl.textContent = mobCurEl.textContent = fmt(t);
        audio.currentTime = t;
    }

    makeScrubber(barWrap, seekTo);
    makeScrubber(miniBarWrap, seekTo);
    makeScrubber(volWrap, pct => { audio.volume = pct; setPct(volFill, volThumb, pct * 100); });

    setPct(volFill, volThumb, 100);

    document.addEventListener("click", () => {
        if (idx < 0 && playlist.length) loadTrack(0);
    }, { once: true });

    document.querySelectorAll('.song-duration').forEach(el => {
        const a = new Audio(el.dataset.src);
        a.addEventListener('loadedmetadata', () => { el.textContent = fmt(a.duration); });
    });
});
</script>