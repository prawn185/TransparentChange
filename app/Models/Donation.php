<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'is_recurring',
        'frequency',
        'next_donation_date',
    ];

    protected $casts = [
        'is_recurring' => 'boolean',
        'next_donation_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pennyTrackers()
    {
        return $this->hasMany(PennyTracker::class);
    }
}
