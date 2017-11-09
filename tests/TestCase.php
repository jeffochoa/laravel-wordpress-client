<?php

namespace Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use WordpressClient\Providers\WordpressClientServiceProvider;

class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            WordpressClientServiceProvider::class,
            //
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        return $app['config']->set('wordpress', include(__DIR__.'/../src/config/wordpress.php'));
    }
}
