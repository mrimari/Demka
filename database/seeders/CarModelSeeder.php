<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarBrand;
use App\Models\CarModel;

class CarModelSeeder extends Seeder
{
    public function run(): void
    {
        $models = [
            'Toyota' => ['Camry', 'Corolla', 'RAV4'],
            'Hyundai' => ['Solaris', 'Creta', 'Tucson'],
            'Kia' => ['Rio', 'Sportage', 'Ceed'],
            'Volkswagen' => ['Polo', 'Tiguan', 'Passat'],
            'Lada' => ['Vesta', 'Granta', 'XRay'],
        ];
        foreach ($models as $brandName => $modelList) {
            $brand = CarBrand::where('name', $brandName)->first();
            if ($brand) {
                foreach ($modelList as $modelName) {
                    CarModel::firstOrCreate([
                        'brand_id' => $brand->id,
                        'name' => $modelName
                    ]);
                }
            }
        }
    }
} 