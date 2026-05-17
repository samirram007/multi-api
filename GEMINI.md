# Backend Development Instructions (Laravel)

This directory contains the poly-erp backend API built with Laravel.

## Architectural Patterns

- **Modules:** The project uses a modular structure under `app/Modules/`. Each module should be self-contained where possible.
    - **Documentation:** Each module MUST contain a `GEMINI.md` file describing its purpose, models, relationships, and testing standards.

### Modular Architecture Guide (Template)

All new modules should follow the structure demonstrated by `app/Modules/Base/Address`. This pattern ensures a clean separation of concerns and consistent API behavior.

#### Directory Structure
```text
app/Modules/{Domain}/{Module}/
├── Contracts/              # Interfaces for Services and Repositories
├── Controllers/Api/        # API Controllers
├── Database/               # Migrations, Seeders, and Factories
├── Facades/                # Static proxies (Service and Repo facades)
├── Models/                 # Eloquent Models
├── Providers/              # Module Service Provider
├── Repositories/           # Data access logic (extends BaseRepository)
├── Requests/               # Form Requests for validation
├── Resources/              # API Resources (extends SuccessResource/Collection)
├── Routes/                 # Module routes (api.php)
├── Services/               # Business logic (uses Repo Facades)
└── Tests/                  # Feature and Unit tests
```

#### Layer Responsibilities
- **Contracts:** Define the blueprints. All Services and Repositories MUST have an interface.
- **Repositories:** Responsible for raw data access. MUST extend `App\Support\Repositories\BaseRepository`.
- **Services:** Responsible for business logic and orchestration. MUST use Repository Facades to interact with data.
- **Facades:** Provide a clean syntax (e.g., `AddressFacade::store($data)`) for usage in Controllers.
- **Resources:** Standardize JSON output by extending `App\Http\Resources\SuccessResource` or `SuccessCollection`.
- **Providers:** Handle binding interfaces to implementations (register) and loading module-specific routes/migrations (boot).
    - *Boilerplate:* Use `register()` for `singleton` bindings and `boot()` for `loadRoutes()` and `loadMigrations()`.
- **Facades:** Define both a Service Facade (e.g., `AddressFacade`) and a Repo Facade (e.g., `AddressRepoFacade`) for internal and external module interaction.

#### Implementation Notes
- **Interface-Driven:** Always type-hint Interfaces in constructors or method signatures.
- **Dependency Injection:** Services inject Repositories via Interfaces or use Repo Facades.
- **Cache Management:** Repositories should leverage the `BaseRepository`'s caching capabilities.

- **Repositories:** Standardize data access using `App\Support\Repositories\BaseRepository`.
    - Always utilize the `Cacheable` trait for repository-level caching.
    - Explicitly call `withoutCache()` or `cache(false)` when bypassing cache is necessary for specific operations.
- **Enums:** Use PHP 8.1+ Enums for constant values, located in `app/Enums/`.
- **Traits:** Common functionality should be extracted into traits in `app/Traits/`.
- **Helpers:** Global helper functions are in `app/Helpers/`.

## Coding Standards

- Follow PSR-12 and Laravel's coding style.
- Use `laravel/pint` for code style enforcement: `vendor/bin/pint`.
- Use type hints and return types for all methods.
- Prefer using Facades for module services and repositories to maintain a clean and expressive syntax across the application.

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
- `php artisan make:mod {Domain}/{ModuleName}`: Generates a complete API module with Controller, Service, Interface, Repository, Request, Resource, Routes, Tests, Migration, and Seeder, following the project's standardized modular pattern.
