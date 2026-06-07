<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    public const STATUS_PENDING  = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'nursery_name', 'city', 'contact_name',
        'phone', 'email', 'message', 'status',
    ];

    protected $attributes = [
        'status' => self::STATUS_PENDING,
    ];

    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }
}
