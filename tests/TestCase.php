<?php

namespace Tests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use RuntimeException;

abstract class TestCase extends BaseTestCase
{
    public function createApplication(): Application
    {
        /** @var Application $app */
        $app = parent::createApplication();

        $environment = $app->environment();
        $connection = (string) $app['config']->get('database.default');
        $database = (string) $app['config']->get("database.connections.{$connection}.database");

        if ($environment !== 'testing' || $database !== 'buffbridge_testing') {
            throw new RuntimeException(sprintf(
                'Unsafe test database configuration: environment=%s connection=%s database=%s',
                $environment,
                $connection,
                $database
            ));
        }

        return $app;
    }
}
