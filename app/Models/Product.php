<?php

namespace App\Models;

use App\Models\Platforms\Platform;
use App\Factories\PlatformFactoryInterface;

class Product
{
    /**
     * @var array
     */
    protected $platforms = [];

    /**
     * @param PlatformFactoryInterface $factory
     * @return Platform
     */
    public function getPlatform(PlatformFactoryInterface $factory): Platform
    {
        return $factory->createPlatform();
    }

    /**
     * Setup platform(s) by given array
     *
     * @param array $platformClasses
     * @return this
     */
    public function setupPlatforms(array $platformClasses): self
    {
        var_dump($platformClasses);

        // Reset platforms to avoid problems
        $this->platforms = [];

        foreach ($platformClasses as $platformClass) {
            $this->platforms[] = $this->getPlatform($platformClass);
        }

        return $this;
    }

    /**
     * Publish product information to platforms
     * @return void
     */
    public function publish()
    {
        foreach ($this->platforms as $platform) {
            $platform->publish($this);
        }
    }
}
