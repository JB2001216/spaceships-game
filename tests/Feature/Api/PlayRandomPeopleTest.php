<?php

namespace Tests\Feature\Api;

use App\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LogicException;
use Tests\TestCase;

class PlayRandomPeopleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var string
     */
    private $playPeopleApiEndpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->playPeopleApiEndpoint = route('api.play.people');
    }

    /**
     * @return void
     */
    public function testTwoPlayers()
    {
        $winner = factory(Person::class)->create(['mass' => 100]);
        $loser = factory(Person::class)->create(['mass' => 50]);

        $response = $this->post($this->playPeopleApiEndpoint);

        $response->assertStatus(200);
        $response->assertJson([
            "winner" => [
                "id" => $winner->id,
                "name" => $winner->name,
                "wins" => 0,
                "losses" => 0,
                "stats" => [
                    "mass" => 100
                ],
            ],
            "loser" => [
                "id" => $loser->id,
                "name" => $loser->name,
                "wins" => 0,
                "losses" => 0,
                "stats" => [
                    "mass" => 50
                ],
            ]
        ]);
    }

    public function testOne()
    {
        $this->withoutExceptionHandling();

        factory(Person::class)->create();

        $this->expectException(LogicException::class);
        $this->post($this->playPeopleApiEndpoint)->dump();
    }
}
