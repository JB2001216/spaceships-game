<?php

namespace App\Services\RandomGame;

use App\Contracts\Game;
use App\Contracts\Player;
use App\Contracts\Repository\RandomPlayersRepository;
use App\Repositories\ScoreRepository;
use App\Structs\GameResult;
use Illuminate\Support\Collection;
use LogicException;

abstract class RandomGameResolver implements Game
{
    /**
     * @var RandomPlayersRepository
     */
    private $randomPlayersRepository;
    /**
     * @var ScoreRepository
     */
    private $scoreRepository;

    public function __construct(RandomPlayersRepository $randomPlayersRepository, ScoreRepository $scoreRepository)
    {
        $this->randomPlayersRepository = $randomPlayersRepository;
        $this->scoreRepository = $scoreRepository;
    }

    /**
     * @return GameResult
     * @throws LogicException
     */
    public function play(): GameResult
    {
        $players = $this->randomPlayersRepository->getRandom(2);
        if ($players->count() !== 2) {
            throw new LogicException('Failed to fetch 2 players.');
        }

        /** @var Player $winner */
        /** @var Player $loser */
        [$winner, $loser] = $this->sortPlayersByWinningFactor($players);

        $this->scoreRepository->updateWonCount($winner, $winner->getWins() + 1);
        $this->scoreRepository->updateLostCount($loser, $loser->getLosses() + 1);

        return new GameResult($winner, $loser, now());
    }

    /**
     * @param Collection $players
     * @return Collection
     */
    protected abstract function sortPlayersByWinningFactor(Collection $players): iterable;
}
