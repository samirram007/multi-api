<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;


class JWTFromCookieTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken() ?? $request->cookie('tenant_token');

        if (!$token) {
            throw new AuthenticationException('No token provided.', ['api']);
        }

        try {
            Auth::shouldUse('tenant_api');
            JWTAuth::setToken($token);
            $tenantUser = JWTAuth::authenticate();

            if ($tenantUser) {
                Auth::guard('tenant_api')->login($tenantUser);
            } else {
                throw new AuthenticationException('Tenant User Unauthenticated.');
            }
        } catch (JWTException $e) {
            throw new AuthenticationException('Invalid or expired token.', ['tenant_api']);
        }

        return $next($request);
    }
}
