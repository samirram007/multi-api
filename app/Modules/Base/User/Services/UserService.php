<?php

namespace Modules\Base\User\Services;

use Modules\Base\User\Contracts\UserServiceInterface;
use Modules\Base\User\Models\User;

use Illuminate\Support\Str;
use Modules\Base\User\Facades\UserRepoFacade;
use Illuminate\Database\Eloquent\Collection;

class UserService implements UserServiceInterface
{
    protected bool $useCache = true;
    protected $resources = ['roles'];

    /**
     * Set the service to bypass cache for the next operation.
     */
    public function withoutCache(): static
    {
        $this->useCache = false;
        return $this;
    }

    /**
     * Set the service to use cache for the next operation.
     */
    public function cache(bool $enabled = true): static
    {
        $this->useCache = $enabled;
        return $this;
    }

    /**
     * Get a prepared repository instance with cache and relations.
     */
    protected function query()
    {
        $cache = $this->useCache;
        $this->useCache = true; // Reset service state for next call

        return UserRepoFacade::cache($cache)->with($this->resources);
    }

    public function getAll(): Collection
    {
        return $this->query()->all();
    }

    public function getById(int $id): User
    {
        return $this->query()->find($id);
    }

    public function store(array $data): User
    {
        return UserRepoFacade::create($data);
    }

    public function update(array $data, int $id): User
    {
        return UserRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return UserRepoFacade::delete($id);
    }

    public function findOrCreateSocialUser($socialUser, string $provider): User
    {
        $user = User::where('provider', $provider)
            ->where('provider_id', $socialUser->getId())
            ->first();

        if ($user) {
            $user->update([
                'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                'avatar' => $socialUser->getAvatar(),
                'email' => $socialUser->getEmail() ?? $user->email,
            ]);
            return $user;
        }

        if ($email = $socialUser->getEmail()) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->update([
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'avatar' => $socialUser->getAvatar(),
                ]);
                return $user;
            }
        }

        return UserRepoFacade::create([
            'name' => $socialUser->getName() ?? $socialUser->getNickname() ?? 'User',
            'email' => $socialUser->getEmail(),
            'provider' => $provider,
            'provider_id' => $socialUser->getId(),
            'avatar' => $socialUser->getAvatar(),
            'password' => bcrypt(Str::random(32)),
            'email_verified_at' => $socialUser->getEmail() ? now() : null,
            'status' => 'active',
        ]);
    }

    public function syncAvatar(User $user, ?string $avatarUrl): void
    {
        if ($avatarUrl && $user->avatar !== $avatarUrl) {
            $user->update(['avatar' => $avatarUrl]);
        }
    }
}
