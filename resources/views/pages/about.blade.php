@extends('layouts.app')

@section('title', 'About Us | Roy Infinity Edge Consulting')

@section('content')
<section class="hero-section" style="padding: 100px 0 60px;">
    <div class="container text-center">
        <h1 class="hero-title" data-aos="fade-up">
            <span class="text-black">About</span><br />
            <span class="text-green">Roy Infinity Edge</span>
        </h1>
        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
            {{ \App\Models\SiteSetting::get('about_subtitle', 'Your Trusted Partner in Finance, Education, and Recruitment Solutions.') }}
        </p>
    </div>
</section>

<section class="about-services-section pb-100">
    <div class="container">
        <div class="p-5 rounded-5" style="background: #0C2924; color: #fff;" data-aos="fade-up">
            <h2 class="text-white mb-4" style="font-family: var(--font-soliden);">Who We Are</h2>
            <p style="font-size: 19px; line-height: 1.8; color: rgba(255, 255, 255, 0.9);">
                {{ \App\Models\SiteSetting::get('footer_about', 'Roy Infinity Edge Consulting offers a comprehensive suite of consulting services across Finance, Education, and Healthcare Recruitment. Our mission is to guide individuals and enterprises toward sustainable growth with transparent and expert guidance.') }}
            </p>
        </div>
    </div>
</section>
@endsection
