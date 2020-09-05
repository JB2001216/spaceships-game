<?php

use App\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(Person::class, 15)->create();
    }
}
