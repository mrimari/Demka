<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarBrand;

class CarBrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            'Toyota',
            'Hyundai',
            'Kia',
            'Volkswagen',
            'Lada',
        ];
        foreach ($brands as $brand) {
            CarBrand::firstOrCreate(['name' => $brand]);
        }
    }
} 