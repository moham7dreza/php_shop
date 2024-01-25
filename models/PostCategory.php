<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    const int STATUS_ACTIVE = 1;
    const int STATUS_INACTIVE = 0;

    protected $guarded = [];

    public function scopeActive($q)
    {
        return $q->where('status', self::STATUS_ACTIVE);
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function statusText(): string
    {
        return $this->isActive() ? 'active' : 'inactive';
    }
}