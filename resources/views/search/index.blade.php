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
            <div class="row row-cols-1 g-3 mt-3">
                @foreach ($songs as $song)
                <div class="col">
                    <div class="border rounded-4 h-100 p-4 glass">
                        <div class="h5">
                            {{ $song->name }}
                            <div class="h6 mt-1">
                                <a href="{{ route('artists.show', $song->artist->id) }}" class="text-decoration-none text-secondary">{{ $song->artist->name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $songs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    <div>
        @include('layouts.player')
    </div>
</div>
@endsection