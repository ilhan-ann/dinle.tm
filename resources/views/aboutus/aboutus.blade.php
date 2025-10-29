@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row mb-5">
            <div class="col-3">
                <a href="/" class="btn glass btn-glass text-black rounded-circle"><i class="bi bi-chevron-left"></i></a>
            </div>
            <div class="h3 text-center mt-5 fw-bold">
                <div class="mt-3">
                    Dinle.tm > <span class="typed h3 text-dark" data-typed-items="
                                                                TMCell Sazz, Aydym.com, Hinlen.tm, Belet Music
                                                                ">
                    </span>
                    <span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span>
                    <script>
                        const selectTyped = document.querySelector('.typed');
                        if (selectTyped) {
                            let typed_strings = selectTyped.getAttribute('data-typed-items');
                            typed_strings = typed_strings.split(',');
                            new Typed('.typed', {
                                strings: typed_strings,
                                loop: true,
                                typeSpeed: 100,
                                backSpeed: 50,
                                backDelay: 2000
                            });
                        }
                    </script>
                </div>
            </div>
            <section class="glass-nav p-5 my-5 rounded-5 position-relative overflow-hidden">
                <div class="waves-bg" aria-hidden="true">
                    <svg class="wave wave-1" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M0,40 C150,90 350,0 600,30 C850,60 1050,10 1200,40 L1200,120 L0,120 Z"></path>
                    </svg>
                    <svg class="wave wave-2" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M0,60 C200,10 400,100 600,60 C800,20 1000,100 1200,60 L1200,120 L0,120 Z"></path>
                    </svg>
                </div>
                <div class="container-lg">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 text-center">
                            <h2 class="display-5 fw-bold mb-3 about-title text-black">About Us</h2>

                            <p class="lead text-muted mb-3 about-lead">
                                We are a team that transforms sound into emotion.
                                Our mission is to create a space where technology meets feeling —
                                where every note, every pause, and every beat tells a story.
                            </p>

                            <p class="text-muted mb-4 about-desc">
                                From precise audio playback to intuitive design,
                                we craft experiences that feel natural and inspiring.
                                Dinle.tm isn’t just about listening — it’s about connection.
                            </p>

                            <div class="d-flex justify-content-center gap-3 mb-3">
                                <a href="/contact" class="btn btn-primary btn-lg">Contact Us</a>
                                <a href="/team" class="btn glass btn-glass btn-lg text-black">Our Team</a>
                            </div>

                            <div class="text-muted small">
                                © 2025 dinle.tm · Music that feels.
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection