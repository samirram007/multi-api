<?php

namespace Modules\Base\Auth\Controllers\Api;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

use Modules\Base\Auth\Requests\ChangePasswordRequest;
use Modules\Base\Auth\Requests\LoginRequest;
use Modules\Base\Auth\Requests\RegisterRequest;

use Modules\Base\User\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Modules\Base\Auth\Facades\AuthFacade as Auth;
use Modules\Base\User\Facades\UserFacade as User;

class AuthController extends Controller
{

    private string $domain;
    private int $token_expire_duration;

    public function __construct()
    {
        $this->domain = strtolower(config('session.domain', 'localhost'));

        $this->token_expire_duration = config('session.lifetime', 120) * 60;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $token = Auth::login($request->validated());

        return $this->respondWithToken($token, 'Login successful!');

    }
    public function socialCallback(string $provider)
    {
        $socialUser = Socialite::driver($provider)->stateless()->user();

        $user = User::findOrCreateSocialUser($socialUser, $provider);


        $token = Auth::loginWithUser($user); // ← uses same method!

        return $this->respondWithToken($token);
    }

    public function register(RegisterRequest $request): JsonResponse
    {

        $token = Auth::register($request->validated());
        return $this->respondWithToken($token, 'User created successfully');
    }

    public function logout(): JsonResponse
    {
        Auth::logout();
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

        $user = Auth::profile();
        return response()->json([
            'status' => 'success',

            'message' => 'User profile fetched successfully.',
            'data' => new UserResource($user),

        ]);
    }

    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        Auth::changePassword($request->validated());
        return response()->json([
            'status' => 'success',

            'message' => 'Password changed successfully.',
            'data' => [],

        ]);
    }

    public function refresh()
    {
        $token = Auth::refresh();
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

        return response()->json([
            'success' => true,
            'message' => $message,
            'accessToken' => $token,
            'tokenType' => 'bearer',
            'tokenDuration' => $this->token_expire_duration,
            'expireOn' => now()->addMinutes($this->token_expire_duration)->toIso8601String(),

        ])->withCookie($cookie);
    }
}
