<?php

namespace App;

use App\Contracts\Player;
use App\Traits\HasScore;
use Illuminate\Database\Eloquent\Model;

class Person extends Model implements Player
{
    use HasScore;

    protected $fillable = ['name', 'mass'];

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getWins(): int
    {
        return data_get($this, 'score.won', 0);
    }

    public function getLosses(): int
    {
        return data_get($this, 'score.lost', 0);
    }

    public function getStats(): array
    {
        return ['mass' => $this->mass];
    }
}
