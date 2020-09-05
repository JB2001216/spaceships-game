<?php

namespace App\Structs;

use App\Contracts\Player;
use Carbon\Carbon;

class GameResult
{
    /**
     * @var Player
     */
    private $loser;
    /**
     * @var Player
     */
    private $winner;
    /**
     * @var Carbon
     */
    private $time;

    public function __construct(Player $winner, Player $loser, Carbon $time)
    {
        $this->loser = $loser;
        $this->winner = $winner;
        $this->time = $time;
    }

    /**
     * @return Player
     */
    public function getLoser(): Player
    {
        return $this->loser;
    }

    /**
     * @return Player
     */
    public function getWinner(): Player
    {
        return $this->winner;
    }

    /**
     * @return Carbon
     */
    public function getTime(): Carbon
    {
        return $this->time;
    }
}
