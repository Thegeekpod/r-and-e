@extends('layouts.app')

@section('title', 'Job Placement Services | Roy Infinity Edge Consulting')

@section('content')
<section class="hero-section" style="padding: 100px 0 60px;">
    <div class="container text-center">
        <h1 class="hero-title" data-aos="fade-up">
            <span class="text-black">Job Placement</span><br />
            <span class="text-green">Services</span>
        </h1>
        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
            Strategic career placements for healthcare & corporate professionals.
        </p>
    </div>
</section>

<section class="taxation-feature-section pt-50 pb-100">
    <div class="container">
        <div class="taxation-card" data-aos="zoom-in-up">
            <div class="taxation-card-content">
                <h2>Connecting talent with the right opportunities.</h2>
                <p>Doctor Recruitment, Hospital Staffing, Healthcare Jobs, and Corporate Placement Support.</p>
                <a href="#contact" class="btn-learn-more">Get In Touch</a>
            </div>
            <div class="taxation-card-image">
                <img src="{{ asset('images/man2-graphics.webp') }}" class="animate" alt="" />
                <img src="{{ asset('images/man-2.webp') }}" alt="Placement" />
            </div>
        </div>
    </div>
</section>
@endsection
