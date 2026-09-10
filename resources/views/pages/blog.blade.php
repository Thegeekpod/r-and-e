@extends('layouts.app')

@section('title', isset($currentCategory) ? $currentCategory->name . ' Insights & Articles | Roy Infinity Edge' : 'Insights & Thought Leadership | Roy Infinity Edge Consulting')
@section('main-class', 'education blog-index-page')

@section('content')
{{-- 1. Hero Feature Header --}}
<section class="blog-hero-wrap">
    <div class="container">
        <div class="blog-hero-card" data-aos="zoom-in-up">
            <div class="blog-hero-content" data-aos="fade-right" data-aos-delay="200">
                <div class="blog-hero-badge">
                    <i class="fa-solid fa-sparkles"></i>
                    <span>Roy Infinity Editorial &amp; Insights</span>
                </div>
                <h1>
                    @if(isset($currentCategory))
                        Articles in <span>{{ $currentCategory->name }}</span>
                    @else
                        Knowledge, Strategic Insights &amp; <span>Innovation</span>
                    @endif
                </h1>
                <p>
                    @if(isset($currentCategory))
                        {{ $currentCategory->description ?: 'Discover expert analyses, actionable guides, and policy updates in ' . $currentCategory->name . '.' }}
                    @else
                        Explore high-impact analyses, taxation advisory updates, educational roadmap guides, and corporate healthcare placement strategies written by industry authorities.
                    @endif
                </p>
            </div>
            <img src="{{ asset('images/man-1-graphics.webp') }}" class="blog-hero-graphic" alt="Consulting Graphic">
        </div>
    </div>
</section>

{{-- 2. Search & Category Filters Bar --}}
<section class="blog-filter-section">
    <div class="container">
        {{-- Search Input Pill --}}
        <form action="{{ isset($currentCategory) ? route('blog.category', $currentCategory->slug) : route('blog.index') }}" method="GET" class="blog-search-bar" data-aos="fade-up">
            <div class="blog-search-field">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="keyword" placeholder="Search strategic articles, tax regulations, admissions, hiring..." value="{{ request('keyword') }}">
            </div>
            <button type="submit" class="blog-search-btn-round">Search</button>
        </form>

        @if(request('keyword'))
            <div style="margin: -10px 0 25px 10px; font-size: 14.5px; color: #475569; font-family: var(--font-plus-jakarta, sans-serif);">
                Showing search results for: <strong style="color: #03594A;">"{{ request('keyword') }}"</strong>
                — <a href="{{ isset($currentCategory) ? route('blog.category', $currentCategory->slug) : route('blog.index') }}" style="color: #e11d48; text-decoration: underline; font-weight: 700; margin-left: 6px;">Clear Search</a>
            </div>
        @endif

        {{-- Topic Chips --}}
        <div class="blog-category-tabs" data-aos="fade-up" data-aos-delay="100">
            <a href="{{ route('blog.index') }}" class="blog-tab-btn {{ !isset($currentCategory) && !request('category') ? 'active' : '' }}">
                <span>All Articles</span>
            </a>
            @foreach($categories as $cat)
                @php
                    $isActive = (isset($currentCategory) && $currentCategory->id === $cat->id) || request('category') === $cat->slug;
                @endphp
                <a href="{{ route('blog.category', $cat->slug) }}" class="blog-tab-btn {{ $isActive ? 'active' : '' }}">
                    <span>{{ $cat->name }}</span>
                    <span class="badge-num">{{ $cat->posts_count }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- 3. Featured Spotlight Article --}}
@if($featuredPost)
<section class="blog-spotlight-section">
    <div class="container">
        <div class="blog-spotlight-card" data-aos="zoom-in" data-aos-delay="150">
            <div>
                <div class="blog-spotlight-badge">
                    <i class="fa-solid fa-star"></i> Featured Editorial
                </div>

                <h2 class="blog-spotlight-title">
                    <a href="{{ route('blog.show', $featuredPost->slug) }}">
                        {{ $featuredPost->title }}
                    </a>
                </h2>

                <p class="blog-spotlight-desc">
                    {{ $featuredPost->excerpt ?: Str::limit(strip_tags($featuredPost->content), 150) }}
                </p>

                <div class="blog-spotlight-footer">
                    <div class="blog-spotlight-author">
                        <div class="blog-spotlight-avatar">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div>
                            <div class="blog-spotlight-meta-name">{{ $featuredPost->author_name }}</div>
                            <div class="blog-spotlight-meta-date">
                                {{ $featuredPost->published_at ? $featuredPost->published_at->format('M d, Y') : $featuredPost->created_at->format('M d, Y') }} • {{ $featuredPost->reading_time ?: '5 min read' }}
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('blog.show', $featuredPost->slug) }}" class="blog-spotlight-btn">
                        Read Full Publication <img src="{{ asset('images/right-uparrow.svg') }}" alt="Arrow" style="width: 14px; height: 14px;">
                    </a>
                </div>
            </div>

            <div class="blog-spotlight-img-box">
                <a href="{{ route('blog.show', $featuredPost->slug) }}">
                    <img src="{{ $featuredPost->featured_image_url }}" alt="{{ $featuredPost->title }}">
                </a>
            </div>
        </div>
    </div>
</section>
@endif

{{-- 4. Latest Articles Grid --}}
<section class="blog-grid-section">
    <div class="container">
        <div class="blog-section-title-wrap" data-aos="fade-up">
            <h2>Latest Publications</h2>
            <p>Curated thought leadership and strategic advisory resources ({{ $posts->total() }} total)</p>
        </div>

        <div class="blog-articles-grid">
            @forelse($posts as $post)
                <article class="roy-blog-card" data-aos="fade-up" data-aos-delay="{{ ($loop->iteration % 3) * 100 }}">
                    <div class="roy-blog-card-media">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}">
                        </a>
                        @if($post->category)
                            <a href="{{ route('blog.category', $post->category->slug) }}" class="roy-blog-card-pill">
                                {{ $post->category->name }}
                            </a>
                        @endif
                    </div>

                    <div class="roy-blog-card-body">
                        <div class="roy-blog-card-meta">
                            <span><i class="fa-regular fa-calendar"></i> {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                            <span>•</span>
                            <span><i class="fa-regular fa-clock"></i> {{ $post->reading_time ?: '4 min read' }}</span>
                        </div>

                        <h3 class="roy-blog-card-title">
                            <a href="{{ route('blog.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h3>

                        <p class="roy-blog-card-excerpt">
                            {{ $post->excerpt ?: Str::limit(strip_tags($post->content), 115) }}
                        </p>

                        <div class="roy-blog-card-bottom">
                            <div class="roy-blog-card-author">
                                <i class="fa-solid fa-pen-nib" style="color: #03594A;"></i>
                                <span>{{ $post->author_name }}</span>
                            </div>
                            <a href="{{ route('blog.show', $post->slug) }}" class="roy-blog-card-btn">
                                <span>Read</span>
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="Arrow" style="width: 12px; height: 12px;">
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div style="grid-column: 1 / -1; background: #ffffff; border-radius: 32px; border: 1.5px solid #e2e8f0; padding: 60px 40px; text-align: center;" data-aos="fade-up">
                    <div style="width: 70px; height: 70px; margin: 0 auto 20px auto; border-radius: 50%; background: #e5faf5; color: #03594A; display: flex; align-items: center; justify-content: center; font-size: 28px;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <h3 style="font-size: 24px; font-weight: 800; color: #111; font-family: var(--font-soliden); margin-bottom: 10px;">No Publications Found</h3>
                    <p style="color: #64748b; font-size: 16px; max-width: 450px; margin: 0 auto 24px auto;">We couldn't find any articles matching your search criteria. Try using different keywords or browse all categories.</p>
                    <a href="{{ route('blog.index') }}" class="btn-learn-more" style="display: inline-block;">
                        View All Articles
                    </a>
                </div>
            @endforelse
        </div>

        {{-- Custom Pagination --}}
        @if($posts->hasPages())
            <div style="margin-top: 50px; display: flex; justify-content: center;">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</section>
@endsection

