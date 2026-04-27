<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;

it('publishes the config file under the correct tag', function () {
    $this->artisan('vendor:publish', [
        '--tag' => 'healthcheck-mail-config',
        '--force' => true,
    ])->assertExitCode(0);

    expect(config_path('healthcheck-mail.php'))->toBeFile();

    File::delete(config_path('healthcheck-mail.php'));
});

it('loads config with the correct default', function () {
    expect(config('healthcheck-mail.required'))->toBeFalse();
});
