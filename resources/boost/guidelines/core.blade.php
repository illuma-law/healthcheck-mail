# illuma-law/healthcheck-mail

Checks if the `vector` extension (mail) is enabled and active in PostgreSQL.

## Usage

```php
use IllumaLaw\HealthCheckMail\MailExtensionCheck;
use Spatie\Health\Facades\Health;

Health::checks([
    MailExtensionCheck::new()
        ->required(true), // If true, FAIL if missing. If false, WARNING.
]);
```

## Configuration

Publish config: `php artisan vendor:publish --tag="healthcheck-mail-config"`

Options in `config/healthcheck-mail.php`:
- `required`: (bool) Global default for strictness.
