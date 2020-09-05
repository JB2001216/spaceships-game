<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\RandomPeopleGameResolver;
use App\Services\RandomStarshipsGameResolver;
use App\Transformers\GameResultTransformer;
use Spatie\Fractalistic\ArraySerializer;

class GameController extends Controller
{
    /**
     * @var GameResultTransformer
     */
    private $gameResultTransformer;

    public function __construct(GameResultTransformer $gameResultTransformer)
    {
        $this->gameResultTransformer = $gameResultTransformer;
    }

    /**
     * @param RandomStarshipsGameResolver $game
     * @return \Spatie\Fractal\Fractal
     */
    public function playRandomStarships(RandomStarshipsGameResolver $game)
    {
        $gameResult = $game->play();
        return fractal($gameResult, $this->gameResultTransformer, ArraySerializer::class);
    }


    /**
     * @param RandomPeopleGameResolver $game
     * @return \Spatie\Fractal\Fractal
     */
    public function playRandomPeople(RandomPeopleGameResolver $game)
    {
        $gameResult = $game->play();
        return fractal($gameResult, $this->gameResultTransformer, ArraySerializer::class);
    }
}
