# Database Management Commands

This project uses custom Artisan commands for managing the `central` database and individual `tenant` databases.

## Commands

### Central Database
Perform migrations, rollbacks, and resets on the central database.

- **Migrate:** `php artisan db:central migrate`
- **Rollback:** `php artisan db:central rollback`

**Available Flags:**
- `--seed`: Seed the database after completion.
- `--refresh`: Rollback and re-migrate the database.
- `--fresh`: Drop all tables and re-migrate from scratch.

---

### Tenant Databases
Perform migrations, rollbacks, and resets on a specific tenant database identified by its ID in the `tenants` table.

- **Migrate:** `php artisan db:tenant {id} migrate`
- **Rollback:** `php artisan db:tenant {id} rollback`

**Available Flags:**
- `--seed`: Seed the database after completion.
- `--refresh`: Rollback and re-migrate the database.
- `--fresh`: Drop all tables and re-migrate from scratch.

**Note:** The `db:tenant` command automatically creates the database if it does not exist based on the `db_name` configured for the tenant.

## Examples
- Migrate and seed a tenant:
  `php artisan db:tenant 1 migrate --seed`
- Full reset of the central database:
  `php artisan db:central migrate --fresh`
