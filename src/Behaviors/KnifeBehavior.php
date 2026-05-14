<?php

declare(strict_types=1);

namespace App\Behaviors;

class KnifeBehavior implements WeaponBehaviorInterface
{

    public function useWeapon(): string
    {
        return 'удар ножом';
    }

}
