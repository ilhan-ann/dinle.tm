@extends('client.layouts.app')

@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-3 d-none d-md-block">
                @include('client.partials.side')
            </div>
            <div class="col-12 col-md-9">

                <button onclick="history.back()" class="btn p-0 mb-3 mt-2 d-flex align-items-center gap-2"
                    style="color: var(--sp-gray-1); font-size: 0.875rem; background: transparent; border: none; cursor: pointer; transition: color 0.15s;"
                    onmouseenter="this.style.color='#fff'" onmouseleave="this.style.color='var(--sp-gray-1)'">
                    <i class="bi bi-arrow-left" style="font-size: 1rem;"></i>
                    Back
                </button>
                <div class="mb-5 mt-2">
                    <p class="text-uppercase mb-1" style="color: var(--sp-gray-1); font-size: 0.75rem; font-weight: 600; letter-spacing: 0.1em;">People</p>
                    <h1 class="fw-black mb-0" style="font-size: clamp(2rem, 6vw, 4rem); letter-spacing: -0.02em;">Our Team</h1>
                    <p class="mt-2 mb-0" style="color: var(--sp-gray-1); font-size: 0.875rem;">The people behind Dinle.tm</p>
                </div>

                <div class="d-flex flex-wrap gap-4">

                    <div style="width: 180px;">
                        <div style="width: 180px; height: 180px; border-radius: 12px; overflow: hidden; background: var(--sp-surface-2);">
                            <img src="{{ asset('img/ceo.jpg') }}" alt="Ilhan"
                                 style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="mt-3">
                            <div class="fw-bold" style="font-size: 1rem; color: #fff;">Ilhan</div>
                            <div style="font-size: 0.8125rem; color: var(--sp-green); margin-top: 2px;">CEO</div>
                        </div>
                    </div>

                    @php
                    $fakeTeam = [
                        ["name" => "Hallmyrat",  "role" => "Bruh"],
                        ["name" => "Aysha",   "role" => "Head of Design"],
                        ["name" => "Serdar",  "role" => "Lead Developer"],
                        ["name" => "Gulshat", "role" => "Marketing Manager"],
                        ["name" => "Oraz",    "role" => "Audio Engineer"],
                        ["name" => "Maral",   "role" => "Content Manager"],
                    ];
                    @endphp

                    @foreach($fakeTeam as $member)
                    <div style="width: 180px;">
                        <div style="width: 180px; height: 180px; border-radius: 12px; overflow: hidden; background: var(--sp-surface-2); display: flex; align-items: center; justify-content: center;">
                            <svg viewBox="0 0 24 24" fill="currentColor" style="width: 64px; height: 64px; color: var(--sp-gray-2);">
                                <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                            </svg>
                        </div>
                        <div class="mt-3">
                            <div class="fw-bold" style="font-size: 1rem; color: #fff;">{{ $member["name"] }}</div>
                            <div style="font-size: 0.8125rem; color: var(--sp-green); margin-top: 2px;">{{ $member["role"] }}</div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>

    <style>
        .team-card img { transition: transform 0.3s ease; }
        .team-card:hover img { transform: scale(1.04); }
    </style>
@endsection