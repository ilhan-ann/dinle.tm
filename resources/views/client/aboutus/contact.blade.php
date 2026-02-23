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
                    <p class="text-uppercase mb-1" style="color: var(--sp-gray-1); font-size: 0.75rem; font-weight: 600; letter-spacing: 0.1em;">Get in touch</p>
                    <h1 class="fw-black mb-0" style="font-size: clamp(2rem, 6vw, 4rem); letter-spacing: -0.02em;">Contact Us</h1>
                    <p class="mt-2 mb-0" style="color: var(--sp-gray-1); font-size: 0.875rem;">Have a question or feedback? Reach out — music sounds better together.</p>
                </div>

                {{-- Form --}}
                <form action="#" method="POST" style="max-width: 560px;">
                    @csrf

                    <div class="mb-4">
                        <label for="name" style="display: block; font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: var(--sp-gray-1); margin-bottom: 0.5rem;">Your Name</label>
                        <input type="text" id="name" name="name" required
                               placeholder="John Doe"
                               style="width: 100%; background: var(--sp-surface-2); border: none; border-radius: 8px; padding: 0.75rem 1rem; color: #fff; font-size: 0.9375rem; outline: none; transition: background 0.15s;"
                               onfocus="this.style.background='var(--sp-surface-3)';this.style.outline='2px solid var(--sp-green)';this.style.outlineOffset='-2px'"
                               onblur="this.style.background='var(--sp-surface-2)';this.style.outline='none'">
                    </div>

                    <div class="mb-4">
                        <label for="email" style="display: block; font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: var(--sp-gray-1); margin-bottom: 0.5rem;">Email</label>
                        <input type="email" id="email" name="email" required
                               placeholder="you@example.com"
                               style="width: 100%; background: var(--sp-surface-2); border: none; border-radius: 8px; padding: 0.75rem 1rem; color: #fff; font-size: 0.9375rem; outline: none; transition: background 0.15s;"
                               onfocus="this.style.background='var(--sp-surface-3)';this.style.outline='2px solid var(--sp-green)';this.style.outlineOffset='-2px'"
                               onblur="this.style.background='var(--sp-surface-2)';this.style.outline='none'">
                    </div>

                    <div class="mb-5">
                        <label for="message" style="display: block; font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: var(--sp-gray-1); margin-bottom: 0.5rem;">Message</label>
                        <textarea id="message" name="message" rows="5" required
                                  placeholder="Your message..."
                                  style="width: 100%; background: var(--sp-surface-2); border: none; border-radius: 8px; padding: 0.75rem 1rem; color: #fff; font-size: 0.9375rem; outline: none; resize: vertical; transition: background 0.15s; font-family: var(--font);"
                                  onfocus="this.style.background='var(--sp-surface-3)';this.style.outline='2px solid var(--sp-green)';this.style.outlineOffset='-2px'"
                                  onblur="this.style.background='var(--sp-surface-2)';this.style.outline='none'"></textarea>
                    </div>

                    <button type="submit"
                            style="background: var(--sp-green); color: #000; border: none; border-radius: 500px; padding: 0.75rem 2rem; font-size: 0.875rem; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 0.5rem; transition: background 0.15s, transform 0.15s;"
                            onmouseenter="this.style.background='var(--sp-green-hover)';this.style.transform='scale(1.04)'"
                            onmouseleave="this.style.background='var(--sp-green)';this.style.transform='scale(1)'">
                        <i class="bi bi-send-fill"></i>
                        Send Message
                    </button>

                </form>

            </div>
        </div>
    </div>
@endsection