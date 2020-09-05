<?php

namespace Tests\Feature\Api;

use App\Starship;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LogicException;
use Tests\TestCase;

class PlayRandomStarshipsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var string
     */
    private $playStarshipsApiEndpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->playStarshipsApiEndpoint = route('api.play.starships');
    }

    /**
     * @return void
     */
    public function testTwoPlayers()
    {
        $winner = factory(Starship::class)->create(['crew' => 100]);
        $loser = factory(Starship::class)->create(['crew' => 5]);

        $response = $this->post($this->playStarshipsApiEndpoint);

        $response->assertStatus(200);
        $response->assertJson([
            "winner" => [
                "id" => $winner->id,
                "name" => $winner->name,
                "wins" => 0,
                "losses" => 0,
                "stats" => [
                    "crew" => 100
                ],
            ],
            "loser" => [
                "id" => $loser->id,
                "name" => $loser->name,
                "wins" => 0,
                "losses" => 0,
                "stats" => [
                    "crew" => 5
                ],
            ]
        ]);
    }

    public function testOne()
    {
        $this->withoutExceptionHandling();

        factory(Starship::class)->create();

        $this->expectException(LogicException::class);
        $this->post($this->playStarshipsApiEndpoint)->dump();
    }
}
