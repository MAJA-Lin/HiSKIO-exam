<?php

namespace App\Factories;

use App\Factories\PlatformFactoryInterface;
use App\Models\Platforms\Platform;
use App\Models\Platforms\Ruten;

class RutenFactory implements PlatformFactoryInterface
{
    public function createPlatform(): Platform
    {
        return new Ruten();
    }
}
