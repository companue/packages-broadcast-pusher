<?php

namespace Companue\BroadcastPusher\Tests\Unit;

use Companue\BroadcastPusher\Facades\BroadcastPusher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Companue\BroadcastPusher\Tests\TestCase;

class UnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_returns_ok()
    {
        $this->assertEquals('OK', BroadcastPusher::installed());
    }
}
