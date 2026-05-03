<?php

namespace Modules\App\TenantAuth\Controllers\Api;

use App\Http\Controllers\Controller;

use Modules\App\TenantAuth\Requests\TenantLoginRequest;
use Modules\App\TenantAuth\Requests\TenantRegisterRequest;

use Modules\App\TenantAuth\Facades\TenantAuthFacade as TenantAuth;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Modules\App\TenantUser\Resources\TenantUserResource;


class TenantAuthController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    public function login(TenantLoginRequest $request): JsonResponse
    {


        $data = TenantAuth::login($request->validated());

        if (!$data) {
            return $this->errorResponse('Unauthorized', 401);
        }

        $domain = strtolower(config('session.domain', 'localhost'));
        $duration = config('session.lifetime', 120) * 60;

        $cookie = cookie(
            'tenant_token',
            $data['access_token'],
            $duration,
            '/',
            $domain,
            true,
            true,
            false,
            'None'
        );

        return $this->successResponse($data, 'Login successful')->withCookie($cookie);
    }

    public function register(TenantRegisterRequest $request): SuccessResource
    {
        $data = TenantAuth::register($request->validated());
        return new SuccessResource($data, 'Registration successful');
    }

    public function profile(): SuccessResource
    {
        $data = TenantAuth::profile();
        return new TenantUserResource($data);
    }



}
