# Backend Development Instructions (Laravel)

This directory contains the SchoolOS backend API built with Laravel.

## Architectural Patterns

- **Modules:** The project uses a modular structure under `app/Modules/`. Each module should be self-contained where possible.
- **Enums:** Use PHP 8.1+ Enums for constant values, located in `app/Enums/`.
- **Traits:** Common functionality should be extracted into traits in `app/Traits/`.
- **Helpers:** Global helper functions are in `app/Helpers/`.

## Coding Standards

- Follow PSR-12 and Laravel's coding style.
- Use `laravel/pint` for code style enforcement: `vendor/bin/pint`.
- Use type hints and return types for all methods.
- Prefer constructor injection over the `app()` helper or facades where appropriate for testability.

## Database
- Modules are in `app/Modules/`.
- Migrations are in `app/Modules/**/**/database/migrations/`.
- Seeders are in `app/Modules/**/**/database/seeders/`.
- Models are in `app/Modules/**/**//Models/` or within Module directories.
- Ensure any schema changes are also communicated to the frontend team as they use Drizzle ORM.

## Testing

- We use Pest for testing.
- Run tests with `php artisan test`.
- Add feature tests for all new API endpoints in `tests/Feature/`.
- Unit tests go in `tests/Unit/`.

## API Development

- Define routes in `routes/api.php`.
- Define routes in `api/Modules/**/**/routes/api.php`.
- Use API Resources for transforming models to JSON responses.
- Authentication is handled via JWT and Sanctum.

## Tools

- `php artisan boost:install` (if available) provides additional agent tools.
- `php artisan ide-helper:generate` and related commands for better IDE/Agent support.
