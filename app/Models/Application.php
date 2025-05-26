<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'phone',
        'date',
        'time',
        'driver_license_series',
        'driver_license_number',
        'driver_license_issue_date',
        'car_brand',
        'car_model',
        'payment_type',
        'agreement',
        'status',
        'admin_comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 