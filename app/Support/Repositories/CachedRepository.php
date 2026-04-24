<?php

namespace App\Support\Repositories;



use App\Support\Contracts\BaseRepositoryInterface;
use App\Support\Contracts\CachedRepositoryInterface;

use Illuminate\Support\Facades\Cache;

class CachedRepository implements CachedRepositoryInterface
{

    protected string $prefix;
    protected int $ttl; // Default to 1 hour

    public function __construct(protected BaseRepositoryInterface $repo)
    {
        $this->ttl = env('CACHE_TTL', 3600);
        $this->prefix = strtolower(class_basename($repo));
    }


    /**
     * Get a new query builder instance.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->repo->query();
    }

    // ========================
    // Wrapped Methods
    // ========================

    public function all(array $with = [])
    {
        //dump("Cache key: " . $this->key('all', $with)); // Debugging line to check cache key generation
        return $this->remember(
            $this->key('all', $with),
            fn() => $this->repo->all($with)
        );
    }

    public function find(int $id, array $with = [])
    {
        return $this->remember(
            $this->key('find', [$id, $with]),
            fn() => $this->repo->find($id, $with)
        );
    }

    public function where(array $conditions, array $with = [])
    {
        return $this->remember(
            $this->key('where', [$conditions, $with]),
            fn() => $this->repo->where($conditions, $with)
        );
    }

    public function paginate(int $perPage = 15, array $with = [])
    {
        return $this->remember(
            $this->key('paginate', [$perPage, request()->page ?? 1, $with]),
            fn() => $this->repo->paginate($perPage, $with)
        );
    }

    // ========================
    // Interface Required Methods
    // ========================

    public function allCached()
    {
        return $this->all();
    }

    public function findCached($id)
    {
        return $this->find($id);
    }

    public function clearAllCache()
    {
        $this->clear();
    }

    public function clearCacheById($id)
    {
        $this->clear();
    }

    public function create(array $data)
    {
        $result = $this->repo->create($data);
        $this->clear();
        return $result;
    }

    public function update(int $id, array $data)
    {
        $result = $this->repo->update($id, $data);
        $this->clear();
        return $result;
    }

    public function delete(int $id)
    {
        $result = $this->repo->delete($id);
        $this->clear();
        return $result;
    }




    protected function version(): int
    {
        return Cache::get($this->prefix . '_version', 1);
    }

    protected function key(string $method, array $params = []): string
    {
        return $this->prefix . '_v' . $this->version() . '_' . $method . '_' . md5(json_encode($params));
    }

    protected function remember(string $key, \Closure $callback)
    {
        return Cache::remember($key, $this->ttl, $callback);
    }



    // ========================
    // Invalidate
    // ========================

    public function clear(): void
    {
        Cache::increment($this->prefix . '_version');
    }
}
