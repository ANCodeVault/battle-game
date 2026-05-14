<?php

declare(strict_types=1);

namespace App\Characters;

class Character
{

    private int $health = 100;
    private string $name;

    protected int $strength;
    protected string $race;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $value): void
    {
        $this->name = $value;
    }

    public function getRace(): string
    {
        return $this->race;
    }

    public function setRace(string $value): void
    {
        $this->race = $value;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $value): void
    {
        $this->strength = $value;
    }

}
