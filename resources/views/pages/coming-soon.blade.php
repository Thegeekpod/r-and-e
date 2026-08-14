@extends('layouts.app')

@section('title', ($pageTitle ?? 'Coming Soon') . ' - Roy Infinity Edge')

@section('content')
<section class="coming-soon-section" style="min-height: 70vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #0C2924 0%, #03594A 100%); color: #fff; padding: 100px 20px; text-align: center;">
    <div class="container">
        <div style="max-width: 720px; margin: 0 auto; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.15); border-radius: 32px; padding: 60px 40px; backdrop-filter: blur(12px);" data-aos="zoom-in">
            
            <div style="width: 80px; height: 80px; background: rgba(185, 255, 102, 0.15); border: 2px solid #B9FF66; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; color: #B9FF66; font-size: 32px;">
                <i class="fa-solid fa-hourglass-half"></i>
            </div>

            <span style="background: #B9FF66; color: #0C2924; font-weight: 700; font-size: 14px; text-transform: uppercase; letter-spacing: 1.5px; padding: 6px 18px; border-radius: 30px; display: inline-block; margin-bottom: 20px;">
                Under Development
            </span>

            <h1 style="font-family: var(--font-soliden); font-size: 46px; font-weight: 700; margin-bottom: 16px; color: #ffffff;">
                {{ $pageTitle ?? 'Page' }} is <span style="color: #B9FF66;">Coming Soon</span>
            </h1>

            <p style="font-size: 19px; line-height: 1.6; color: rgba(255, 255, 255, 0.85); margin-bottom: 35px;">
                {{ $message ?? 'We are currently crafting something extraordinary for this page. Please check back shortly or explore our active services!' }}
            </p>

            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('home') }}" class="btn" style="background-color: #B9FF66; color: #0C2924; font-weight: 700; padding: 14px 36px; border-radius: 16px; text-decoration: none; font-size: 17px; transition: transform 0.2s;">
                    <i class="fa-solid fa-house me-2"></i> Return Home
                </a>
                <a href="{{ route('home') }}#services" class="btn" style="background: rgba(255, 255, 255, 0.12); border: 1.5px solid rgba(255, 255, 255, 0.4); color: #ffffff; font-weight: 600; padding: 14px 32px; border-radius: 16px; text-decoration: none; font-size: 17px;">
                    Explore Active Services
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
