<?php

namespace Tests\Unit;

use App\Http\Controllers\InspiringController;
use App\Services\InspiringService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InspiringControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testInspire()
    {
       $mock = \Mockery::mock(InspiringService::class);
       $mock->shouldReceive('inspire')->andReturn('名言');
       $inspiringController = new InspiringController($mock);
       self::assertEquals('名言', $inspiringController->inspire());
    }
}
