<?php

namespace Companue\BroadcastPusher\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Companue\BroadcastPusher\Tests\TestCase;

class FeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_do_somthing()
    {
        $this->assertTrue(true);
    }
}
