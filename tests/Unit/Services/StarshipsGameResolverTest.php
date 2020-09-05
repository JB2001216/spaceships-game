<?php

namespace Tests\Unit\Services;

use App\Starship;
use App\Repositories\StarshipRepository;
use App\Repositories\ScoreRepository;
use App\Score;
use App\Services\RandomGame\RandomStarshipsGameResolver;
use LogicException;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class StarshipsGameResolverTest extends TestCase
{
    /**
     * @var ScoreRepository|MockInterface
     */
    private $scoreRepository;
    /**
     * @var StarshipRepository|MockInterface
     */
    private $starshipRepository;
    /** @var \App\Services\RandomGame\RandomStarshipsGameResolver */
    private $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->starshipRepository = $this->createMock(StarshipRepository::class);
        $this->scoreRepository = $this->createMock(ScoreRepository::class);
        $this->service = new \App\Services\RandomGame\RandomStarshipsGameResolver($this->starshipRepository, $this->scoreRepository);
    }

    /**
     * @return void
     */
    public function testNoPlayers()
    {
        $this->expectException(LogicException::class);
        $this->starshipRepository->method('getRandom')->willReturn(collect());
        $this->service->play();
    }

    /**
     * @return void
     */
    public function testTwoPlayers()
    {
        $winner = new Starship(['crew' => 100]);
        $winner->id = 5;
        $winner->setRelation('score', new Score());

        $loser = new Starship(['crew' => 50]);
        $loser->id = 10;
        $loser->setRelation('score', new Score());

        $this->starshipRepository->expects($this->once())->method('getRandom')->willReturn(collect([$loser, $winner]));
        $this->scoreRepository->expects($this->once())->method('updateWonCount')->with($winner, 1);
        $this->scoreRepository->expects($this->once())->method('updateLostCount')->with($loser, 1);
        $result = $this->service->play();
        $this->assertEquals($winner->id, $result->getWinner()->getId());
        $this->assertEquals($loser->id, $result->getLoser()->getId());
    }
}
