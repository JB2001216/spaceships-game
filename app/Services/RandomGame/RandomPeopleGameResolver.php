<?php

namespace App\Services\RandomGame;

use App\Repositories\PersonRepository;
use App\Repositories\ScoreRepository;
use Illuminate\Support\Collection;

class RandomPeopleGameResolver extends RandomGameResolver
{
    /**
     * @param PersonRepository $starshipRepository
     * @param ScoreRepository $scoreRepository
     */
    public function __construct(PersonRepository $starshipRepository, ScoreRepository $scoreRepository)
    {
        parent::__construct($starshipRepository, $scoreRepository);
    }

    /**
     * @inheritDoc
     */
    protected function sortPlayersByWinningFactor(Collection $players): iterable
    {
        return $players->sortByDesc('mass')->values()->all();
    }
}
