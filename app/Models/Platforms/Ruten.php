<?php

namespace App\Models\Platforms;

use App\Models\Platforms\Platform;

class Ruten extends Platform
{
    protected $publishMessage = 'Ruten' . parent::PUBLISH_MESSAGE;
}
