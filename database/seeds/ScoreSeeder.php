<?php

use App\Person;
use App\Score;
use App\Starship;
use Illuminate\Database\Seeder;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Score::class, 10)->make()->each(function (Score $score) {
            $score->scoreable()->associate(Person::inRandomOrder()->first());
        });

        factory(Score::class, 10)->make()->each(function (Score $score) {
            $score->scoreable()->associate(Starship::inRandomOrder()->first());
        });
    }
}
