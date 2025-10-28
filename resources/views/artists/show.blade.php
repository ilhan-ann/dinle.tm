@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row mb-5">
            <div class="col-3">
                @include('layouts.side')
            </div>
            <div class="col-9">
                <div class="h3">
                    {{ $artist->name }}
                    <div class="h5">
                        Songs:
                    </div>
                </div>
                @foreach($songs as $song)
                    <div class="glass p-1 d-flex mt-2 justify-content-between align-items-center">
                        <div class="h5">
                            {{ $song->name }}
                        </div>
                        <div class="h6 text-secondary me-2">
                            {{ $song->listener_count }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            @include('layouts.player')
        </div>
    </div>
@endsection