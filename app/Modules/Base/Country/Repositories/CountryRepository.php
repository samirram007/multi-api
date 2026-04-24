<?php
namespace App\Modules\Base\Country\Repositories;

use App\Modules\Base\Country\Contracts\CountryRepositoryInterface;
use App\Modules\Base\Country\Models\Country;


use App\Support\Contracts\CachedRepositoryInterface;
use App\Support\Repositories\BaseRepository;
use App\Support\Repositories\CachedRepository;
use Illuminate\Database\Eloquent\Model;

class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{
    protected Model $model;
    protected CachedRepositoryInterface $cacheRepo;

    public function __construct()
    {
        $this->model = new Country();
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
