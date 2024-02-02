<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colorDataSet = [
            [
                'name' => 'Red',
                'code' => '#FF0000',
                'status' => 0,
            ],
            [
                'name' => 'Brown',
                'code' => '#A52A2A',
                'status' => 0,
            ],
            [
                'name' => 'Purple',
                'code' => '#800080',
                'status' => 0,
            ],
            [
                'name' => 'Pink',
                'code' => '#FFC0CB',
                'status' => 0,
            ],
            [
                'name' => 'Orange',
                'code' => '#FF8C00',
                'status' => 0,
            ],
        ];

        // Use Eloquent to create records
        foreach ($colorDataSet as $colorData) {
            Color::updateOrCreate(['name' => $colorData['name']], $colorData);
        }

    }
}
