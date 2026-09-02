<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'type',
        'company_name',
        'location',
        'salary_range',
        'experience_required',
        'description',
        'requirements',
        'benefits',
        'deadline',
        'status',
        'is_featured',
        'views_count',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'deadline'    => 'date',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($job) {
            if (empty($job->slug)) {
                $job->slug = Str::slug($job->title) . '-' . Str::random(5);
            }
        });
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class, 'job_posting_id');
    }
}
