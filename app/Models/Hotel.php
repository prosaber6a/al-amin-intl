<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';
    protected $fillable = [
        'name',
        'location',
        'room_type',
        'room_capacity',
        'price_per_night',
    ];
}
