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
                                <span style="font-size: 14px; font-weight: 700; color: #64748b; margin-right: 4px;"><i class="fa-solid fa-tags"></i> Tags:</span>
                                @foreach($post->tags_array as $tag)
                                    <span class="roy-tag-chip">#{{ $tag }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="roy-share-wrap">
                        <span style="font-size: 14px; font-weight: 700; color: #64748b; margin-right: 6px;">Share:</span>
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
                        <span style="display: inline-block; background: #EAFFFB; color: #03594A; font-size: 12px; font-weight: 700; padding: 3px 12px; border-radius: 50px; margin-bottom: 6px;">Editorial Authority</span>
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
                    <h3 class="roy-sidebar-title"><i class="fa-solid fa-headset" style="color: #B9FF66;"></i> Need Direct Advice?</h3>
                    <p style="font-size: 14.5px; color: rgba(255, 255, 255, 0.85); line-height: 1.6; margin-bottom: 20px;">
                        Connect directly with our senior consulting desk for confidential, one-on-one professional guidance.
                    </p>
                    <a href="{{ route('contact') }}" class="roy-blog-bottom-cta-btn" style="width: 100%; justify-content: center; padding: 12px 20px; font-size: 14.5px; box-shadow: none;">
                        <span>Contact Our Desk</span>
                        <img src="{{ asset('images/right-uparrow.svg') }}" alt="Arrow" style="width: 12px; height: 12px;">
                    </a>
                </div>

                {{-- Topics List Widget --}}
                <div class="roy-sidebar-card">
                    <h3 class="roy-sidebar-title"><i class="fa-solid fa-folder-open" style="color: #03594A;"></i> Topic Categories</h3>
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
                    <h3 class="roy-sidebar-title"><i class="fa-solid fa-magnifying-glass" style="color: #03594A;"></i> Search Articles</h3>
                    <form action="{{ route('blog.index') }}" method="GET" style="display: flex; gap: 8px;">
                        <input type="text" name="keyword" placeholder="Search keywords..." style="flex: 1; border: 1.5px solid #cbd5e1; border-radius: 50px; padding: 10px 18px; font-size: 14px; outline: none; font-family: var(--font-plus-jakarta, sans-serif);">
                        <button type="submit" style="background: #03594A; color: #fff; border: none; border-radius: 50px; padding: 10px 18px; font-weight: 700; font-size: 13.5px; cursor: pointer;">Go</button>
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
        <div class="blog-section-title-wrap" style="display: flex; align-items: flex-end; justify-content: space-between; flex-wrap: wrap; gap: 16px;" data-aos="fade-up">
            <div>
                <h2>Related Publications</h2>
                <p>Continue exploring curated insights and strategic guidance</p>
            </div>
            <a href="{{ route('blog.index') }}" class="blog-tab-btn">
                <span>View All Articles</span>
                <img src="{{ asset('images/right-uparrow.svg') }}" alt="Arrow" style="width: 12px; height: 12px;">
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
                                <span style="font-size: 13px; color: #64748b;">By {{ $related->author_name }}</span>
                            </div>
                            <a href="{{ route('blog.show', $related->slug) }}" class="roy-blog-card-btn">
                                <span>Read</span>
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="Arrow" style="width: 12px; height: 12px;">
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

