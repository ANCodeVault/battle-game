<?php

declare(strict_types=1);

namespace App;

class PlayerName
{

    public static function get(): string
    {
        $name = require __DIR__ . '/../config/player_name.php';
        $key = array_rand($name);

        return $name[$key];
    }

}
