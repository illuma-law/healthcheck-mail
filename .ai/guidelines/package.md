---
description: SMTP connectivity health check for Spatie Laravel Health
---

# healthcheck-mail

SMTP connectivity health check for `spatie/laravel-health`. Verifies the configured mail host is reachable via TCP.

## Namespace

`IllumaLaw\HealthCheckMail`

## Key Check

- `MailConnectivityCheck` — tests TCP connection to SMTP host:port; measures latency

## Registration

```php
use IllumaLaw\HealthCheckMail\MailConnectivityCheck;
use Spatie\Health\Facades\Health;

Health::checks([
    MailConnectivityCheck::new(),
]);
```

## Notes

- Automatically skips the check when the default mailer is `log`, `array`, `fail`, or `null`.
- Uses the `MAIL_HOST` and `MAIL_PORT` environment variables from Laravel's mail config.
- Reports latency in the health meta data.
