<?php

namespace Tests\Unit;

use Tests\BaseTest;
use App\Models\Product;
use App\Models\Platforms\Platform;
use App\Models\Platforms\Pchome;
use App\Factories\PchomeFactory;

class ProductTest extends BaseTest
{
    protected function setUp(): void
    {
        $this->product = new Product;
    }

    public function testGetPlatformWithPchome()
    {
        $this->assertTrue(
            $this->product->createPlatform(PchomeFactory::class) instanceof Platform
        );
    }

    public function testGetAttachedPlatforms()
    {
        $this->assertEmpty($this->product->getAttachedPlatforms());
    }

    public function testSetupPlatformsWithEmptyArray()
    {
        // Check product->platforms is default
        $this->assertEmpty($this->product->getAttachedPlatforms());
        $this->product->setupPlatforms([]);
        $this->assertEmpty($this->product->getAttachedPlatforms());
    }

    public function testSetupPlatforms()
    {
        $platformFactories = [\App\Factories\YahooFactory::class, \App\Factories\RutenFactory::class];
        $platformResult = [\App\Models\Platforms\Yahoo::class, \App\Models\Platforms\Ruten::class];

        // Check product->platforms is default
        $this->assertEmpty($this->product->getAttachedPlatforms());
        $this->assertEquals(
            $this->product,
            $this->product->setupPlatforms($platformFactories)
        );

        $platformArray = $this->product->getAttachedPlatforms();
        $this->assertNotEmpty($this->product->getAttachedPlatforms());

        foreach ($platformArray as $key => $platform) {
            $this->assertTrue($platform instanceof Platform);
            $this->assertEquals($platformResult[$key], get_class($platform));
        }
    }

    public function testPublishWithoutAnyPlatform()
    {
        // Check product->platforms is default
        $this->assertEmpty($this->product->getAttachedPlatforms());

        $this->assertEmpty($this->product->publish());
    }

    public function testPublish()
    {
        $responseMessages = [
            $this->getPlatformPublishMessage(\App\Models\Platforms\Shopee::class),
            $this->getPlatformPublishMessage(\App\Models\Platforms\Ruten::class),
            $this->getPlatformPublishMessage(\App\Models\Platforms\Yahoo::class),
        ];

        // Check product->platforms is default
        $this->assertEmpty($this->product->getAttachedPlatforms());

        $this->product->setupPlatforms([
            \App\Factories\ShopeeFactory::class,
            \App\Factories\RutenFactory::class,
            \App\Factories\YahooFactory::class,
        ]);

        $result = $this->product->publish();
        $this->assertNotEmpty($result);
        foreach ($responseMessages as $key => $responseMessage) {
            $this->assertEquals($responseMessage, $result[$key]);
        }
    }
}
