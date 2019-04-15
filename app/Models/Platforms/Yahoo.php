<?php

namespace App\Models\Platforms;

use App\Models\Platforms\Platform;

class Yahoo extends Platform
{
    protected $publishMessage = 'Yahoo' . parent::PUBLISH_MESSAGE;
}
