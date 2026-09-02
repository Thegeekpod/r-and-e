<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_posting_id',
        'applicant_name',
        'applicant_email',
        'applicant_phone',
        'experience_years',
        'current_company',
        'expected_salary',
        'cover_note',
        'resume_path',
        'status',
        'admin_notes',
    ];

    public function job()
    {
        return $this->belongsTo(JobPosting::class, 'job_posting_id');
    }
}
