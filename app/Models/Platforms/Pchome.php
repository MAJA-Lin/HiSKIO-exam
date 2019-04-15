<?php

namespace App\Models\Platforms;

use App\Models\Platforms\Platform;

class Pchome extends Platform
{
    protected $publishMessage = 'Pchome' . parent::PUBLISH_MESSAGE;
}
