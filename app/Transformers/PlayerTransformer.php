<?php

namespace App\Transformers;

use App\Contracts\Player;
use League\Fractal\TransformerAbstract;

class PlayerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Player $player
     * @return array
     */
    public function transform(Player $player)
    {
        return [
            'id' => $player->getId(),
            'name' => $player->getName(),
            'wins' => $player->getWins(),
            'losses' => $player->getLosses(),
            'stats' => $player->getStats()
        ];
    }
}
