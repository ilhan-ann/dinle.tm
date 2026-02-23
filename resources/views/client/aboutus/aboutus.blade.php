@extends('client.layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-3 d-none d-md-block">
                @include('client.partials.side')
            </div>
            <div class="col-12 col-md-9">

                {{-- Back button --}}
                <button onclick="history.back()" class="btn p-0 mb-3 mt-2 d-flex align-items-center gap-2"
                    style="color: var(--sp-gray-1); font-size: 0.875rem; background: transparent; border: none; cursor: pointer; transition: color 0.15s;"
                    onmouseenter="this.style.color='#fff'" onmouseleave="this.style.color='var(--sp-gray-1)'">
                    <i class="bi bi-arrow-left" style="font-size: 1rem;"></i>
                    Back
                </button>

                {{-- Header --}}
                <div class="mb-5 mt-2">
                    <p class="text-uppercase mb-1" style="color: var(--sp-gray-1); font-size: 0.75rem; font-weight: 600; letter-spacing: 0.1em;">About</p>
                    <h1 class="fw-black mb-0" style="font-size: clamp(2rem, 6vw, 4rem); letter-spacing: -0.02em;">Dinle.tm</h1>
                    <p class="mt-2 mb-0" style="color: var(--sp-gray-1); font-size: 0.875rem;">Music that feels.</p>
                </div>

                {{-- Tagline --}}
<div class="mb-5">
    <h2 style="font-size: clamp(1.5rem, 4vw, 2.5rem); font-weight: 900; letter-spacing: -0.02em; line-height: 1.2; background: linear-gradient(90deg, #1db954 0%, #4ade80 50%, #fff 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
        Better than TMCell Sazz<br>Better than Aydym.com<br>Just Dinle.tm
    </h2>
</div>

                {{-- About content --}}
                <div style="border-bottom: 1px solid var(--sp-surface-2); padding-bottom: 2rem; margin-bottom: 2rem;">
                    <h2 class="fw-bold mb-3" style="font-size: 1.25rem; color: #fff;">Who we are</h2>
                    <p style="color: var(--sp-gray-1); font-size: 0.9375rem; line-height: 1.7; max-width: 640px;">
                        We are a team that transforms sound into emotion.
                        Our mission is to create a space where technology meets feeling —
                        where every note, every pause, and every beat tells a story.
                    </p>
                </div>

                <div style="border-bottom: 1px solid var(--sp-surface-2); padding-bottom: 2rem; margin-bottom: 2rem;">
                    <h2 class="fw-bold mb-3" style="font-size: 1.25rem; color: #fff;">What we do</h2>
                    <p style="color: var(--sp-gray-1); font-size: 0.9375rem; line-height: 1.7; max-width: 640px;">
                        From precise audio playback to intuitive design,
                        we craft experiences that feel natural and inspiring.
                        Dinle.tm isn't just about listening — it's about connection.
                    </p>
                </div>

                {{-- Actions --}}
                <div class="d-flex align-items-center gap-3 mb-5">
                    <a href="/contact"
                       style="background: var(--sp-green); color: #000; border: none; border-radius: 500px; padding: 0.625rem 1.5rem; font-size: 0.875rem; font-weight: 700; cursor: pointer; text-decoration: none; transition: background 0.15s, transform 0.15s;"
                       onmouseenter="this.style.background='var(--sp-green-hover)';this.style.transform='scale(1.04)'"
                       onmouseleave="this.style.background='var(--sp-green)';this.style.transform='scale(1)'">
                        Contact Us
                    </a>
                    <a href="/team"
                       style="background: var(--sp-surface-2); color: #fff; border: none; border-radius: 500px; padding: 0.625rem 1.5rem; font-size: 0.875rem; font-weight: 700; cursor: pointer; text-decoration: none; transition: background 0.15s, transform 0.15s;"
                       onmouseenter="this.style.background='var(--sp-surface-3)';this.style.transform='scale(1.04)'"
                       onmouseleave="this.style.background='var(--sp-surface-2)';this.style.transform='scale(1)'">
                        Our Team
                    </a>
                </div>

                {{-- Footer note --}}
                <p style="color: var(--sp-gray-2); font-size: 0.8125rem;">© 2025 dinle.tm · Music that feels.</p>

            </div>
        </div>
    </div>
@endsection