<?php

namespace Bian\Platforms;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PlatformsServiceProvider extends PackageServiceProvider
{
    public static string $name = 'platforms';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile();
    }
}
