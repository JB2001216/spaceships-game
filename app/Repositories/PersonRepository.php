<?php

namespace App\Repositories;

use App\Contracts\Repository\RandomPlayersRepository;
use App\Person;
use Illuminate\Support\Collection;

class PersonRepository implements RandomPlayersRepository
{
    /**
     * @param int $limit
     * @return Collection|Person[]
     */
    public function getRandom(int $limit): Collection
    {
        return Person::inRandomOrder()->limit($limit)->get();
    }
}
