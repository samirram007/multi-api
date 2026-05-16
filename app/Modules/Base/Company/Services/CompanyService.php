<?php

namespace Modules\Base\Company\Services;

use Modules\Base\Address\Requests\AddressRequest;
use Modules\Base\Company\Contracts\CompanyServiceInterface;
use Modules\Base\Company\Facades\CompanyRepoFacade;
use Modules\Base\Company\Models\Company;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyService implements CompanyServiceInterface
{
    protected bool $useCache = true;
    protected array $resource = ['company_type', 'address', 'fiscal_years', 'currency'];

    public function withoutCache(): static
    {
        $this->useCache = false;
        return $this;
    }

    public function cache(bool $enabled = true): static
    {
        $this->useCache = $enabled;
        return $this;
    }

    protected function query()
    {
        $cache = $this->useCache;
        $this->useCache = true;
        return CompanyRepoFacade::cache($cache)->with($this->resource);
    }

    public function getAll(): Collection
    {
        return $this->query()->all();
    }

    public function getById(int $id): ?Company
    {
        return $this->query()->find($id);
    }

    public function store(array $data): Company
    {
        DB::beginTransaction();

        if (empty($data['mailing_name']) && !empty($data['name'])) {
            $data['mailing_name'] = $data['name'];
        }
        $company = CompanyRepoFacade::create($data);

        if (!empty($data['address'])) {
            $data['address']['address_type'] = 'company';
            $data['address']['addressable_type'] = 'company';
            $data['address']['addressable_id'] = $company->id;

            $rules = (new AddressRequest())->rules();
            $validatedAddress = Validator::make($data['address'], $rules)->validate();

            $company->address()->create($validatedAddress);
        }

        DB::commit();

        return $company->load($this->resource);
    }

    public function update(array $data, int $id): Company
    {
        $record = CompanyRepoFacade::update($id, $data);
        if (!empty($data['address'])) {
            $data['address']['is_primary'] = $data['address']['is_primary'] ?? false;

            $rules = (new AddressRequest())->rules();
            $validatedAddress = Validator::make($data['address'], $rules)->validate();

            if ($record->address) {
                $record->address->update($validatedAddress);
            } else {
                $data['address']['address_type'] = 'company';
                $data['address']['addressable_type'] = 'company';
                $data['address']['addressable_id'] = $record->id;
                $record->address()->create($validatedAddress);
            }
        }
        return $record->load($this->resource);
    }

    public function delete(int $id): bool
    {
        return CompanyRepoFacade::delete($id);
    }
}
