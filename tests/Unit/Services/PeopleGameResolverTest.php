<?php

namespace Tests\Unit\Services;

use App\Person;
use App\Repositories\PersonRepository;
use App\Repositories\ScoreRepository;
use App\Score;
use App\Services\RandomPeopleGameResolver;
use LogicException;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class PeopleGameResolverTest extends TestCase
{
    /**
     * @var ScoreRepository|MockInterface
     */
    private $scoreRepository;
    /**
     * @var PersonRepository|MockInterface
     */
    private $personRepository;
    /** @var RandomPeopleGameResolver */
    private $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->personRepository = $this->createMock(PersonRepository::class);
        $this->scoreRepository = $this->createMock(ScoreRepository::class);
        $this->service = new RandomPeopleGameResolver($this->personRepository, $this->scoreRepository);
    }

    /**
     * @return void
     */
    public function testNoPlayers()
    {
        $this->expectException(LogicException::class);
        $this->personRepository->method('getRandom')->willReturn(collect());
        $this->service->play();
    }

    /**
     * @return void
     */
    public function testTwoPlayers()
    {
        $winner = new Person(['mass' => 100]);
        $winner->id = 5;
        $winner->setRelation('score', new Score());

        $loser = new Person(['mass' => 50]);
        $loser->id = 10;
        $loser->setRelation('score', new Score());

        $this->personRepository->expects($this->once())->method('getRandom')->willReturn(collect([$loser, $winner]));
        $this->scoreRepository->expects($this->once())->method('updateWonCount')->with($winner, 1);
        $this->scoreRepository->expects($this->once())->method('updateLostCount')->with($loser, 1);
        $result = $this->service->play();
        $this->assertEquals($winner->id, $result->getWinner()->getId());
        $this->assertEquals($loser->id, $result->getLoser()->getId());
    }
}
