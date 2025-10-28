@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row mb-5">
            <div class="col-3">
                @include('layouts.side')
            </div>
            <div class="col-9">
                <div class="h3">
                    {{ $category->name }}
                </div>
                <div>
                    @foreach($songs as $song)
                        <div class="glass p-2 px-3 d-flex mt-2 justify-content-between align-items-center">
                            <div class="h5">
                                {{ $song->name }}
                                <div class="h6 mt-1">
                                    <a href="{{ route('artists.show', $song->artist->id) }}"
                                        class="text-decoration-none text-secondary">{{ $song->artist->name }}</a>
                                </div>
                            </div>
                            <div class="h6 text-secondary me-2">
                                {{ $song->listener_count }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div>
            @include('layouts.player')
        </div>
    </div>
@endsection