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
            </div>
                {{ $song->name }}
        </div>
    </div>
    <div>
        @include('layouts.player')
    </div>
</div>
@endsection