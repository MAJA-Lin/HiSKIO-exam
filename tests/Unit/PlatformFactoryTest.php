<?php

namespace Tests\Unit;

use Tests\BaseTest;

use App\Factories\PchomeFactory;
use App\Models\Platforms\Pchome;

use App\Factories\YahooFactory;
use App\Models\Platforms\Yahoo;

use App\Factories\RutenFactory;
use App\Models\Platforms\Ruten;

use App\Factories\ShopeeFactory;
use App\Models\Platforms\Shopee;

class PlatformFactoryTest extends BaseTest
{
    public function testPchomeCreatePlatform()
    {
        $factory = new PchomeFactory;
        $platform = new Pchome;

        $this->assertEquals($platform, $factory->createPlatform());
    }

    public function testYahooCreatePlatform()
    {
        $factory = new YahooFactory;
        $platform = new Yahoo;

        $this->assertEquals($platform, $factory->createPlatform());
    }

    public function testRutenCreatePlatform()
    {
        $factory = new RutenFactory;
        $platform = new Ruten;

        $this->assertEquals($platform, $factory->createPlatform());
    }

    public function testShopeeCreatePlatform()
    {
        $factory = new ShopeeFactory;
        $platform = new Shopee;

        $this->assertEquals($platform, $factory->createPlatform());
    }
}
