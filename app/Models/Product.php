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
     * @param string $factory
     * @return Platform
     */
    public function getPlatform(string $factory): Platform
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
