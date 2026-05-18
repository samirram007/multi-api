# App/TenantAuth Module

This module handles authentication and onboarding for tenant users.

## Responsibilities
- User registration (onboarding).
- User login and JWT token management.
- User profile retrieval.

## Architectural Patterns
- **Services:** `Modules\App\TenantAuth\Services\TenantAuthService` orchestrates authentication.
- **Facades:** `TenantAuthFacade` provides access to auth methods.
- **Dependencies:** Interacts with `TenantUser` module for data persistence.

## Routes
- `POST api/onboarding/register`: Create a new tenant user and log in.
- `POST api/onboarding/login`: Authenticate and receive a JWT.
- `GET api/onboarding/profile`: Retrieve current user profile.
