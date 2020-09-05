<?php

namespace App\Repositories;

use App\Contracts\Repository\RandomPlayersRepository;
use App\Starship;
use Illuminate\Support\Collection;

class StarshipRepository implements RandomPlayersRepository
{
    /**
     * @param int $limit
     * @return Collection|Starship[]
     */
    public function getRandom(int $limit): Collection
    {
        return Starship::inRandomOrder()->limit($limit)->get();
    }
}
