# App/TenantUser Module

This module manages tenant users in the central database.

## Responsibilities
- Manage tenant user accounts.
- Provide data access for authentication.

## Architectural Patterns
- **Repositories:** Uses `Modules\App\TenantUser\Repositories\TenantUserRepository`.
- **Services:** Business logic in `Modules\App\TenantUser\Services\TenantUserService`.
- **Facades:** `TenantUserFacade` (Service) and `TenantUserRepoFacade` (Repository).

## Connection
- This model uses the `central` connection as it resides in the main database to manage access across tenants.
