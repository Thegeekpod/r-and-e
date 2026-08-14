<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientPartner extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order'     => 'integer',
    ];

    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            if (str_starts_with($this->logo, 'http://') || str_starts_with($this->logo, 'https://')) {
                return $this->logo;
            }
            return asset($this->logo);
        }
        return null;
    }
}
