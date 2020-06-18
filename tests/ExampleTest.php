<?php

namespace TheComet\CoreCommon\Tests;

use Orchestra\Testbench\TestCase;
use TheComet\CoreCommon\CoreCommonServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [CoreCommonServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
