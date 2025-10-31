@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-1 d-none d-md-block">
                <a href="/about-us" class="btn glass btn-glass text-black rounded-circle"><i class="bi bi-chevron-left"></i></a>
            </div>
            <div class="col-3 bg-light rounded-5 glass-nav mx-2">
                <img class="img-fluid w-100 rounded-4 pt-3" src="{{ asset('img/ceo.jpg') }}" alt="">
                <div class="h2 fw-bold mt-3">
                    Ilhan
                </div>
                <div class="h4 fw-bold mb-3">
                    CEO
                </div>
            </div>
        </div>
    </div>
@endsection