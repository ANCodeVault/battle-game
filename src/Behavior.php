<?php

declare(strict_types=1);

namespace App;

use App\Behaviors\AxeBehavior;
use App\Behaviors\BowBehavior;
use App\Behaviors\KnifeBehavior;
use App\Behaviors\SwordBehavior;
use App\Behaviors\WeaponBehaviorInterface;

class Behavior
{
    protected WeaponBehaviorInterface $weaponBehavior;

    public function getWeaponBehavior(): string
    {
        return $this->weaponBehavior->useWeapon();
    }

    public function getAction(): void
    {
        $action = $this->getBehavior();
        $this->setWeaponBehavior($action);
    }

    private function setWeaponBehavior(WeaponBehaviorInterface $weaponBehavior): void
    {
        $this->weaponBehavior = $weaponBehavior;
    }

    private function getBehavior(): WeaponBehaviorInterface
    {
        $behavior = [
            new AxeBehavior(),
            new SwordBehavior(),
            new KnifeBehavior(),
            new BowBehavior(),
        ];

        $key = array_rand($behavior);

        return $behavior[$key];
    }

}
