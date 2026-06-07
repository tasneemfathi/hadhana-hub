<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nursery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en', 'name_ar',
        'city', 'district',
        'description_en', 'description_ar',
        'age_min', 'age_max',
        'capacity', 'rating',
        'phone', 'email',
        'image_url', 'is_verified',
        'has_meals', 'has_transport', 'is_bilingual',
    ];

    protected $casts = [
        'is_verified'  => 'boolean',
        'has_meals'    => 'boolean',
        'has_transport'=> 'boolean',
        'is_bilingual' => 'boolean',
        'rating'       => 'float',
    ];

    /**
     * Localized name based on the active locale.
     */
    public function getNameAttribute(): string
    {
        return app()->getLocale() === 'ar'
            ? ($this->name_ar ?: $this->name_en)
            : ($this->name_en ?: $this->name_ar);
    }

    /**
     * Localized description based on the active locale.
     */
    public function getDescriptionAttribute(): string
    {
        return app()->getLocale() === 'ar'
            ? ($this->description_ar ?: $this->description_en)
            : ($this->description_en ?: $this->description_ar);
    }

    public function getAgeRangeAttribute(): string
    {
        return "{$this->age_min}–{$this->age_max}";
    }
}
