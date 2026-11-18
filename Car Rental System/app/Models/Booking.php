<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_name',
        'email',
        'phone',
        'pickup_location',
        'start_time',
        'return_time',
        'driver_phone',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'start_time' => 'datetime',
            'return_time' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
