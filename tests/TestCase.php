<?php

namespace Andali\Rovalidator\Tests;

use Andali\Rovalidator\RovalidatorServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    protected function getPackageProviders($app)
    {
        return RovalidatorServiceProvider::class;
    }
}
