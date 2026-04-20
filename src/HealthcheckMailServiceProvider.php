<?php

declare(strict_types=1);

namespace IllumaLaw\HealthCheckMail;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class HealthcheckMailServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('healthcheck-mail')
            ->hasConfigFile()
            ->hasTranslations();
    }
}
