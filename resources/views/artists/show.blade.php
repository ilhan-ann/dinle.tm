@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-3 d-none d-md-block">
                @include('partials.side')
            </div>
            <div class="col-12 col-md-9">
                <div class="h3">
                    {{ $artist->name }}
                    <div class="h5">
                        Songs:
                    </div>
                </div>
                @foreach ($songs as $song)
                    <div class="col">
                        <div class="border rounded-4 p-1 px-2 glass d-flex mt-2 justify-content-between align-items-center">
                            <div class="h5 pt-2">
                                {{ $song->name }}
                                <a href="{{ route('artists.show', $song->artist->id) }}" class="text-decoration-none">
                                    <div class="h6 text-secondary mb-3">{{ $song->artist->name }}</div>
                                </a>
                            </div>
                            <div class="d-flex align-items-center gap-4">
                                <span class="text-secondary">
                                    <i class="bi bi-people"></i> {{ $song->listener_count }}
                                </span>
                                <span class="text-secondary small song-duration" data-src="{{ asset($song->audio_path) }}">
                                    <i class="bi bi-clock me-1"></i>
                                </span>
                                <button class="btn glass btn-glass select-song-btn text-black"
                                    data-src="{{ asset($song->audio_path) }}" data-name="{{ $song->name }}"
                                    data-artist="{{ $song->artist->name }}">
                                    <i class="bi bi-play-fill"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection