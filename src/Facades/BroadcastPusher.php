<?php

namespace Companue\BroadcastPusher\Facades;

use Illuminate\Support\Facades\Facade;

class BroadcastPusher extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'broadcast-pusher';
    }
}
