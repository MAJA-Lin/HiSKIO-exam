<?php

namespace App\Models\Platforms;

use App\Models\Platforms\Platform;

class Shopee extends Platform
{
    protected $publishMessage = 'Shopee' . parent::PUBLISH_MESSAGE;
}
