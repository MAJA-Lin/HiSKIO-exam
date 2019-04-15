<?php

namespace App\Services;

use App\Models\Product;

# Platforms, can add new platforms here.
// use App\Factories\YahooFactory;
use App\Factories\PchomeFactory;
use App\Factories\ShopeeFactory;
use App\Factories\RutenFactory;

class ProductService
{
    /**
     * @param Product $product Product which is going to be published
     * @return void
     */
    public function publishNewProduct(Product $product): void
    {
        // Attach platforms to publish
        $product->setupPlatforms([
            PchomeFactory::class,
            ShopeeFactory::class,
            RutenFactory::class
        ]);

        $product->publish();
    }
}
