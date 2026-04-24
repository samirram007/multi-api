# Laravel Modular Repository & Caching Flow

This document describes the step-by-step flow from an HTTP request (route) to the repository, service, and cache layer in your modular Laravel application.

---

## 1. HTTP Request & Routing
- A client sends an HTTP request (e.g., GET /api/countries).
- The request is routed via `routes/api.php` to the appropriate controller method (e.g., `CountryController@index`).

## 2. Controller Layer
- The controller (e.g., `CountryController`) receives the request.
- It calls a method on the Facade (e.g., `CountryFacade::getAll()`), which internally delegates to the service layer.

## 3. Service Layer
- The service (e.g., `CountryService`) implements business logic and orchestrates data access.
- It depends on a repository interface (e.g., `CountryRepositoryInterface`), injected via the constructor.
- Example: `getAll()` calls `$this->repo->all($this->resource)`.

## 4. Repository Layer
- The repository (e.g., `CountryRepository`) implements `CountryRepositoryInterface` (which extends `CachedRepositoryInterface`).
- It extends `BaseRepository` for standard Eloquent operations.
- It contains a `CachedRepository` instance to handle caching.
- Cache methods (`allCached`, `findCached`, etc.) delegate to `CachedRepository`.

## 5. CachedRepository Layer
- `CachedRepository` implements `CachedRepositoryInterface` and wraps a `BaseRepository` instance.
- For read operations (e.g., `all`, `find`):
    - Checks if the result is cached using a unique cache key (based on method, params, and version).
    - If cached, returns the cached data.
    - If not, fetches from the database via the repository, caches the result, and returns it.
- For write operations (e.g., `create`, `update`, `delete`):
    - Performs the operation via the repository.
    - Invalidates the cache by incrementing a version key, so subsequent reads get fresh data.

## 6. Model Layer
- The repository uses Eloquent models (e.g., `Country`) for database access.
- Models may trigger cache invalidation via events (optional, for advanced setups).

## 7. Cache Layer
- Laravel's Cache facade is used (e.g., Redis, file, or memory driver).
- Cache keys are versioned to allow easy invalidation.
- Data is cached for a configurable TTL (default: 600 seconds).

---

## Example Flow: GET /api/countries
1. **Route**: `/api/countries` → `CountryController@index`
2. **Controller**: Calls `$countryService->getAll()`
3. **Service**: Calls `$countryRepo->all($with)`
4. **Repository**: Calls `$cacheRepo->allCached()`
5. **CachedRepository**:
    - Checks cache for countries list.
    - If not cached, fetches from DB, caches result, returns data.
6. **Response**: Data returned to client.

---

## Example Flow: POST /api/countries
1. **Route**: `/api/countries` → `CountryController@store`
2. **Controller**: Calls `$countryService->store($data)`
3. **Service**: Calls `$countryRepo->create($data)`
4. **Repository**: Calls `$cacheRepo->create($data)`
5. **CachedRepository**:
    - Creates country in DB via repository.
    - Invalidates cache by incrementing version.
6. **Response**: New country returned to client.

---

## Key Classes & Interfaces
- **Controller**: Handles HTTP requests.
- **Service**: Business logic, depends on repository interface.
- **Repository**: Data access, implements interface, delegates cache to CachedRepository.
- **CachedRepository**: Handles caching logic, wraps repository.
- **Model**: Eloquent ORM for DB.
- **Cache**: Laravel Cache facade.

---

## Extending for New Modules
- Create new model, repository, service, and controller for each module.
- Implement repository interface extending `CachedRepositoryInterface`.
- Use `CachedRepository` for caching logic.
- Register bindings in service providers.

---

## Diagram

```
[Route] → [Controller] → [Service] → [Repository] → [CachedRepository] → [Model/DB]
                                             ↑
                                         [Cache]
```

---

## Notes
- All cache invalidation is version-based for simplicity and reliability.
- All repository methods are interface-driven for testability and flexibility.
- Modular structure allows easy extension for new domains.
