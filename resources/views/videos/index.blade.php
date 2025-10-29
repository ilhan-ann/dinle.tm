@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row mb-5">
            <div class="col-3">
                @include('layouts.side')
            </div>
            <div class="col-9">
                <div class="h3">
                    Videos:
                </div>
                @foreach($videos as $video)
                    <div class="col">
                        <div class="border rounded-4 p-1 px-2 glass d-flex mt-2 justify-content-between align-items-center">
                            <a href="{{ route('videos.show', $video->id) }}" class="text-decoration-none text-black">
                                <video class="w-100 rounded-3 mb-2" poster="{{ asset($video->video_path) }}" controls>
                                    <source src="{{ asset($video->video_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="h5 pt-2">
                                    {{ $video->name }}
                                    <a href="{{ route('artists.show', $video->artist->id) }}" class="text-decoration-none">
                                        <div class="h6 text-secondary mb-3">{{ $video->artist->name }}</div>
                                    </a>
                                </div>
                            </a>
                            <div class="d-flex align-items-center gap-4">
                                <span class="text-secondary">
                                    <i class="bi bi-people"></i> {{ $video->view_count }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection