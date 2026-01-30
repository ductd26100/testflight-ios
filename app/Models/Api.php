<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    protected $fillable = [
        'name',
        'testflight_link',
        'start_date',
        'expiry_datetime',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'expiry_datetime' => 'datetime',
    ];

    // Auto generate api_id khi tạo mới
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($api) {
            if (empty($api->api_id)) {
                $api->api_id = 'API-' . strtoupper(uniqid());
            }
        });
    }

    // Get full API link
    public function getApiLinkAttribute(): string
    {
        return url('/api/' . $this->id);
    }

    // Check if API is expired (only if expiry date is BEFORE today)
    public function isExpired(): bool
    {
        if (!$this->expiry_datetime) {
            return false;
        }
        $today = now()->startOfDay();
        $expiry = $this->expiry_datetime->startOfDay();
        return $expiry->lt($today); // Expired only if expiry date < today
    }

    // Get remaining days
    public function getRemainingDaysAttribute(): ?int
    {
        if (!$this->expiry_datetime) {
            return null;
        }
        // So sánh theo ngày (đầu ngày) thay vì giờ để tránh sai lệch
        $today = now()->startOfDay();
        $expiry = $this->expiry_datetime->startOfDay();
        return $today->diffInDays($expiry, false);
    }
}
