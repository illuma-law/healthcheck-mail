<?php

declare(strict_types=1);

use IllumaLaw\HealthCheckMail\MailConnectivityCheck;
use Spatie\Health\Enums\Status;

it('skips when mailer is log', function () {
    config()->set('mail.default', 'log');

    $result = MailConnectivityCheck::new()->run();

    expect($result->status)->toEqual(Status::skipped())
        ->and($result->shortSummary)->toBe('Skipped');
});

it('fails when mailer configuration is missing', function () {
    config()->set('mail.default', 'smtp');
    config()->set('mail.mailers.smtp', null);

    $result = MailConnectivityCheck::new()->run();

    expect($result->status)->toEqual(Status::failed())
        ->and($result->notificationMessage)->toBe('Mailer configuration [smtp] is missing.');
});

it('fails when SMTP host is not configured', function () {
    config()->set('mail.default', 'smtp');
    config()->set('mail.mailers.smtp', ['host' => '']);

    $result = MailConnectivityCheck::new()->run();

    expect($result->status)->toEqual(Status::failed())
        ->and($result->notificationMessage)->toBe('SMTP host is not configured.');
});

it('fails when SMTP is unreachable', function () {
    config()->set('mail.default', 'smtp');
    config()->set('mail.mailers.smtp', [
        'host' => '127.0.0.1',
        'port' => 9999,
    ]);

    $result = MailConnectivityCheck::new()->run();

    expect($result->status)->toEqual(Status::failed())
        ->and($result->notificationMessage)->toContain('SMTP is unreachable');
});
