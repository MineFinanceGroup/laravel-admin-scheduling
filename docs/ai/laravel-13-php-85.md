# Scheduling compatibility fork: PHP 8.5 / Laravel 13

The `laravel-13-php-85` branch preserves the existing admin scheduling extension for the Processor migration.

- Removes invalid final-private modifiers that emit PHP warnings when the cron parser loads.
- Initializes the language dictionary as an array and resolves parser exceptions to the built-in Exception class.
- Adds isolated cron parser regression tests; no scheduled tasks are executed.
- Keeps Laravel in `require-dev` for the Laravel 13 test environment. The runtime dependency on `encore/laravel-admin` supplies Laravel; the extension does not add a second framework constraint to consumers.
- Uses `laravel/framework` rather than the old `laravel/laravel` application skeleton for development.

Verified with PHP 8.5.12 / Laravel 13.39 / PHPUnit 12: 2 tests, 4 assertions. Actual admin integration and scheduled task execution still require an isolated environment.

The original project history, Composer identity, namespaces, license and embedded CronSchedule license notice are retained.

Related Processor migration: https://github.com/MineFinanceGroup/processor/pull/559.
