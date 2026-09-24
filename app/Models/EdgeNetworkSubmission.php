<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EdgeNetworkSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'city',
        'qualification',
        'experience_years',
        'skills',
        'availability',
        'expected_fees',
        'bio',
        'resume_path',
        'company_name',
        'business_nature',
        'service_needed',
        'engagement_type',
        'expected_budget',
        'requirement_details',
        'attachment_path',
        'status',
        'admin_notes',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    public function getTypeLabelAttribute(): string
    {
        return $this->type === 'professional' ? 'Accounting Professional' : 'Business Requirement';
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'pending'     => 'bg-warning text-dark',
            'contacted'   => 'bg-info text-white',
            'shortlisted' => 'bg-primary text-white',
            'in_progress' => 'bg-purple text-white',
            'completed'   => 'bg-success text-white',
            'rejected'    => 'bg-danger text-white',
            default       => 'bg-secondary text-white',
        };
    }
}
