<?php

declare(strict_types=1);

namespace App\Behaviors;

class BowBehavior implements WeaponBehaviorInterface
{

    public function useWeapon(): string
    {
        return 'выстрел из лука';
    }

}
