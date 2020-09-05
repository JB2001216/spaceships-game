<?php

namespace App\Contracts;

use App\Structs\GameResult;
use LogicException;

interface Game
{
    /**
     * @return GameResult
     * @throws LogicException
     */
    public function play(): GameResult;
}
