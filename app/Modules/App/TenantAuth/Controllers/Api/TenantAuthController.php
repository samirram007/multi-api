<?php

namespace Modules\App\TenantAuth\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\App\TenantAuth\Requests\TenantLoginRequest;
use Modules\App\TenantAuth\Requests\TenantRegisterRequest;
use Modules\App\TenantAuth\Facades\TenantAuthFacade as TenantAuth;
use App\Http\Resources\SuccessResource;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Modules\App\TenantUser\Resources\TenantUserResource;

class TenantAuthController extends Controller
{
    use ApiResponseTrait;

    public function login(TenantLoginRequest $request): JsonResponse
    {
        $data = TenantAuth::login($request->validated());

        if (!$data) {
            return $this->errorResponse('Unauthorized', 401);
        }

        $domain = strtolower(config('session.domain', 'localhost'));
        $duration = config('session.lifetime', 120) * 60;
        $secure = config('session.secure', true);

        $cookie = cookie(
            'tenant_token',
            $data['access_token'],
            $duration,
            '/',
            $domain,
            $secure,
            true, // HttpOnly
            false,
            'None'
        );

        return $this->successResponse($data, 'Login successful')->withCookie($cookie);
    }

    public function register(TenantRegisterRequest $request): JsonResponse
    {
        $data = TenantAuth::register($request->validated());
        
        $domain = strtolower(config('session.domain', 'localhost'));
        $duration = config('session.lifetime', 120) * 60;
        $secure = config('session.secure', true);

        $cookie = cookie(
            'tenant_token',
            $data['access_token'],
            $duration,
            '/',
            $domain,
            $secure,
            true, // HttpOnly
            false,
            'None'
        );

        return $this->successResponse($data, 'Registration successful', 201)->withCookie($cookie);
    }

    public function profile(): SuccessResource
    {
        $data = TenantAuth::profile();
        return new TenantUserResource($data);
    }

    public function logout(): JsonResponse
    {
        $domain = strtolower(config('session.domain', 'localhost'));
        $secure = config('session.secure', true);

        $cookie = cookie(
            'tenant_token',
            null,
            -1,
            '/',
            $domain,
            $secure,
            true, // HttpOnly
            false,
            'None'
        );

        return $this->successResponse(null, 'Logout successful')->withCookie($cookie);
    }
}
