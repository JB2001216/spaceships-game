<?php

use App\Person;
use App\Starship;
use Illuminate\Database\Seeder;

class StarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Starship::class, 15)->create();
    }
}
