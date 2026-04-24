<?php

namespace App\Modules\Base\Company\Services;

use App\Modules\Base\Address\Requests\AddressRequest;
use App\Modules\Base\Company\Contracts\CompanyServiceInterface;
use App\Modules\Base\Company\Models\Company;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyService implements CompanyServiceInterface
{
    protected $resource = ['company_type', 'address', 'fiscal_years', 'currency'];

    public function getAll(): Collection
    {

        return Company::with($this->resource)->get();


    }

    public function getById(int $id): ?Company
    {

        return Company::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Company
    {

        // transaction

        DB::beginTransaction();

        if (empty($data['mailing_name']) && !empty($data['name'])) {
            $data['mailing_name'] = $data['name'];
        }
        $company = Company::create($data);

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
        $record = Company::findOrFail($id);
        $record->update($data);
        if (!empty($data['address'])) {
            $data['address']['is_primary'] = $data['address']['is_primary'] ?? false;

            $rules = (new AddressRequest())->rules();
            $validatedAddress = Validator::make($data['address'], $rules)->validate();

            //  dd($data['address']);
            if ($record->address) {
                $record->address->update($validatedAddress);
            } else {
                $data['address']['address_type'] = 'company';
                $data['address']['addressable_type'] = 'company';
                $data['address']['addressable_id'] = $record->id;
                $record->address()->create($validatedAddress);
            }
        }
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Company::findOrFail($id);
        return $record->delete();
    }
}
