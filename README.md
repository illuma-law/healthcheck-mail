# Healthcheck pgvector

[![Tests](https://github.com/illuma-law/healthcheck-pgvector/actions/workflows/run-tests.yml/badge.svg)](https://github.com/illuma-law/healthcheck-pgvector/actions)
[![Packagist License](https://img.shields.io/badge/Licence-MIT-blue)](http://choosealicense.com/licenses/mit/)
[![Latest Stable Version](https://img.shields.io/packagist/v/illuma-law/healthcheck-pgvector?label=Version)](https://packagist.org/packages/illuma-law/healthcheck-pgvector)

**Focused pgvector extension health check for Spatie's Laravel Health package**

This package provides a single, focused health check that verifies whether the `vector` PostgreSQL extension (pgvector) is installed in your database.

- [Installation](#installation)
- [Usage](#usage)
  - [Basic Registration](#basic-registration)
  - [Fluent Configuration](#fluent-configuration)
  - [Result States](#result-states)
- [Testing](#testing)
- [Credits](#credits)
- [License](#license)

## Installation

You can install the package via composer:

```bash
composer require illuma-law/healthcheck-pgvector
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="healthcheck-pgvector-config"
```

## Usage

### TL;DR

```php
use IllumaLaw\HealthCheckPgvector\PgvectorExtensionCheck;
use Spatie\Health\Facades\Health;

Health::checks([
    PgvectorExtensionCheck::new(),
]);
```

### Basic Registration

Register the check inside your application's health service provider or wherever you configure [Spatie Laravel Health](https://github.com/spatie/laravel-health):

```php
use IllumaLaw\HealthCheckPgvector\PgvectorExtensionCheck;
use Spatie\Health\Facades\Health;

Health::checks([
    PgvectorExtensionCheck::new(),
]);
```

### Fluent Configuration

Override the default behavior using the fluent `required()` method. When `required(true)` is set, the check will fail if the extension is missing. When `false` (default), it produces a warning.

```php
use IllumaLaw\HealthCheckPgvector\PgvectorExtensionCheck;

Health::checks([
    PgvectorExtensionCheck::new()->required(true),
]);
```

### Result States

| State | Condition |
| :--- | :--- |
| **Ok** | pgvector is installed — short summary reports the installed version |
| **Warning** | pgvector is not installed and `required` is `false` |
| **Failed** | pgvector is not installed and `required` is `true` |
| **Failed** | The database query throws an exception |

## Testing

The package includes a comprehensive test suite using Pest.

```bash
composer test
```

## Credits

- [illuma-law](https://github.com/illuma-law)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
