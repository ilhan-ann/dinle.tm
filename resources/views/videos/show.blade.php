@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row mb-5">
            <div class="col-3 d-none d-md-block">
                @include('partials.side')
            </div>
            <div class="col-12 col-md-9">

                <h2 class="mb-3 text-white">{{ $video->name }}</h2>
                <small class="text-secondary mb-3 d-block">{{ $video->artist->name }} · <i class="bi bi-eye"></i>
                    {{ $video->view_count }} Views</small>
                <div class="mb-4">
                    <video class="w-100 rounded-4" controls>
                        <source src="{{ asset($video->video_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
@endsection