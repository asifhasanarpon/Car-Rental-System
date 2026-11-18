<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model_name',
        'image_url',
        'price_per_day',
        'capacity',
        'transmission',
        'mileage',
        'fuel_type',
        'reviews_count',
    ];
}
