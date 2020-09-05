<?php

namespace App\Repositories;

use App\Contracts\Scoreable;
use Illuminate\Database\Eloquent\Model;

class ScoreRepository
{
    /**
     * @param Scoreable $loser
     * @param int $lostCount
     * @return Model
     */
    public function updateLostCount(Scoreable $loser, int $lostCount): Model
    {
        return $loser->score()->updateOrCreate([], ['lost' => $lostCount]);
    }

    /**
     * @param Scoreable $winner
     * @param int $wonCount
     * @return Model
     */
    public function updateWonCount(Scoreable $winner, int $wonCount): Model
    {
        return $winner->score()->updateOrCreate([], ['won' => $wonCount]);
    }
}
