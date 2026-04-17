<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Court;
use App\Models\Sport;

class CourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tennis = Sport::where('name', 'Tennis')->first();
        $basketball = Sport::where('name', 'Basketball')->first();
        $badminton = Sport::where('name', 'Badminton')->first();
        $pickleball = Sport::where('name', 'Pickleball')->first();
        $volleyball = Sport::where('name', 'Volleyball')->first();

        Court::create([
            'name' => 'Tennis Court A',
            'sport_id' => $tennis->id,
            'location' => 'Kuala Lumpur Sports Complex',
        ]);

        Court::create([
            'name' => 'Tennis Court B',
            'sport_id' => $tennis->id,
            'location' => 'Kuala Lumpur Sports Complex',
        ]);

        Court::create([
            'name' => 'Badminton Court A',
            'sport_id' => $badminton->id,
            'location' => 'Setapak Sports Complex',
        ]);

        Court::create([
            'name' => 'Basketball Court A',
            'sport_id' => $basketball->id,
            'location' => 'KLCC Open Court',
        ]);

        Court::create([
            'name' => 'Pickleball Court A',
            'sport_id' => $pickleball->id,
            'location' => 'Bukit Jalil Sports Complex',
        ]);

        Court::create([
            'name' => 'Volleyball Court A',
            'sport_id' => $volleyball->id,
            'location' => 'Shah Alam Sports Complex',
        ]);
    }
}
