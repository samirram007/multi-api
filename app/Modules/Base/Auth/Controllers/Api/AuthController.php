<?php

namespace App\Modules\Base\Auth\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Base\Auth\Contracts\AuthServiceInterface;
use App\Modules\Base\Auth\Requests\ChangePasswordRequest;
use App\Modules\Base\Auth\Requests\LoginRequest;
use App\Modules\Base\Auth\Requests\RegisterRequest;

use App\Modules\Base\User\Contracts\UserServiceInterface;
use App\Modules\Base\User\Resources\UserResource;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    private string $domain;
    private int $token_expire_duration;
    public function __construct(
        protected AuthServiceInterface $authService,
        protected UserServiceInterface $userService
    ) {
        $this->domain = strtolower(config('session.domain', 'localhost'));
        $this->token_expire_duration = config('session.lifetime', 120) * 60;
    }
    public function login(LoginRequest $request): JsonResponse
    {
        $token = $this->authService->login($request->validated());
        return $this->respondWithToken($token, 'Login successful!');

    }
    public function socialCallback(string $provider)
    {
        $socialUser = Socialite::driver($provider)->stateless()->user();

        $user = $this->userService->findOrCreateFromProvider($socialUser, $provider);

        $token = $this->authService->loginWithUser($user); // ← uses same method!

        return $this->respondWithToken($token);
    }

    public function register(RegisterRequest $request): JsonResponse
    {

        $token = $this->authService->register($request->validated());
        return $this->respondWithToken($token, 'User created successfully');
    }



    public function logout(): JsonResponse
    {
        $this->authService->logout();
        $cookie = cookie('token', '', time() - 3600, '/', $this->domain, true, true, 'None');

        return response()->json(['message' => 'Logged out'])->withCookie($cookie);
    }
    public function cleanLogout(): JsonResponse
    {
        $cookie = cookie('token', '', time() - 3600, '/', $this->domain, true, true, 'None');

        return response()->json(['message' => 'Logged out'])->withCookie($cookie);
    }



    public function profile(): JsonResponse
    {

        $user = $this->authService->profile();
        return response()->json([
            'status' => 'success',
            'message' => 'User profile fetched successfully.',
            'data' => new UserResource($user),
        ]);
    }
    public function profile2(): JsonResponse
    {

        // $user = $this->authService->profile();
        return response()->json([
            'status' => 'success',
            'message' => 'User profile fetched successfully.',
            'data' => [],
        ]);
    }
    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $this->authService->changePassword($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Password changed successfully.',
            'data' => [],
        ]);
    }



    public function refresh()
    {
        $token = $this->authService->refresh();
        return $this->respondWithToken($token, 'Token refreshed successfully!');

    }

    protected function respondWithToken(string $token, string $message = 'Authenticated successfully!')
    {
        $cookie = cookie(
            'token',
            $token,
            $this->token_expire_duration,
            '/',
            $this->domain,
            true,
            true,
            true,
            'None'
        );
        Log::info('Auth token issued', ['token' => $token]);

        return response()->json([
            'status' => 'success',
            'message' => $message,
            'tokenDuration' => $this->token_expire_duration,
            'expireOn' => now()->addMinutes($this->token_expire_duration)->toIso8601String(),
        ])->withCookie($cookie);
    }
}
