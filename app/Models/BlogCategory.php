<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'order',
    ];

    /**
     * Boot model events for automatic slug generation.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    /**
     * Relationship: Posts in this category.
     */
    public function posts()
    {
        return $this->hasMany(BlogPost::class, 'category_id');
    }

    /**
     * Relationship: Published posts only.
     */
    public function publishedPosts()
    {
        return $this->hasMany(BlogPost::class, 'category_id')->where('status', 'published');
    }

    /**
     * Scope: Active categories.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
