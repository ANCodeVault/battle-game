<?php

declare(strict_types=1);

namespace App\Behaviors;

class SwordBehavior implements WeaponBehaviorInterface
{

    public function useWeapon(): string
    {
        return 'удар мечом';
    }

}
