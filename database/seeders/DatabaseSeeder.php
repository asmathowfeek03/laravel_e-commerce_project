<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Color;
use Illuminate\Database\Seeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\ColorSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //brand Seeder
        //$this->call([ BrandSeeder::class,]);

        //Color Seeder
        // $this->call([ ColorSeeder::class,]);

        // Seed colors using the Color factory
        //Color::factory(5)->create();
    }
}
