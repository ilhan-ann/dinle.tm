@extends('layouts.app')

@section('content')
<div class="container-lg">
    <div class="row">
        <!-- Back Button (desktop only) -->
        <div class="col-1 d-none d-md-block">
            <a href="/" class="btn glass btn-glass text-black rounded-circle">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>

        <!-- Contact Section -->
        <section class="contact-section glass-nav p-4 p-md-5 my-4 my-md-5 rounded-5 position-relative overflow-hidden w-100">
            <div class="text-center">
                <h2 class="display-5 fw-bold mb-3 text-black">Contact Us</h2>
                <p class="lead text-black mb-4" style="opacity: 0.9;">
                    Have a question or feedback? Reach out to us — music sounds better together.
                </p>
            </div>

            <form action="#" method="POST" class="contact-form mx-auto text-start mt-4" style="max-width: 600px;">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label text-black">Your Name</label>
                    <input type="text" id="name" name="name" class="form-control glass" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-black">Email</label>
                    <input type="email" id="email" name="email" class="form-control glass" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label text-black">Message</label>
                    <textarea id="message" name="message" rows="4" class="form-control glass" required></textarea>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn glass btn-glass text-black px-4 px-md-5 py-2 rounded-4">
                        <i class="bi bi-send-fill me-2"></i> Send Message
                    </button>
                </div>
            </form>

            <!-- Waves Background -->
            <div class="waves-bg" aria-hidden="true">
                <svg class="wave wave-1" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M0,40 C150,90 350,0 600,30 C850,60 1050,10 1200,40 L1200,120 L0,120 Z"></path>
                </svg>
                <svg class="wave wave-2" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M0,60 C200,10 400,100 600,60 C800,20 1000,100 1200,60 L1200,120 L0,120 Z"></path>
                </svg>
            </div>
        </section>
    </div>
</div>
@endsection
