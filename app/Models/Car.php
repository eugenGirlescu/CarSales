<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'model',
        'seats',
        'fuel',
        'year',
        'color',
        'gearbox',
        'buyWith',
        'price',
        'coinType',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    use HasFactory;
}