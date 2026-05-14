<?php

declare(strict_types=1);

namespace App;

use App\Characters\Character;

class Game
{

    private array $battle = [];

    public function run(): string
    {
        $battles = $this->start();

        $str = '';

        foreach ($battles as $round => $characters) {
            $str .= "<b>Раунд: {$round}</b>\n<br>";
            foreach ($characters as $player => $battle) {
                if ('end' != $player) {
                    $str .= "Игрок {$player}: 
                <b>Раса:</b> {$battle['race']} 
                <b>Имя:</b> {$battle['name']},  
                <b>Оружие:</b> {$battle['weapon']}, 
                <b>Противник</b> {$battle['enemy']} нанес {$battle['hit']} удар, 
                <b>Жизнь:</b> {$battle['life']}<br>\n";
                } else {
                    $str .= $battle['name'];
                }
            }
            $str .= "<hr>";
        }

        return $str;
    }

    public function start(): array
    {
        $createPlayer = new CreatePlayer();
        $playerOne = $createPlayer->create();
        $playerTwo = $createPlayer->create();

        $behavior = new Behavior();

        return $this->fight($playerOne, $playerTwo, $behavior);
    }

    private function fight(
        Character $playerOne,
        Character $playerTwo,
        Behavior $behavior,
    ): array
    {
        $playerOneHealth = $playerOne->getHealth();
        $playerTwoHealth = $playerTwo->getHealth();

        $roundCounter = 1;

        while (true) {
            $playerOneKick = $this->attackPower($playerOne->getStrength());
            $playerTwoKick = $this->attackPower($playerTwo->getStrength());

            $playerOneHealth -= $playerTwoKick;
            $playerTwoHealth -= $playerOneKick;

            if (($playerOneHealth <= 0) || ($playerTwoHealth <= 0)) {
                $name = '';
                $race = '';

                if ($playerOneHealth <= 0) {
                    $name = $playerOne->getName();
                    $race = $playerOne->getRace();
                }

                if ($playerTwoHealth <= 0) {
                    $name = $playerTwo->getName();
                    $race = $playerTwo->getRace();
                }

                $this->battle[$roundCounter]['end']['name'] = "В этом бою ОТВАЖНО ПОГИБ <b>{$race} {$name}</b>";
                break;
            }

            $behavior->getAction();
            $weaponOne = $behavior->getWeaponBehavior();
            $behavior->getAction();
            $weaponTwo = $behavior->getWeaponBehavior();

            $behaviorOne = $weaponOne;
            $behaviorTwo = $weaponTwo;

            $this->battleRecords(
                $roundCounter, 1, $playerOne->getRace(), $playerOne->getName(),
                $playerOneHealth, $behaviorOne, $playerTwo->getRace(), $playerTwoKick
            );

            $this->battleRecords(
                $roundCounter, 2, $playerTwo->getRace(), $playerTwo->getName(),
                $playerTwoHealth, $behaviorTwo, $playerOne->getRace(), $playerOneKick
            );

            $roundCounter++;
        }

        return $this->battle;
    }

    private function battleRecords(
        int $round,
        int $player,
        string $race,
        string $name,
        int $life,
        string $weapon,
        string $enemy,
        int $hit,
    ): void
    {
        $this->battle[$round][$player] = [
            'race' => $race,
            'name' => $name,
            'life' => $life,
            'weapon' => $weapon,
            'enemy' => $enemy,
            'hit' => $hit,
        ];
    }

    private function attackPower(int $strength): int
    {
        return mt_rand(1, $strength);
    }

}
