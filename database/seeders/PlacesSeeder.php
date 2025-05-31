<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Seeder;

class PlacesSeeder extends Seeder
{
    public function run(): void
    {
        Place::factory()->count(10)->create();
    }
}
