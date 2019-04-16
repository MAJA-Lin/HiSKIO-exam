<?php

namespace App\Models;

use App\Models\Platforms\Platform;

class Product
{
    /**
     * @var array
     */
    protected $platforms = [];

    /**
     * @return array
     */
    public function getAttachedPlatforms(): array
    {
        return $this->platforms;
    }

    /**
     * @param string $factory
     * @return Platform
     */
    public function createPlatform(string $factory): Platform
    {
        return (new $factory)->createPlatform();
    }

    /**
     * Setup platform(s) by given array
     *
     * @param array $platformClasses
     * @return this
     */
    public function setupPlatforms(array $platformClasses): self
    {
        // Reset platforms to avoid problems
        $this->platforms = [];

        foreach ($platformClasses as $platformClass) {
            $this->platforms[] = $this->createPlatform($platformClass);
        }

        return $this;
    }

    /**
     * Publish product information to platforms
     * @return array
     */
    public function publish(): array
    {
        $result = [];

        foreach ($this->platforms as $platform) {
            $result[] = $platform->publish($this);
        }

        return $result;
    }
}
