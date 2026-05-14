<?php

declare(strict_types=1);

error_reporting(-1);

require_once __DIR__ . '/vendor/autoload.php';

function debug($arr): void
{
    echo '<pre>' . PHP_EOL;
    var_dump($arr);
    echo '</pre>' . PHP_EOL;
}

function getBattle(array $battles): string
{
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

$game = new \App\Game();
$battles = $game->start();

echo getBattle($battles);
