<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'caption',
        'mode', // travel atau umroh
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeByMode($query, $mode)
    {
        return $query->where('mode', $mode);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
