@extends('client.layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-3 d-none d-md-block">
                @include('client.partials.side')
            </div>
            <div class="col-12 col-md-9">

                <button onclick="history.back()" class="btn p-0 mb-3 mt-2 d-flex align-items-center gap-2" style="color: var(--sp-gray-1); font-size: 0.875rem; background: transparent; border: none; cursor: pointer; transition: color 0.15s;">
                    <i class="bi bi-arrow-left" style="font-size: 1rem;"></i>
                    Back
                </button>

                <div class="mb-4 mt-2">
                    <p class="text-uppercase mb-1" style="color: var(--sp-gray-1); font-size: 0.75rem; font-weight: 600; letter-spacing: 0.1em;">Browse</p>
                    <h1 class="fw-black mb-0" style="font-size: clamp(2rem, 6vw, 4rem); letter-spacing: -0.02em;">Videos</h1>
                    <p class="mt-2 mb-0" style="color: var(--sp-gray-1); font-size: 0.875rem;">{{ $videos->count() }} {{ Str::plural('video', $videos->count()) }}</p>
                </div>

                <div class="d-flex align-items-center px-3 pb-2 mb-1" style="border-bottom: 1px solid var(--sp-surface-2, #282828);">
                    <div style="width: 1.5rem; flex-shrink: 0;" class="me-3"></div>
                    <div class="grow" style="font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: var(--sp-gray-1);">Title</div>
                    <div class="shrink-0">
                        <span style="font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: var(--sp-gray-1);"><i class="bi bi-eye"></i></span>
                    </div>
                </div>

                <div class="d-flex flex-column">
                    @foreach ($videos as $index => $video)
                        <a href="{{ route('videos.show', $video->id) }}" class="text-decoration-none">
                            <div class="song-row d-flex align-items-center px-3 py-2 rounded-3">

                                <div class="me-3" style="width: 1.5rem; flex-shrink: 0; text-align: center;">
                                    <span style="color: var(--sp-gray-1); font-size: 0.875rem;">{{ $index + 1 }}</span>
                                </div>

                                <div class="d-flex align-items-center gap-3 grow overflow-hidden me-3">
                                    <div class="shrink-0" style="width: 64px; height: 36px; border-radius: 6px; overflow: hidden; background: var(--sp-surface-2);">
                                        <video src="{{ asset($video->video_path) }}" style="width: 100%; height: 100%; object-fit: cover;" muted preload="metadata"></video>
                                    </div>
                                    <div class="overflow-hidden">
                                        <div class="fw-semibold text-truncate" style="font-size: 0.9375rem; color: #fff;">{{ $video->name }}</div>
                                        <a href="{{ route('artists.show', $video->artist->id) }}"
                                           class="text-decoration-none artist-link text-truncate d-block"
                                           style="font-size: 0.8125rem; color: var(--sp-gray-1);"
                                           onclick="event.stopPropagation()">
                                            {{ $video->artist->name }}
                                        </a>
                                    </div>
                                </div>

                                <div class="shrink-0">
                                    <span style="color: var(--sp-gray-1); font-size: 0.8125rem;">
                                        <i class="bi bi-eye me-1"></i>{{ number_format($video->view_count) }}
                                    </span>
                                </div>

                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <style>
        .song-row {
            transition: background 0.15s ease;
            cursor: pointer;
        }
        .song-row:hover {
            background: var(--sp-surface-2, #282828);
        }
        .artist-link:hover { color: #fff !important; }
        button[onclick="history.back()"]:hover { color: #fff !important; }
    </style>
@endsection