<?php

namespace Modules\App\Tenant\Middleware;

use Modules\App\Tenant\Models\Tenant;
use Modules\App\Tenant\Services\TenantManager;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdentifyTenant
{
    public function __construct(protected TenantManager $tenantManager)
    {
    }

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tenantCode = $request->header('X-Tenant-Code');

        if ($tenantCode) {
            $tenant = Tenant::where('code', $tenantCode)->first();

            if ($tenant) {
                $this->tenantManager->switchToTenant($tenant);
            } else {
                return response()->json(['error' => 'Tenant not found.'], 404);
            }
        }

        return $next($request);
    }
}
