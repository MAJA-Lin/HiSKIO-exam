<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Platforms\Platform;

use App\Factories\PlatformFactoryInterface;
use App\Factories\PchomeFactory;
use App\Factories\ShopeeFactory;
use App\Factories\RutenFactory;
use App\Factories\YahooFactory;

class ProductService
{
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
     * @return array
     */
    public function setupPlatform(array $platformClasses): array
    {
        $platforms = [];
        foreach ($platformClasses as $platformClass) {
            $platforms[] = $this->getPlatform($platformClass);
        }

        return $platforms;
    }

    /**
     * @param Product $product Product which is going to be published
     * @return void
     */
    public function publishNewProduct(Product $product): void
    {
        // select platform to publish
        $platforms = $this->setupPlatform([
            PchomeFactory::class,
            ShopeeFactory::class,
            RutenFactory::class
        ]);

        foreach ($platforms as $platform) {
            $platform->publish($product);
        }
    }
}
