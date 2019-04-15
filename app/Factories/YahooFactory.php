<?php

namespace App\Factories;

use App\Factories\PlatformFactoryInterface;
use App\Models\Platforms\Platform;
use App\Models\Platforms\Yahoo;

class YahooFactory implements PlatformFactoryInterface
{
    public function createPlatform(): Platform
    {
        return new Yahoo();
    }
}
