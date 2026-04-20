<?php

declare(strict_types=1);

namespace IllumaLaw\HealthCheckMail\Tests;

use IllumaLaw\HealthCheckMail\HealthcheckMailServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\Health\HealthServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            HealthServiceProvider::class,
            HealthcheckMailServiceProvider::class,
        ];
    }
}
