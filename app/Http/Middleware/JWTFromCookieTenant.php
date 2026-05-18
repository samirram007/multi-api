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
             throw new AuthenticationException('Unauthenticated: No token provided in header or cookie (tenant_token).', ['tenant_api']);
        }

        try {
            Auth::shouldUse('tenant_api');
            JWTAuth::setToken($token);
            $user = JWTAuth::authenticate();

            if (!$user) {
                throw new AuthenticationException('Unauthenticated: Token valid but user not found.', ['tenant_api']);
            }

            Auth::guard('tenant_api')->setUser($user);

        } catch (\PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException $e) {
            throw new AuthenticationException('Unauthenticated: Token has expired.', ['tenant_api']);
        } catch (\PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException $e) {
            throw new AuthenticationException('Unauthenticated: Token is invalid.', ['tenant_api']);
        } catch (\PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException $e) {
            throw new AuthenticationException('Unauthenticated: JWT error: ' . $e->getMessage(), ['tenant_api']);
        } catch (\Exception $e) {
            throw new AuthenticationException('Unauthenticated: ' . $e->getMessage(), ['tenant_api']);
        }

        return $next($request);
    }
}
