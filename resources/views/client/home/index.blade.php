@extends('client.layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-3 d-none d-md-block">
                @include('client.partials.side')
            </div>
            <div class="col-12 col-md-9">

                <div class="mb-5 mt-3">
                    <div class="mb-3">
                        <p class="text-uppercase mb-1" style="color: var(--sp-gray-1); font-size: 0.75rem; font-weight: 600; letter-spacing: 0.1em;">New</p>
                        <h2 class="fw-black mb-4" style="font-size: 1.5rem; letter-spacing: -0.01em;">Recently Added</h2>
                    </div>

                    <div class="latest-scroll d-flex gap-3" style="overflow-x: auto; padding-bottom: 12px; -webkit-overflow-scrolling: touch;">
                        @foreach ($latestSongs as $song)
                            <div class="latest-card" style="width: 140px; min-width: 140px; cursor: pointer; flex-shrink: 0;">
                                <div style="width: 140px; height: 140px; border-radius: 12px; background: linear-gradient(135deg, #1a3a2a 0%, var(--sp-surface-2) 100%); display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                                    @if ($song->cover_path)
                                        <img src="{{ asset($song->cover_path) }}" alt="{{ $song->name }}" style="width: 100%; height: 100%; object-fit: cover; position: absolute; inset: 0;">
                                    @else
                                        <svg viewBox="0 0 24 24" fill="currentColor" style="width: 48px; height: 48px; color: var(--sp-green); opacity: 0.6;">
                                            <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                                        </svg>
                                    @endif
                                    <button class="select-song-btn latest-play-btn"
                                        data-src="{{ asset($song->audio_path) }}"
                                        data-name="{{ $song->name }}"
                                        data-artist="{{ $song->artist->name }}"
                                        data-cover="{{ $song->cover_path ? asset($song->cover_path) : '' }}"
                                        style="position: absolute; bottom: 8px; right: 8px; width: 40px; height: 40px; border-radius: 50%; background: var(--sp-green); border: none; color: #000; display: flex; align-items: center; justify-content: center; font-size: 1rem; cursor: pointer; opacity: 0; transform: translateY(4px); transition: opacity 0.2s, transform 0.2s; box-shadow: 0 4px 12px rgba(0,0,0,0.4);">
                                        <i class="bi bi-play-fill"></i>
                                    </button>
                                </div>
                                <div class="mt-2">
                                    <div class="fw-semibold text-truncate" style="font-size: 0.875rem; color: #fff;">{{ $song->name }}</div>
                                    <a href="{{ route('artists.show', $song->artist->id) }}"
                                       class="text-truncate d-block text-decoration-none"
                                       style="font-size: 0.75rem; color: var(--sp-gray-1);"
                                       onclick="event.stopPropagation()">
                                        {{ $song->artist->name }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-5">
                    <p class="text-uppercase mb-1" style="color: var(--sp-gray-1); font-size: 0.75rem; font-weight: 600; letter-spacing: 0.1em;">Discover</p>
                    <h2 class="fw-black mb-4" style="font-size: 1.5rem; letter-spacing: -0.01em;">Artists</h2>

                    <div class="latest-scroll d-flex gap-4" style="overflow-x: auto; padding-bottom: 12px; -webkit-overflow-scrolling: touch;">
                        @foreach ($artists as $artist)
                            <a href="{{ route('artists.show', $artist->id) }}" class="text-decoration-none" style="flex-shrink: 0; width: 120px;">
                                <div class="artist-card" style="text-align: center;">
                                    <div class="artist-avatar" style="width: 120px; height: 120px; border-radius: 50%; background: linear-gradient(135deg, #2a2a2a 0%, #3a3a3a 100%); display: flex; align-items: center; justify-content: center; margin: 0 auto; overflow: hidden; transition: transform 0.2s, box-shadow 0.2s;">
                                        @if ($artist->photo_path)
                                            <img src="{{ asset($artist->photo_path) }}" alt="{{ $artist->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        @else
                                            <svg viewBox="0 0 24 24" fill="currentColor" style="width: 48px; height: 48px; color: #535353;">
                                                <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="mt-2 fw-semibold text-truncate" style="font-size: 0.875rem; color: #fff;">{{ $artist->name }}</div>
                                    <div style="font-size: 0.72rem; color: var(--sp-gray-1);">{{ $artist->songs_count }} {{ Str::plural('song', $artist->songs_count) }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="mb-2">
                    <p class="text-uppercase mb-1" style="color: var(--sp-gray-1); font-size: 0.75rem; font-weight: 600; letter-spacing: 0.1em;">Browse</p>
                    <h2 class="fw-black mb-4" style="font-size: 1.5rem; letter-spacing: -0.01em;">Categories</h2>

                    @php
                        $gradients = [
                            'linear-gradient(135deg, #1db954 0%, #006e32 100%)',
                            'linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%)',
                            'linear-gradient(135deg, #dc2626 0%, #9f1239 100%)',
                            'linear-gradient(135deg, #d97706 0%, #b45309 100%)',
                            'linear-gradient(135deg, #0891b2 0%, #0e7490 100%)',
                            'linear-gradient(135deg, #db2777 0%, #9d174d 100%)',
                            'linear-gradient(135deg, #16a34a 0%, #14532d 100%)',
                            'linear-gradient(135deg, #7c3aed 0%, #4f46e5 100%)',
                            'linear-gradient(135deg, #ea580c 0%, #9a3412 100%)',
                            'linear-gradient(135deg, #0284c7 0%, #075985 100%)',
                            'linear-gradient(135deg, #be185d 0%, #9d174d 100%)',
                            'linear-gradient(135deg, #047857 0%, #065f46 100%)',
                        ];
                    @endphp

                    <div class="latest-scroll d-flex gap-3" style="overflow-x: auto; padding-bottom: 12px; -webkit-overflow-scrolling: touch;">
                        @foreach ($categories as $index => $category)
                            <a href="{{ route('categories.show', $category->id) }}" class="text-decoration-none" style="flex-shrink: 0;">
                                <div class="category-tile" style="width: 150px; height: 150px; border-radius: 12px; background: {{ $gradients[$index % count($gradients)] }}; position: relative; overflow: hidden; transition: transform 0.15s, filter 0.15s; display: flex; flex-direction: column; justify-content: flex-end; padding: 1rem;">
                                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                                         style="position: absolute; top: -8px; right: -4px; width: 80px; height: 80px; opacity: 0.2; transform: rotate(15deg);">
                                        <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                                    </svg>
                                    <div class="fw-bold text-truncate" style="font-size: 0.95rem; color: #fff; position: relative; z-index: 1;">{{ $category->name }}</div>
                                    <div style="font-size: 0.72rem; color: rgba(255,255,255,0.75); margin-top: 2px; position: relative; z-index: 1;">
                                        {{ $category->songs_count }} {{ Str::plural('song', $category->songs_count) }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .latest-scroll::-webkit-scrollbar { height: 6px; }
        .latest-scroll::-webkit-scrollbar-track { background: transparent; border-radius: 4px; }
        .latest-scroll::-webkit-scrollbar-thumb { background: transparent; border-radius: 4px; transition: background 0.2s; }
        .latest-scroll:hover::-webkit-scrollbar-thumb { background: #535353; }
        .latest-scroll:hover::-webkit-scrollbar-thumb:hover { background: #888; }
        .latest-scroll { cursor: grab; user-select: none; }
        .latest-scroll:active { cursor: grabbing; }
        .latest-card:hover .latest-play-btn { opacity: 1 !important; transform: translateY(0) !important; }
        .latest-card:hover > div:first-child { filter: brightness(1.1); }
        .artist-card:hover .artist-avatar { transform: scale(1.02); box-shadow: 0 8px 24px rgba(0,0,0,0.5); }
        .artist-card:hover .fw-semibold { color: var(--sp-green) !important; }
        .category-tile:hover { transform: scale(1.04); filter: brightness(1.12); }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.latest-card').forEach(card => {
                card.addEventListener('click', (e) => {
                    if (e.target.closest('a')) return;
                    const btn = card.querySelector('.select-song-btn');
                    if (btn) btn.dispatchEvent(new MouseEvent('click', { bubbles: true }));
                });
            });
            document.querySelectorAll('.latest-scroll').forEach(slider => {
                let isDown = false, startX, scrollLeft;
                slider.addEventListener('mousedown', (e) => { isDown = true; startX = e.pageX - slider.offsetLeft; scrollLeft = slider.scrollLeft; });
                slider.addEventListener('mouseleave', () => isDown = false);
                slider.addEventListener('mouseup', () => isDown = false);
                slider.addEventListener('mousemove', (e) => {
                    if (!isDown) return;
                    e.preventDefault();
                    const x = e.pageX - slider.offsetLeft;
                    slider.scrollLeft = scrollLeft - (x - startX) * 1.5;
                });
            });
        });
    </script>
@endsection