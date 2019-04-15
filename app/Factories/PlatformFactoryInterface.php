<?php

namespace App\Factories;

use App\Models\Platforms\Platform;

interface PlatformFactoryInterface
{
    /**
     * @return Platform
     */
    public function createPlatform(): Platform;
}
