<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sport;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sport::create(['name' => 'Tennis']);
        Sport::create(['name' => 'Basketball']);
        Sport::create(['name' => 'Badminton']);
        Sport::create(['name' => 'Pickleball']);
        Sport::create(['name' => 'Volleyball']);
    }
}
