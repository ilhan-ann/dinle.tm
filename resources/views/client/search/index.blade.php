@extends('client.layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-3 d-none d-md-block">
                @include('client.partials.side')
            </div>
            <div class="col-12 col-md-9">
<button onclick="history.back()" class="btn p-0 mb-3 mt-2 d-flex align-items-center gap-2"
    style="color: var(--sp-gray-1); font-size: 0.875rem; background: transparent; border: none; cursor: pointer; transition: color 0.15s;"
    onmouseenter="this.style.color='#fff'" onmouseleave="this.style.color='var(--sp-gray-1)'">
    <i class="bi bi-arrow-left" style="font-size: 1rem;"></i>
    Back
</button>
                <div class="mb-4 mt-2">
                    <p class="text-uppercase mb-1" style="color: var(--sp-gray-1); font-size: 0.75rem; font-weight: 600; letter-spacing: 0.1em;">Discover</p>
                    <h1 class="fw-black mb-0" style="font-size: clamp(2rem, 6vw, 4rem); letter-spacing: -0.02em;">Search</h1>
                </div>

                <form action="{{ route('search') }}" method="get" class="mb-4" style="max-width: 480px;">
                    <div class="d-flex gap-2">
                        <div style="position: relative; flex: 1;">
                            <svg viewBox="0 0 24 24" fill="currentColor"
                                 style="position:absolute;left:12px;top:50%;transform:translateY(-50%);width:16px;height:16px;color:#b3b3b3;pointer-events:none;">
                                <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                            </svg>
                            <input type="text" name="q" id="q"
                                   placeholder="Artists, songs..."
                                   value="{{ $f_q ?? '' }}"
                                   style="width:100%; background:#282828; border:none; border-radius:500px; padding:0.625rem 1rem 0.625rem 2.5rem; color:#fff; font-size:0.875rem; outline:none;"
                                   onfocus="this.style.background='#3e3e3e'"
                                   onblur="this.style.background='#282828'">
                        </div>
                        <button type="submit"
                                style="background:#1db954; color:#000; border:none; border-radius:500px; padding:0.625rem 1.25rem; font-size:0.875rem; font-weight:700; cursor:pointer; white-space:nowrap; transition:background .15s, transform .15s;"
                                onmouseenter="this.style.background='#1ed760';this.style.transform='scale(1.04)'"
                                onmouseleave="this.style.background='#1db954';this.style.transform='scale(1)'">
                            Search
                        </button>
                        @if($f_q)
                        <a href="{{ route('search') }}"
                           style="background:#282828; color:#b3b3b3; border:none; border-radius:500px; padding:0.625rem 1rem; font-size:0.875rem; font-weight:600; cursor:pointer; text-decoration:none; display:flex; align-items:center; transition:color .15s, background .15s;"
                           onmouseenter="this.style.color='#fff';this.style.background='#3e3e3e'"
                           onmouseleave="this.style.color='#b3b3b3';this.style.background='#282828'">
                            Clear
                        </a>
                        @endif
                    </div>
                </form>

                @if($songs->count())
                    <div class="mb-2" style="color: var(--sp-gray-1); font-size: 0.8125rem;">
                        {{ $songs->total() }} {{ Str::plural('result', $songs->total()) }}
                        @if($f_q) for <strong style="color:#fff;">"{{ $f_q }}"</strong>@endif
                    </div>

                    <div class="d-flex align-items-center px-3 pb-2 mb-1" style="border-bottom: 1px solid #282828;">
                        <div style="width: 1.5rem; flex-shrink: 0;" class="me-3"></div>
                        <div class="flex-grow-1" style="font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: #b3b3b3;">Title</div>
                        <div class="d-flex align-items-center gap-4 flex-shrink-0">
                            <span style="font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: #b3b3b3;"><i class="bi bi-people"></i></span>
                            <span style="font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: #b3b3b3; min-width: 2.5rem; text-align: right;"><i class="bi bi-clock"></i></span>
                        </div>
                    </div>

                    <div class="d-flex flex-column">
                        @foreach ($songs as $index => $song)
                            <div class="song-row d-flex align-items-center px-3 py-2 rounded-3">

                                <div class="song-cell me-3" style="width: 1.5rem; flex-shrink: 0; text-align: center;">
                                    <span class="song-num" style="color: #b3b3b3; font-size: 0.875rem; pointer-events: none;">{{ $songs->firstItem() + $loop->index }}</span>
                                    <button class="select-song-btn song-play-btn btn p-0 border-0"
                                        data-src="{{ asset($song->audio_path) }}"
                                        data-name="{{ $song->name }}"
                                        data-artist="{{ $song->artist->name }}"
                                        style="color: #fff; background: transparent; line-height: 1; font-size: 1rem;">
                                        <i class="bi bi-play-fill"></i>
                                    </button>
                                </div>

                                <div class="flex-grow-1 overflow-hidden me-3">
                                    <div class="fw-semibold text-truncate song-title" style="font-size: 0.9375rem; color: #fff;">{{ $song->name }}</div>
                                    <a href="{{ route('artists.show', $song->artist->id) }}"
                                       class="text-decoration-none artist-link text-truncate d-block"
                                       style="font-size: 0.8125rem; color: #b3b3b3;"
                                       onclick="event.stopPropagation()">
                                        {{ $song->artist->name }}
                                    </a>
                                </div>

                                <div class="d-flex align-items-center gap-4 flex-shrink-0">
                                    <span style="color: #b3b3b3; font-size: 0.8125rem;">
                                        <i class="bi bi-people me-1"></i>{{ number_format($song->listener_count) }}
                                    </span>
                                    <span class="song-duration" data-src="{{ asset($song->audio_path) }}"
                                          style="color: #b3b3b3; font-size: 0.8125rem; min-width: 2.5rem; text-align: right;">—</span>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <div class="mt-3">
                        {{ $songs->appends(['q' => $f_q])->links('pagination::bootstrap-5') }}
                    </div>

                @else
                    <div class="text-center py-5" style="color: #b3b3b3;">
                        <svg viewBox="0 0 24 24" fill="currentColor" style="width:48px;height:48px;opacity:.3;margin-bottom:1rem;display:block;margin-left:auto;margin-right:auto;">
                            <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                        </svg>
                        <p class="mb-1 fw-semibold" style="color:#fff;">No results found</p>
                        <p style="font-size:0.875rem;">Try searching for something else</p>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <style>
        .song-row {
            transition: background 0.15s ease;
            cursor: pointer;
        }
        .song-row:hover { background: #282828; }

        .song-cell .song-num      { display: block; }
        .song-cell .song-play-btn { display: none; }

        .song-row:hover .song-num      { display: none; }
        .song-row:hover .song-play-btn { display: block; }

        .song-row.active .song-title    { color: #1db954 !important; }
        .song-row.active .song-num      { color: #1db954 !important; display: none; }
        .song-row.active .song-play-btn { display: block; }

        .artist-link:hover { color: #fff !important; }

        /* Pagination */
        .pagination .page-link {
            background: #282828; border-color: transparent;
            color: #b3b3b3; border-radius: 4px;
        }
        .pagination .page-link:hover { background: #3e3e3e; color: #fff; }
        .pagination .page-item.active .page-link { background: #fff; color: #000; border-color: transparent; }
        .pagination .page-item.disabled .page-link { background: #181818; color: #535353; }
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