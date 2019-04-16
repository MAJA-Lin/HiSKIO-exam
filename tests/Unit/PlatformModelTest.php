<?php

namespace Tests\Unit;

use Tests\BaseTest;
use App\Models\Product;
use App\Models\Platforms\Pchome;
use App\Models\Platforms\Yahoo;
use App\Models\Platforms\Ruten;
use App\Models\Platforms\Shopee;

class PlatformModelTest extends BaseTest
{
    protected function setUp(): void
    {
        $this->product = $this->createMock(Product::class);
    }

    public function testPchomePublish()
    {
        $platform = new Pchome;

        $this->assertClassHasAttribute('publishMessage', get_class($platform));
        $this->assertEquals("Pchome 已收到商品發佈通知", $platform->publish($this->product));
    }

    public function testYahooPublish()
    {
        $platform = new Yahoo;

        $this->assertEquals("Yahoo 已收到商品發佈通知", $platform->publish($this->product));
    }

    public function testRutenPublish()
    {
        $platform = new Ruten;

        $this->assertEquals("Ruten 已收到商品發佈通知", $platform->publish($this->product));
    }

    public function testShopeePublish()
    {
        $platform = new Shopee;

        $this->assertEquals("Shopee 已收到商品發佈通知", $platform->publish($this->product));
    }

    public function testInvalidPlatformPublish()
    {
        $platform = new Pchome;

        $this->assertNotEquals("Yahoo 已收到商品發佈通知", $platform->publish($this->product));
    }
}
