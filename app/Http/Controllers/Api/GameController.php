<?php

namespace App\Http\Controllers\Api;

use App\Services\RandomGame\RandomPeopleGameResolver;
use App\Services\RandomGame\RandomStarshipsGameResolver;
use App\Transformers\GameResultTransformer;
use Spatie\Fractalistic\ArraySerializer;

class GameController extends ApiController
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
     * @OA\Post(
     *      path="/api/play/starships",
     *      operationId="play-starships",
     *      tags={"play"},
     *      summary="New game between startships",
     *      description="Fetches two random starships and outputs the winner",
     *      @OA\RequestBody(@OA\JsonContent()),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent()
     *       ),
     *       @OA\Response(response=400, description="Bad request", @OA\JsonContent())
     *     )
     *
     * @param \App\Services\RandomGame\RandomStarshipsGameResolver $game
     * @return \Spatie\Fractal\Fractal
     */
    public function playRandomStarships(RandomStarshipsGameResolver $game)
    {
        $gameResult = $game->play();
        return fractal($gameResult, $this->gameResultTransformer, ArraySerializer::class);
    }


    /**
     * @OA\Post(
     *      path="/api/play/people",
     *      operationId="play-people",
     *      tags={"play"},
     *      summary="New game between people",
     *      description="Fetches two random people and outputs the winner",
     *      @OA\RequestBody(@OA\JsonContent()),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent()
     *       ),
     *       @OA\Response(response=400, description="Bad request", @OA\JsonContent())
     *     )
     *
     * @param \App\Services\RandomGame\RandomPeopleGameResolver $game
     * @return \Spatie\Fractal\Fractal
     */
    public function playRandomPeople(RandomPeopleGameResolver $game)
    {
        $gameResult = $game->play();
        return fractal($gameResult, $this->gameResultTransformer, ArraySerializer::class);
    }
}
