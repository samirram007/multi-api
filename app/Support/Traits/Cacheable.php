<?php

namespace App\Support\Traits;

use Illuminate\Support\Facades\Cache;
use Modules\App\Tenant\Services\TenantManager;

trait Cacheable
{
    protected bool $useCache = true;
    protected ?TenantManager $tenantManager = null;

    /**
     * Enable or disable cache for the current request/chain.
     */
    public function cache(bool $enabled = true): static
    {
        $this->useCache = $enabled;
        return $this;
    }

    /**
     * Disable cache for the current request/chain.
     */
    public function withoutCache(): static
    {
        return $this->cache(false);
    }

    /**
     * Get the tenant manager instance.
     */
    protected function getTenantManager(): TenantManager
    {
        if (!$this->tenantManager) {
            $this->tenantManager = app(TenantManager::class);
        }
        return $this->tenantManager;
    }

    /**
     * Get the cache key prefix based on tenant and repository name.
     */
    protected function getCachePrefix(): string
    {
        $tenantId = $this->getTenantManager()->getCurrentTenant()?->id ?? 'central';
        return 'tenant_' . $tenantId . '_' . strtolower(class_basename($this));
    }

    /**
     * Get the current cache version.
     */
    protected function getCacheVersion(): int
    {
        return Cache::get($this->getCachePrefix() . '_version', 1);
    }

    /**
     * Generate a unique cache key for a method and its parameters.
     */
    protected function getCacheKey(string $method, array $params = []): string
    {
        return $this->getCachePrefix() . 
               '_v' . $this->getCacheVersion() . 
               '_' . $method . 
               '_' . md5(json_encode($params));
    }

    /**
     * Execute the callback and cache the result if enabled.
     */
    protected function remember(string $key, \Closure $callback)
    {
        if (!$this->useCache) {
            $this->useCache = true; // Reset for next call
            return $callback();
        }

        return Cache::remember($key, env('CACHE_TTL', 3600), $callback);
    }

    /**
     * Invalidate all cache for this repository by incrementing the version.
     */
    public function clearCache(): void
    {
        Cache::increment($this->getCachePrefix() . '_version');
    }
}
