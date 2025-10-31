@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-3 d-none d-md-block">
                @include('partials.side')
            </div>
            <div class="col-12 col-md-9">
                <div class="row row-cols-1 g-3">
                    <section id="banner" class="splide mt-5" aria-label="meals">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <img src="{{ asset('img/Screenshot 2025-07-13 125508.png') }} "
                                        class="img-fluid rounded-4" alt="">
                                </li>
                                <li class="splide__slide">
                                    <img src="{{ asset('img/Screenshot 2025-07-13 125529.png') }} "
                                        class="img-fluid rounded-4" alt="">
                                </li>
                                <li class="splide__slide">
                                    <img src="{{ asset('img/Screenshot 2025-07-13 125535.png') }} "
                                        class="img-fluid rounded-4" alt="">
                                </li>
                                <li class="splide__slide">
                                    <img src="{{ asset('img/Screenshot 2025-07-17 151658.png') }} "
                                        class="img-fluid rounded-4" alt="">
                                </li>
                                <li class="splide__slide">
                                    <img src="{{ asset('img/Screenshot 2025-07-17 151249.png') }} "
                                        class="img-fluid rounded-4" alt="">
                                </li>
                                <li class="splide__slide">
                                    <img src="{{ asset('img/Screenshot 2025-07-17 151257.png') }} "
                                        class="img-fluid rounded-4" alt="">
                                </li>
                            </ul>
                        </div>
                    </section>
                    @foreach ($categories as $category)
                        <div class="col">
                            <div class="border rounded-4 h-100 p-4 glass">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="h5">
                                        {{ $category->name}}
                                    </div>
                                    <div>
                                        <a href="{{ route('categories.show', $category->id) }}"
                                        class="text-decoration-none text-black"><i class="bi bi-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var splide = new Splide('#banner', {
                type: 'loop',
                autoplay: 1,
                arrows: 1,
                interval: 2000,
                pauseOnHover: 1,
                perMove: 1,
                perPage: 3,
                gap: "8px",
                breakpoints: {
                    640: {
                        perPage: 1,
                    },
                    990: {
                        perPage: 2,
                    },
                    1420: {
                        perPage: 3,
                    }
                }
            });
            splide.mount();
        });
    </script>
@endsection