<?php

namespace App\Modules\Base\Company\Resources;

use App\Http\Resources\SuccessResource;
use App\Modules\Base\CompanyType\Resources\CompanyTypeResource;

use App\Modules\Base\Currency\Resources\CurrencyResource;
use App\Modules\Base\FiscalYear\Resources\FiscalYearCollection;

use App\Modules\Base\Address\Resources\AddressResource;

use Illuminate\Http\Request;


class CompanyResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        // dd($this->resource->toArray());
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mailingName' => $this->mailing_name,
            'code' => $this->code,
            'phoneNo' => $this->phone_no,
            'mobileNo' => $this->mobile_no,
            'email' => $this->email,
            'website' => $this->website,
            'cinNo' => $this->cin_no,
            'tinNo' => $this->tin_no,
            'tanNo' => $this->tan_no,
            'gstNo' => $this->gst_no,
            'panNo' => $this->pan_no,
            'logo' => $this->logo,
            'currencyId' => $this->currency_id,
            'currency' => new CurrencyResource($this->whenLoaded('currency')),

            'status' => $this->status,
            'isGroupCompany' => $this->is_group_company,
            'companyTypeId' => $this->company_type_id,
            'companyType' => new CompanyTypeResource($this->whenLoaded('company_type')),
            'fiscalYears' => new FiscalYearCollection($this->whenLoaded('fiscal_years')),
            'address' => new AddressResource($this->whenLoaded('address')),
        ];
    }
}
