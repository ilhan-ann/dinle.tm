@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row mb-5">
            <div class="col-3">
                @include('layouts.side')
            </div>
            <div class="col-9">
                <div class="row row-cols-1 g-3">
                    @foreach ($categories as $category)
                        <div class="col">
                            <div class="border rounded-4 h-100 p-4 glass">
                                <div class="h5">
                                    <a href="{{ route('categories.show', $category->id) }}" class="text-decoration-none text-black">{{ $category->name}}</a>
                                </div>
                                <div class="h5">

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                @include('layouts.player')
            </div>
        </div>
    </div>
    </div>
@endsection