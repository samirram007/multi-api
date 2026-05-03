# Database Management Flow

This document describes the step-by-step execution flow for managing the `central` and `tenant` databases.

## 1. Central Database Flow
`php artisan db:central migrate --fresh --seed`

1.  **Command Entry:** `App\Console\Commands\CentralDatabaseManager::handle()`
2.  **Command Execution:** 
    - Determines `migrate:fresh` based on flags.
    - Sets `$params` with `--path=database/migrations/central` and `--database=central`.
    - If `--seed` is passed, adds `--seeder=CentralDatabaseSeeder`.
3.  **Migration:** Laravel's `migrate` command executes, limited to the `database/migrations/central` directory using the `central` connection.
4.  **Seeding:** If seeded, `Database\Seeders\CentralDatabaseSeeder` is executed.

---

## 2. Tenant Database Flow
`php artisan db:tenant {id} migrate --fresh --seed`

1.  **Command Entry:** `App\Console\Commands\TenantDatabaseManager::handle()`
2.  **Tenant Lookup:** Finds the `Tenant` model in the `tenants` table by the provided `{id}`.
3.  **Database Provisioning:** Calls `Modules\App\Tenant\Services\TenantDatabaseService::createDatabase()` to ensure the target database exists.
4.  **Process Isolation:**
    - Spawns a **new child process** (`php artisan ...`).
    - Sets `APP_MODULE` environment variable from `$tenant->app_module`.
    - Sets `TENANT_DB_CONFIG` (JSON) containing connection credentials.
5.  **Child Process Bootstrap:**
    - Loads `bootstrap/providers.php`.
    - `bootstrap/providers.php` reads `config('app.module')` (overridden by `APP_MODULE` env) to determine which Service Providers to load.
    - Laravel loads the required `ModuleServiceProvider`s for the specific module.
6.  **Configuration Injection:** Laravel's database configuration (`config/database.php`) detects `TENANT_DB_CONFIG` and injects the dynamic credentials into the `tenant` connection.
7.  **Migration & Seeding:**
    - The child process executes the migration (targeting the `tenant` connection).
    - If `--seed` is passed, `DatabaseSeeder` runs, conditionally excluding `RoleSeeder` (if connection is 'central') and executing other appropriate seeders based on the `APP_MODULE`.
