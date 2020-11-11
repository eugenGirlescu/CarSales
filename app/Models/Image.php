<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'car_id',
        'file_name'
    ];
    
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    use HasFactory;
}