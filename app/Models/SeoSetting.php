<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    use HasFactory;

    protected $table = 'seo_settings';

    protected $fillable = [
        'page_url',
        'meta_title',
        'meta_description',
        'other_scripts',
    ];

    /**
     * Mutator to ensure page_url always starts with a single '/' and is trimmed.
     */
    public function setPageUrlAttribute($value)
    {
        $cleaned = trim($value);
        if ($cleaned === '' || $cleaned === '/') {
            $this->attributes['page_url'] = '/';
        } else {
            $this->attributes['page_url'] = '/' . ltrim($cleaned, '/');
        }
    }

    /**
     * Helper to get SEO configuration for a specific path.
     */
    public static function getForUrl(?string $url = null)
    {
        if (is_null($url)) {
            $url = request()->path();
        }

        $normalized = ($url === '' || $url === '/') ? '/' : '/' . ltrim(trim($url), '/');

        return static::where('page_url', $normalized)->first();
    }
}
