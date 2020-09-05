<?php

namespace App\Services;

use App\Repositories\ScoreRepository;
use App\Repositories\StarshipRepository;
use Illuminate\Support\Collection;

class RandomStarshipsGameResolver extends RandomGameResolver
{
    /**
     * @param StarshipRepository $starshipRepository
     * @param ScoreRepository $scoreRepository
     */
    public function __construct(StarshipRepository $starshipRepository, ScoreRepository $scoreRepository)
    {
        parent::__construct($starshipRepository, $scoreRepository);
    }

    /**
     * @inheritDoc
     */
    protected function sortPlayersByWinningFactor(Collection $players): iterable
    {
        return $players->sortByDesc('crew')->values()->all();
    }
}
