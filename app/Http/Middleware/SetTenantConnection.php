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
        // dd($request->is('api/tenants'));
        // if ($request->is('api/tenants') || $request->is('api/tenants/*') || $request->is('api/clear') || $request->is('api/onboarding/*')) {
        //     return $next($request); // bypass
        // }
        if ($request->is(config('bypass.routes'))) {
            // dd($request->is('api/onboarding/*'));
            return $next($request);
        }

        $tenantKey = $request->header('X-Tenant-Key');

        if (!$tenantKey) {
            return ApiErrorResponse::respond('Missing X-Tenant-Key header', 400, null, 'MISSING_TENANT');
        }

        // 1. Fetch tenant configuration from 'central' database
        $tenant = DB::connection('central')->table('tenants')
            ->where('api_key', $tenantKey)
            ->first();

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
        Config::set('database.connections.tenant.driver', 'mariadb');
        Config::set('database.connections.tenant.host', $tenant->db_host ?? env('DB_HOST', '127.0.0.1'));
        Config::set('database.connections.tenant.port', $tenant->db_port ?? env('DB_PORT', '3306'));
        Config::set('database.connections.tenant.database', $tenant->db_name);
        Config::set('database.connections.tenant.username', $tenant->db_username ?? env('DB_USERNAME', ''));
        Config::set('database.connections.tenant.password', $tenant->db_password ?? env('DB_PASSWORD', ''));

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
