<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this ->call([
            BrandSeeder::class,
            ColorSeeder::class,
            YearSeeder::class,
            LocationSeeder::class,
        ]);
        Car::factory()->count(500)->create();
    }
}
