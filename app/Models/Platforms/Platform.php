<?php

namespace App\Models\Platforms;

use App\Models\Product;

abstract class Platform
{
    const PUBLISH_MESSAGE = ' 已收到商品發佈通知';

    /**
     * Return publish message
     *
     * @param Product $product
     * @return string
     */
    public function publish(Product $product)
    {
        // Maybe calling api or do something with the product.
        // If response is 200, do:
        return $this->publishMessage;
    }
}
