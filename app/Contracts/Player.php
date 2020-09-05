<?php

namespace App\Contracts;

interface Player extends Scoreable
{
    public function getId(): int;

    public function getName(): string;

    public function getWins(): int;

    public function getLosses(): int;

    public function getStats(): array;
}
