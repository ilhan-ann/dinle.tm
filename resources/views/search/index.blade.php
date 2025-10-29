@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row mb-5">
            <div class="col-3">
                @include('layouts.side')
            </div>
            <div class="col-9">
                <form action="{{ route('search') }}" method="get" class="me-3 col-4">
                    <label class="form-label" for="q"></label>
                    <input class="form-control glass" type="text" name="q" id="q" placeholder="Search..."
                        value="{{ $f_q ? $f_q : ''}}">
                    <div class="d-flex mt-3">
                        <button type="submit" class="btn glass btn-glass text-black w-100 ">Submit</button>
                        <a href="{{ route('search') }}" class="btn glass btn-glass border text-black ms-2 w-100">Reset</a>
                    </div>
                </form>
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
                                    <i class="bi bi-clock me-1"></i> --
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
    <div class="mt-4">
        {{ $songs->links('pagination::bootstrap-5') }}
    </div>
    </div>
@endsection