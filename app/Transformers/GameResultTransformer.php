<?php

namespace App\Transformers;

use App\Structs\GameResult;
use League\Fractal\TransformerAbstract;

class GameResultTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'winner',
        'loser'
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'winner',
        'loser'
    ];
    /**
     * @var PlayerTransformer
     */
    private $playerTransformer;

    /**
     * @param PlayerTransformer $playerTransformer
     */
    public function __construct(PlayerTransformer $playerTransformer)
    {
        $this->playerTransformer = $playerTransformer;
    }

    /**
     * A Fractal transformer.
     *
     * @param GameResult $gameResult
     * @return array
     */
    public function transform(GameResult $gameResult)
    {
        return [
            'time' => $gameResult->getTime()
        ];
    }

    public function includeWinner(GameResult $gameResult)
    {
        return $this->item($gameResult->getWinner(), $this->playerTransformer);
    }

    public function includeLoser(GameResult $gameResult)
    {
        return $this->item($gameResult->getLoser(), $this->playerTransformer);
    }
}
