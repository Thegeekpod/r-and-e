<header class="main-header">
    <div class="container header-container">
        <div class="logo-wrapper">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('site_logo', 'images/logo.webp') }}" alt="Roy Infinity Edge" class="brand-logo" />
                </a>
            </div>
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('finance') }}" class="{{ request()->routeIs('finance') ? 'active' : '' }}">Finance</a></li>
                <li><a href="{{ route('education') }}" class="{{ request()->routeIs('education') ? 'active' : '' }}">Education</a></li>
                <li><a href="{{ route('placement') }}" class="{{ request()->routeIs('placement') ? 'active' : '' }}">Placement</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
                <li><a href="{{ route('contact') }}" class="btn-contact {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nav = document.querySelector('.main-nav');
        if (nav) {
            nav.addEventListener('click', function(e) {
                if (e.target === nav) {
                    nav.classList.toggle('active');
                }
            });

            document.addEventListener('click', function(e) {
                if (!nav.contains(e.target)) {
                    nav.classList.remove('active');
                }
            });
        }
    });
</script>
