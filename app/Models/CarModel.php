<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class CarModel extends EloquentModel
{
    use HasFactory;

    protected $fillable = ['brand_id', 'name'];

    public function brand()
    {
        return $this->belongsTo(CarBrand::class, 'brand_id');
    }
} 