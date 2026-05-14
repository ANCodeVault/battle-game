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

echo new \App\Game()->run();
