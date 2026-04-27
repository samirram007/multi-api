<?php

namespace Modules\Base\Country\Services;

use Modules\Base\Country\Contracts\CountryRepositoryInterface;
use Modules\Base\Country\Contracts\CountryServiceInterface;

use Modules\Base\Country\Facades\CountryRepoFacade;
use Modules\Base\Country\Models\Country;
use Illuminate\Database\Eloquent\Collection;

class CountryService implements CountryServiceInterface
{
    protected $resource = ['states'];


    public function __construct()
    {

    }

    public function getAll(): Collection
    {
        return CountryRepoFacade::all($this->resource);
    }

    public function getById(int $id): ?Country
    {
        return CountryRepoFacade::find($id, $this->resource);
    }

    public function store(array $data): Country
    {
        return CountryRepoFacade::create($data);
    }

    public function update(array $data, int $id): Country
    {
        return CountryRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return CountryRepoFacade::delete($id);
    }
}
