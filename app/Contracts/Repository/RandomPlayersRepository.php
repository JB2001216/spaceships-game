<?php

namespace App\Contracts\Repository;

use App\Contracts\Player;
use Illuminate\Support\Collection;

interface RandomPlayersRepository
{
    /**
     * @param int $limit
     * @return Collection|Player[]
     */
    public function getRandom(int $limit): Collection;
}
