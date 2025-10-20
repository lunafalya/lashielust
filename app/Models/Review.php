<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'booking_id',
        'rating',
        'review_text',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function booking() {
        return $this->belongsTo(Booking::class);
    }
}
