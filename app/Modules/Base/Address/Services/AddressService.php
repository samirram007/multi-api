<?php

namespace Modules\Base\Address\Services;

use Modules\Base\Address\Contracts\AddressServiceInterface;
use Modules\Base\Address\Facades\AddressRepoFacade;
use Modules\Base\Address\Models\Address;
use Illuminate\Database\Eloquent\Collection;

class AddressService implements AddressServiceInterface
{

    protected array $resource = ['state', 'country'];


    public function getAll(): Collection
    {
        return AddressRepoFacade::all();
    }

    public function getById(int $id): ?Address
    {
        return AddressRepoFacade::find($id);
    }

    public function store(array $data): Address
    {
        return AddressRepoFacade::create($data);
    }

    public function update(array $data, int $id): Address
    {
        return AddressRepoFacade::update($id, $data);
    }

    public function delete(int $id): bool
    {
        return AddressRepoFacade::delete($id);
    }
}
