@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row mb-5">
            <div class="col-3">
                @include('layouts.side')
            </div>
            <div class="col-9">
                <div>
                    @foreach ($songs as $song)
                        <div class="col">
                            <div class="border rounded-4 p-1 px-2 glass d-flex mt-2 justify-content-between align-items-center">
                                <div class="h5 pt-2">{{ $song->name }}
                                    <a href="{{ route('artists.show', $song->artist->id) }}" class="text-decoration-none">
                                        <div class="h6 text-secondary mb-3">{{ $song->artist->name }}</div>
                                    </a>
                                </div>
                                <div>           
                                <span class="me-5">
                                   <i class="bi bi-people"></i> {{ $song->listener_count }}
                                </span>
                                    <button class="btn glass btn-glass select-song-btn text-black" data-src="{{ asset($song->audio_path) }}"
                                    data-name="{{ $song->name }}" data-artist="{{ $song->artist->name }}">
                                    <i class="bi bi-play-fill"></i>
                                </button>
                                </div>
                            </div>
                        </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection