<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Property;
use Illuminate\Database\Seeder;

class BrandAndPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::factory()
            ->count(10)
            ->has(Property::factory()->count(12))
            ->create();
    }
}
