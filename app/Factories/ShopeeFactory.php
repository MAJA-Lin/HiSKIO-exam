<?php

namespace App\Factories;

use App\Factories\PlatformFactoryInterface;
use App\Models\Platforms\Platform;
use App\Models\Platforms\Shopee;

class ShopeeFactory implements PlatformFactoryInterface
{
    public function createPlatform(): Platform
    {
        return new Shopee();
    }
}
