<?php

namespace Tests\Unit;

use Tests\BaseTest;
use App\Services\ProductService;
use App\Factories\PchomeFactory;
use App\Factories\ShopeeFactory;
use App\Factories\RutenFactory;

class ProductServiceTest extends BaseTest
{
    protected function setUp(): void
    {
        $this->product = $this->createMock(\App\Models\Product::class);
    }

    public function testPublishNewProduct()
    {
        $result = [
            $this->getPlatformPublishMessage(\App\Models\Platforms\Pchome::class),
            $this->getPlatformPublishMessage(\App\Models\Platforms\Shopee::class),
            $this->getPlatformPublishMessage(\App\Models\Platforms\Ruten::class),
        ];

        $service = new ProductService;
        $this->product->method('setupPlatforms')
            ->with([
                PchomeFactory::class,
                ShopeeFactory::class,
                RutenFactory::class
            ])
            ->willReturn($this->product);

        $this->product->method('publish')
            ->willReturn($result);

        $this->assertEquals($result, $service->publishNewProduct($this->product));
    }
}
