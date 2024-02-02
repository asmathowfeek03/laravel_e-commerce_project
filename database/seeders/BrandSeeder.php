<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandDataSet = [
            [
                'name' => 'Neutrogena',
                'slug' => 'neutrogena',
                'status' => 0,
                'category_id' => 1, // Skincare
            ],
            [
                'name' => 'Aveeno',
                'slug' => 'aveeno',
                'status' => 0,
                'category_id' => 1, // Skincare
            ],
            [
                'name' => 'Dove',
                'slug' => 'dove',
                'status' => 0,
                'category_id' => 2, // Bath and Body
            ],
            [
                'name' => 'B & B Works',
                'slug' => 'bb-works',
                'status' => 0,
                'category_id' => 2, // Bath and Body
            ],
            [
                'name' => 'Maybelline',
                'slug' => 'maybelline',
                'status' => 0,
                'category_id' => 3, //  Makeup
            ],
            [
                'name' => 'MAC Cosmetics',
                'slug' => 'mac-cosmetics',
                'status' => 0,
                'category_id' => 3, // Makeup
            ],
            [
                'name' => 'Chanel',
                'slug' => 'chanel',
                'status' => 0,
                'category_id' => 4, // Fragrance
            ],
            [
                'name' => 'LOréal',
                'slug' => 'loreal',
                'status' => 0,
                'category_id' => 4, // Fragrance
            ],
        ];

        // Use Eloquent to create records
        foreach ($brandDataSet as $brandData) {
            Brand::create($brandData);
        }
    }
}

