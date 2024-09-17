<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PennyTracker extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_identifier',
        'donation_id',
        'charity_id',
        'amount',
        'status',
    ];

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }

    public function scopeAllocated($query)
    {
        return $query->where('status', 'allocated');
    }
}
