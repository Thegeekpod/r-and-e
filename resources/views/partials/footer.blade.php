<footer class="main-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col brand-col">
                <h3 class="footer-logo">Roy Infinity Edge Consulting</h3>
                <p>
                    {{ \App\Models\SiteSetting::get('footer_about', 'We offers a comprehensive suite of digital marketing services that cover all aspects of our online presence. From SEO and social media marketing to content creations and PPC advertising, they have the expertise and resources to handle our diverse marketing needs.') }}
                </p>
                <div class="social-links">
                    <a href="{{ \App\Models\SiteSetting::get('social_facebook', '#') }}" class="social-icon" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="{{ \App\Models\SiteSetting::get('social_twitter', '#') }}" class="social-icon" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    <a href="{{ \App\Models\SiteSetting::get('social_linkedin', '#') }}" class="social-icon" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="{{ \App\Models\SiteSetting::get('social_instagram', '#') }}" class="social-icon" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>

            <div class="footer-col">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('finance') }}">Finance</a></li>
                    <li><a href="{{ route('education') }}">Education</a></li>
                    <li><a href="{{ route('placement') }}">Placement</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Licence</h4>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Copyright</a></li>
                    <li><a href="#">Email Address</a></li>
                </ul>
            </div>

            <div class="footer-col contact-col">
                <h4>Contact</h4>
                <div class="contact-item">
                    <span class="icon"><i class="fa-solid fa-phone"></i></span>
                    <span>{{ \App\Models\SiteSetting::get('contact_phone', '(406) 555-0120') }}</span>
                </div>
                <div class="contact-item">
                    <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                    <span>{{ \App\Models\SiteSetting::get('contact_email', 'hey@forestin.com') }}</span>
                </div>
                <div class="contact-item">
                    <span class="icon"><i class="fa-solid fa-location-dot"></i></span>
                    <span>{{ \App\Models\SiteSetting::get('contact_address', '2972 Westheimer Rd. Santa Ana, Illinois 85486') }}</span>
                </div>
            </div>
        </div>
    </div>
</footer>
