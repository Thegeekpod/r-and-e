<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $table = 'blog_posts';

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'author_name',
        'reading_time',
        'tags',
        'status',
        'is_featured',
        'views_count',
        'published_at',
    ];

    protected $casts = [
        'is_featured'  => 'boolean',
        'views_count'  => 'integer',
        'published_at' => 'datetime',
    ];

    /**
     * Boot model events for automatic slug and reading time generation.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($post) {
            if (empty($post->slug)) {
                $baseSlug = Str::slug($post->title);
                $slug = $baseSlug;
                $count = 1;
                while (static::where('slug', $slug)->where('id', '!=', $post->id ?? 0)->exists()) {
                    $slug = $baseSlug . '-' . $count;
                    $count++;
                }
                $post->slug = $slug;
            }

            if (empty($post->reading_time) && !empty($post->content)) {
                $wordCount = str_word_count(strip_tags($post->content));
                $minutes = max(1, (int) ceil($wordCount / 200));
                $post->reading_time = $minutes . ' min read';
            }

            if ($post->status === 'published' && empty($post->published_at)) {
                $post->published_at = now();
            }
        });
    }

    /**
     * Relationship: Category of the post.
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    /**
     * Scope: Published posts only.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope: Featured posts.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Accessor: Featured Image URL helper.
     */
    public function getFeaturedImageUrlAttribute(): string
    {
        if (!empty($this->featured_image)) {
            if (Str::startsWith($this->featured_image, ['http://', 'https://'])) {
                return $this->featured_image;
            }
            if (file_exists(public_path($this->featured_image))) {
                return asset($this->featured_image);
            }
            if (file_exists(public_path('uploads/blog/' . $this->featured_image))) {
                return asset('uploads/blog/' . $this->featured_image);
            }
        }
        return asset('images/blog-default.jpg');
    }

    /**
     * Accessor: Tags array.
     */
    public function getTagsArrayAttribute(): array
    {
        if (empty($this->tags)) {
            return [];
        }
        return array_values(array_filter(array_map('trim', explode(',', $this->tags))));
    }
}
