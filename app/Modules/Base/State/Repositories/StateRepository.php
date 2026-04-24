<?php
namespace App\Modules\Base\State\Repositories;

use App\Modules\Base\State\Contracts\StateRepositoryInterface;
use App\Modules\Base\State\Models\State;


use App\Support\Contracts\CachedRepositoryInterface;
use App\Support\Repositories\BaseRepository;
use App\Support\Repositories\CachedRepository;
use Illuminate\Database\Eloquent\Model;

class StateRepository extends BaseRepository implements StateRepositoryInterface
{
    protected Model $model;
    protected CachedRepositoryInterface $cacheRepo;

    public function __construct()
    {
        $this->model = new State();
        $this->cacheRepo = new CachedRepository($this);
    }

    // CachedRepositoryInterface required methods
    public function allCached()
    {
        return $this->cacheRepo->allCached();
    }

    public function findCached($id)
    {
        return $this->cacheRepo->findCached($id);
    }

    public function clearAllCache()
    {
        $this->cacheRepo->clearAllCache();
    }

    public function clearCacheById($id)
    {
        $this->cacheRepo->clearCacheById($id);
    }


}
