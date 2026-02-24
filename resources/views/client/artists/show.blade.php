@extends('client.layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-3 d-none d-md-block">
               @include('client.partials.side')
            </div>
            <div class="col-12 col-md-9">

                {{-- Back button --}}
                <button onclick="history.back()" class="btn p-0 mb-3 mt-2 d-flex align-items-center gap-2" style="color: var(--sp-gray-1); font-size: 0.875rem; background: transparent; border: none; cursor: pointer; transition: color 0.15s;">
                    <i class="bi bi-arrow-left" style="font-size: 1rem;"></i>
                    Back
                </button>

                <div class="mb-4 mt-2">
                    <p class="text-uppercase mb-1" style="color: var(--sp-gray-1); font-size: 0.75rem; font-weight: 600; letter-spacing: 0.1em;">Artist</p>
                    <h1 class="fw-black mb-0" style="font-size: clamp(2rem, 6vw, 4rem); letter-spacing: -0.02em;">{{ $artist->name }}</h1>
                    <p class="mt-2 mb-0" style="color: var(--sp-gray-1); font-size: 0.875rem;">{{ $songs->count() }} {{ Str::plural('song', $songs->count()) }}</p>
                </div>

                {{-- Header --}}
                <div class="d-flex align-items-center px-3 pb-2 mb-1" style="border-bottom: 1px solid var(--sp-surface-2, #282828);">
                    <div style="width: 1.5rem; flex-shrink: 0;" class="me-3"></div>
                    <div class="grow" style="font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: var(--sp-gray-1);">Title</div>
                    <div class="d-flex align-items-center gap-4 shrink-0">
                        <span style="font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: var(--sp-gray-1);"><i class="bi bi-people"></i></span>
                        <span style="font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: var(--sp-gray-1); min-width: 2.5rem; text-align: right;"><i class="bi bi-clock"></i></span>
                    </div>
                </div>

                <div class="d-flex flex-column">
                    @foreach ($songs as $index => $song)
                        <div class="song-row d-flex align-items-center px-3 py-2 rounded-3">

                            {{-- Index / Play --}}
                            <div class="song-cell me-3" style="width: 1.5rem; flex-shrink: 0; text-align: center;">
                                <span class="song-num" style="color: var(--sp-gray-1); font-size: 0.875rem; pointer-events: none;">{{ $index + 1 }}</span>
                                <button class="select-song-btn song-play-btn btn p-0 border-0"
                                    data-src="{{ asset($song->audio_path) }}"
                                    data-name="{{ $song->name }}"
                                    data-artist="{{ $song->artist->name }}"
                                    style="color: #fff; background: transparent; line-height: 1; font-size: 1rem;">
                                    <i class="bi bi-play-fill"></i>
                                </button>
                            </div>

                            {{-- Title + Artist --}}
                            <div class="grow overflow-hidden me-3">
                                <div class="fw-semibold text-truncate song-title" style="font-size: 0.9375rem; color: #fff;">{{ $song->name }}</div>
                                <a href="{{ route('artists.show', $song->artist->id) }}"
                                   class="text-decoration-none artist-link text-truncate d-block"
                                   style="font-size: 0.8125rem; color: var(--sp-gray-1);"
                                   onclick="event.stopPropagation()">
                                    {{ $song->artist->name }}
                                </a>
                            </div>

                            {{-- Stats --}}
                            <div class="d-flex align-items-center gap-4 shrink-0">
                                <span style="color: var(--sp-gray-1); font-size: 0.8125rem;">
                                    <i class="bi bi-people me-1"></i>{{ number_format($song->listener_count) }}
                                </span>
                                <span class="song-duration" data-src="{{ asset($song->audio_path) }}"
                                      style="color: var(--sp-gray-1); font-size: 0.8125rem; min-width: 2.5rem; text-align: right;">—</span>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <style>
        .song-row { transition: background 0.15s ease; cursor: pointer; }
        .song-row:hover { background: var(--sp-surface-2, #282828); }
        .song-cell .song-num      { display: block; }
        .song-cell .song-play-btn { display: none; }
        .song-row:hover .song-num      { display: none; }
        .song-row:hover .song-play-btn { display: block; }
        .song-row.active .song-title    { color: #1db954 !important; }
        .song-row.active .song-num      { display: none; }
        .song-row.active .song-play-btn { display: block; }
        .artist-link:hover { color: #fff !important; }
        button[onclick="history.back()"]:hover { color: #fff !important; }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.song-row').forEach(row => {
                row.addEventListener('click', (e) => {
                    if (e.target.closest('.artist-link')) return;
                    e.preventDefault();
                    const btn = row.querySelector('.select-song-btn');
                    if (!btn) return;
                    btn.dispatchEvent(new MouseEvent('click', { bubbles: true }));
                    document.querySelectorAll('.song-row').forEach(r => r.classList.remove('active'));
                    row.classList.add('active');
                });
            });
        });
    </script>
@endsection