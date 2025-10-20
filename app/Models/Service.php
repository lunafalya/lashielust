<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Service extends Model
{
    
    use HasFactory;
    protected $table = 'services';
    protected $fillable = ['name', 'category','type', 'price', 'description', 'file_path'];

    public function user()
{
    return $this->belongsTo(User::class);
}


public function bookings()
{
    return $this->hasMany(Booking::class);
}

public function reviews() {
    return $this->hasMany(Review::class);
}


}

