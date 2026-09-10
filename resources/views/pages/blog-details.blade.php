@extends('layouts.app')

@section('title', $post->title . ' | Roy Infinity Edge Blog')
@section('main-class', 'education blog-detail-page')

@section('content')
{{-- 1. Hero & Article Header Section --}}
<section class="roy-article-hero">
    <div class="container">
        {{-- Article Header --}}
        <div class="roy-article-header" data-aos="fade-up">
            <div class="roy-article-top-nav">
                <a href="{{ route('blog.index') }}" class="roy-article-back-btn">
                    <i class="fa-solid fa-arrow-left"></i> <span>All Articles</span>
                </a>
                @if($post->category)
                    <a href="{{ route('blog.category', $post->category->slug) }}" class="roy-article-cat-badge">
                        {{ $post->category->name }}
                    </a>
                @endif
            </div>

            <h1 class="roy-article-title">
                {{ $post->title }}
            </h1>

            @if($post->excerpt)
                <p class="roy-article-lead">
                    {{ $post->excerpt }}
                </p>
            @endif

            <div class="roy-article-meta-pill-bar">
                <div class="roy-meta-item roy-meta-author">
                    <div class="roy-meta-avatar">
                        <i class="fa-solid fa-user-pen"></i>
                    </div>
                    <strong>{{ $post->author_name }}</strong>
                </div>
                <div class="roy-meta-divider"></div>
                <div class="roy-meta-item">
                    <i class="fa-regular fa-calendar"></i>
                    <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                </div>
                <div class="roy-meta-divider"></div>
                <div class="roy-meta-item">
                    <i class="fa-regular fa-clock"></i>
                    <span>{{ $post->reading_time ?: '5 min read' }}</span>
                </div>
                <div class="roy-meta-divider"></div>
                <div class="roy-meta-item">
                    <i class="fa-regular fa-eye"></i>
                    <span>{{ number_format($post->views_count) }} views</span>
                </div>
            </div>
        </div>

        {{-- Featured Image Banner --}}
        <div data-aos="fade-up" data-aos-delay="100">
            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="roy-article-banner">
        </div>

        {{-- Article Body + Sidebar Layout --}}
        <div class="roy-article-layout">
            {{-- Main Text Area --}}
            <div class="roy-article-main">
                <article class="roy-article-body">
                    {!! $post->content !!}
                </article>

                {{-- Tags and Share Area --}}
                <div class="roy-article-tags-share">
                    <div>
                        @if(!empty($post->tags_array))
                            <div class="roy-tags-wrap">
                                <span class="roy-tags-label"><i class="fa-solid fa-tags"></i> Tags:</span>
                                @foreach($post->tags_array as $tag)
                                    <span class="roy-tag-chip">#{{ $tag }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="roy-share-wrap">
                        <span class="roy-share-label">Share:</span>
                        @php
                            $shareUrl = urlencode(url()->current());
                            $shareTitle = urlencode($post->title);
                        @endphp
                        <a href="https://api.whatsapp.com/send?text={{ $shareTitle }}%20{{ $shareUrl }}" target="_blank" class="roy-share-icon-btn roy-share-whatsapp" title="Share on WhatsApp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}" target="_blank" class="roy-share-icon-btn roy-share-linkedin" title="Share on LinkedIn">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ $shareTitle }}&url={{ $shareUrl }}" target="_blank" class="roy-share-icon-btn roy-share-twitter" title="Share on X">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                        <button type="button" class="roy-share-icon-btn roy-share-copy" title="Copy Link" onclick="navigator.clipboard.writeText(window.location.href); alert('Article URL copied to clipboard!');">
                            <i class="fa-solid fa-link"></i>
                        </button>
                    </div>
                </div>

                {{-- Author Bio Card --}}
                <div class="roy-author-profile-box">
                    <div class="roy-author-avatar-big">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <div class="roy-author-details">
                        <span class="roy-author-badge">Editorial Authority</span>
                        <h4>{{ $post->author_name }}</h4>
                        <p>
                            Senior Strategic Advisory Specialist at Roy Infinity Edge Consulting, delivering expert solutions across financial compliance, higher education career guidance, and corporate healthcare placement.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Sidebar Area --}}
            <aside class="roy-blog-sidebar">
                {{-- Quick Advisory Widget --}}
                <div class="roy-sidebar-card roy-sidebar-cta">
                    <h3 class="roy-sidebar-title"><i class="fa-solid fa-headset roy-sidebar-cta-icon"></i> Need Direct Advice?</h3>
                    <p class="roy-sidebar-cta-desc">
                        Connect directly with our senior consulting desk for confidential, one-on-one professional guidance.
                    </p>
                    <a href="{{ route('contact') }}" class="roy-sidebar-cta-btn">
                        <span>Contact Our Desk</span>
                        <img src="{{ asset('images/right-uparrow.svg') }}" alt="Arrow" class="roy-sidebar-cta-arrow">
                    </a>
                </div>

                {{-- Topics List Widget --}}
                <div class="roy-sidebar-card">
                    <h3 class="roy-sidebar-title"><i class="fa-solid fa-folder-open roy-sidebar-cat-icon"></i> Topic Categories</h3>
                    <ul class="roy-sidebar-cat-list">
                        @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('blog.category', $cat->slug) }}">
                                    <span>{{ $cat->name }}</span>
                                    <span class="cat-badge">{{ $cat->posts_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Search Widget --}}
                <div class="roy-sidebar-card">
                    <h3 class="roy-sidebar-title"><i class="fa-solid fa-magnifying-glass roy-sidebar-search-icon"></i> Search Articles</h3>
                    <form action="{{ route('blog.index') }}" method="GET" class="roy-sidebar-search-form">
                        <input type="text" name="keyword" placeholder="Search keywords..." class="roy-sidebar-search-input">
                        <button type="submit" class="roy-sidebar-search-btn">Go</button>
                    </form>
                </div>
            </aside>
        </div>
    </div>
</section>

{{-- 2. Related Articles Section --}}
@if($relatedPosts->count() > 0)
<section class="roy-related-section">
    <div class="container">
        <div class="blog-section-title-wrap roy-related-title-wrap" data-aos="fade-up">
            <div>
                <h2>Related Publications</h2>
                <p>Continue exploring curated insights and strategic guidance</p>
            </div>
            <a href="{{ route('blog.index') }}" class="blog-tab-btn">
                <span>View All Articles</span>
                <img src="{{ asset('images/right-uparrow.svg') }}" alt="Arrow" class="roy-btn-arrow-sm">
            </a>
        </div>

        <div class="blog-articles-grid">
            @foreach($relatedPosts as $related)
                <article class="roy-blog-card" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 80 }}">
                    <div class="roy-blog-card-media">
                        <a href="{{ route('blog.show', $related->slug) }}">
                            <img src="{{ $related->featured_image_url }}" alt="{{ $related->title }}">
                        </a>
                        @if($related->category)
                            <a href="{{ route('blog.category', $related->category->slug) }}" class="roy-blog-card-pill">
                                {{ $related->category->name }}
                            </a>
                        @endif
                    </div>

                    <div class="roy-blog-card-body">
                        <div class="roy-blog-card-meta">
                            <span><i class="fa-regular fa-calendar"></i> {{ $related->published_at ? $related->published_at->format('M d, Y') : $related->created_at->format('M d, Y') }}</span>
                            <span>•</span>
                            <span><i class="fa-regular fa-clock"></i> {{ $related->reading_time ?: '4 min read' }}</span>
                        </div>

                        <h3 class="roy-blog-card-title">
                            <a href="{{ route('blog.show', $related->slug) }}">
                                {{ $related->title }}
                            </a>
                        </h3>

                        <p class="roy-blog-card-excerpt">
                            {{ $related->excerpt ?: Str::limit(strip_tags($related->content), 95) }}
                        </p>

                        <div class="roy-blog-card-bottom">
                            <div class="roy-blog-card-author">
                                <span class="roy-blog-card-author-name">By {{ $related->author_name }}</span>
                            </div>
                            <a href="{{ route('blog.show', $related->slug) }}" class="roy-blog-card-btn">
                                <span>Read</span>
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="Arrow" class="roy-btn-arrow-sm">
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection


