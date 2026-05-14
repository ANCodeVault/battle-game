<?php

declare(strict_types=1);

namespace App\Behaviors;

class AxeBehavior implements WeaponBehaviorInterface
{

    public function useWeapon(): string
    {
        return 'удар топором';
    }

}
