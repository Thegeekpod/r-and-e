<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    {{-- Dynamic SEO Title --}}
    <title>{{ !empty($seoData?->meta_title) ? $seoData->meta_title : ($__env->yieldContent('title') ?: ($settings['site_title'] ?? 'Roy Infinity Edge Consulting | Finance, Education, Placement')) }}</title>
    
    {{-- Dynamic SEO Meta Description --}}
    @if(!empty($seoData?->meta_description))
        <meta name="description" content="{{ $seoData->meta_description }}" />
    @elseif(!empty($settings['site_description']))
        <meta name="description" content="{{ $settings['site_description'] }}" />
    @endif

    {{-- Canonical & OpenGraph Metadata --}}
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta property="og:title" content="{{ !empty($seoData?->meta_title) ? $seoData->meta_title : ($__env->yieldContent('title') ?: ($settings['site_title'] ?? 'Roy Infinity Edge Consulting')) }}" />
    @if(!empty($seoData?->meta_description))
        <meta property="og:description" content="{{ $seoData->meta_description }}" />
    @endif
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    {{-- Injected Custom Head Scripts / Tags --}}
    @if(!empty($seoData?->other_scripts))
        {!! $seoData->other_scripts !!}
    @endif

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v={{ time() }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}?v={{ time() }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}?v={{ time() }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}?v={{ time() }}" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}?v={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}?v={{ time() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @stack('styles')
</head>

<body>
    @include('partials.header')

    <main class="@yield('main-class')">
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- AOS Library -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100,
        });
    </script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
