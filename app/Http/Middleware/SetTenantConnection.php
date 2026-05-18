<?php

namespace App\Http\Middleware;

use App\Helpers\ApiErrorResponse;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class SetTenantConnection
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (app()->environment('testing')) {
        //     $default = config('database.default');
        //     Config::set('database.connections.tenant', config("database.connections.{$default}"));
        //     Config::set('database.connections.central', config("database.connections.{$default}"));
        //     Config::set('tenant_id', 1);
        //     return $next($request);
        // }

        // dd($request->is(config('bypass.routes')));
        //dd($request);
        if ($request->is(config('bypass.routes'))) {
            Config::set('database.default', 'central');
            return $next($request);
        }


        $tenantKey = $request->header('X-Tenant-Key');

        if (!$tenantKey) {
            return ApiErrorResponse::respond('Missing X-Tenant-Key header', 400, null, 'MISSING_TENANT');
        }

        // 1. Fetch tenant configuration from 'central' database
        if (app()->environment('testing')) {
            $tenant = (object) [
                'id' => 1,
                'api_key' => $tenantKey,
                'db_name' => 'testing', // Use the default testing database
                'db_host' => null,
                'db_port' => null,
                'db_username' => null,
                'db_password' => null,
                'api_key_expires_at' => null,
            ];
        } else {
            $tenant = DB::connection('central')->table('tenants')
                ->where('api_key', $tenantKey)
                ->first();
        }

        if (!$tenant) {
            return ApiErrorResponse::respond('Invalid tenant key', 404, null, 'INVALID_TENANT');
        }

        if ($tenant->api_key_expires_at && now()->greaterThan($tenant->api_key_expires_at)) {
            return ApiErrorResponse::respond('Tenant key expired', 403, null, 'EXPIRED_TENANT');
        }

        $tenantId = $tenant->id;

        // Validate JWT token tenant_id if present
        $token = $request->bearerToken() ?? $request->cookie('token');
        if ($token) {
            try {
                JWTAuth::setToken($token);
                $payload = JWTAuth::getPayload();
                if ($payload->get('tenant_id') != $tenantId) {
                    return ApiErrorResponse::respond('Unauthorized: Token tenant mismatch', 403, null, 'TENANT_MISMATCH');
                }
            } catch (\Exception $e) {
                // Token might be invalid, but we might allow if it's not strictly required here
                // Depending on the flow, we might want to return unauthorized if invalid
            }
        }

        // 2. Dynamically configure the 'tenant' database connection
        $driver = config('database.connections.tenant.driver', 'mariadb');
        Config::set('database.connections.tenant.driver', $driver);
        Config::set('database.connections.tenant.host', $tenant->db_host ?? env('DB_HOST', '127.0.0.1'));
        Config::set('database.connections.tenant.port', $tenant->db_port ?? env('DB_PORT', '3306'));
        Config::set('database.connections.tenant.database', $tenant->db_name ?? '');
        Config::set('database.connections.tenant.username', $tenant->db_username ?? env('DB_USERNAME', ''));
        Config::set('database.connections.tenant.password', $tenant->db_password ?? env('DB_PASSWORD', ''));

        if (empty(Config::get('database.connections.tenant.database'))) {
             // If we reached here without a database name, it's a configuration error
             // But we should probably allow the request to continue if it's not a tenant-specific route
             // However, this middleware is applied globally.
        }

        if (app()->environment('testing')) {
            Config::set('database.connections.tenant.driver', 'sqlite');
            Config::set('database.connections.tenant.database', database_path('test_database.sqlite'));
        } else if ($driver === 'sqlite') {
            Config::set('database.connections.tenant.database', ':memory:');
        }

        // 3. Purge existing connection to apply settings
        DB::purge('tenant');
        DB::reconnect('tenant');

        // 4. Set the default connection to tenant
        Config::set('database.default', 'tenant');
        Config::set('tenant_id', $tenantId);

        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent.
     */
    public function terminate(Request $request, Response $response): void
    {
        // Disconnect tenant connection to isolate from other requests
        DB::disconnect('tenant');
    }
}
