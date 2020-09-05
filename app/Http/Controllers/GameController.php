<?php

namespace App\Http\Controllers;

use App\Contracts\GameType;

class GameController
{
    public function index()
    {
        return view('game', [
            'gameType' => GameType::PEOPLE,
            'playPersonApiEndpoint' => route('api.play.people'),
            'playStarshipApiEndpoint' => route('api.play.starships')
        ]);
    }
}
