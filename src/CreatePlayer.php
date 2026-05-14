<?php

declare(strict_types=1);

namespace App;

use App\Characters\Character;
use App\Characters\Elf;
use App\Characters\King;
use App\Characters\Knight;
use App\Characters\Orc;

class CreatePlayer
{
    public function create(): Character
    {
        $player = $this->getCharacter();
        $name = PlayerName::get();
        $player->setName($name);
        $force = $this->getForce();
        $player->setStrength($force);

        return $player;
    }

    private function getCharacter(): Character
    {
        $character = [
            new King(),
            new Knight(),
            new Orc(),
            new Elf(),
        ];
        $key = array_rand($character);

        return $character[$key];
    }

    private function getForce(): int
    {
        return mt_rand(10, 25);
    }

}
