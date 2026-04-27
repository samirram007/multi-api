<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Modules\Aipt\AccountGroup\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $code
 * @property int|null $parent_id
 * @property int|null $account_nature_id
 * @property string|null $description
 * @property string $status
 * @property string|null $icon
 * @property int $is_system
 * @property int $is_hidden
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Aipt\AccountLedger\Models\AccountLedger> $account_ledgers
 * @property-read int|null $account_ledgers_count
 * @property-read \Modules\Aipt\AccountNature\Models\AccountNature|null $account_nature
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup whereAccountNatureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup whereIsHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup whereIsSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountGroup whereUpdatedAt($value)
 */
	class AccountGroup extends \Eloquent {}
}

namespace Modules\Aipt\AccountLedger\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int|null $account_group_id
 * @property string|null $description
 * @property string $status
 * @property string|null $icon
 * @property int $is_system
 * @property int $is_hidden
 * @property int|null $ledgerable_id
 * @property string|null $ledgerable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Aipt\AccountGroup\Models\AccountGroup|null $account_group
 * @property-read \Modules\Aipt\AccountNature\Models\AccountNature|null $account_nature
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $ledgerable
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger whereAccountGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger whereIsHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger whereIsSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger whereLedgerableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger whereLedgerableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountLedger whereUpdatedAt($value)
 */
	class AccountLedger extends \Eloquent {}
}

namespace Modules\Aipt\AccountNature\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property string $status
 * @property string|null $icon
 * @property string $accounting_effect
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Aipt\AccountGroup\Models\AccountGroup> $account_groups
 * @property-read int|null $account_groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Aipt\AccountLedger\Models\AccountLedger> $account_ledgers
 * @property-read int|null $account_ledgers_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountNature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountNature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountNature query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountNature whereAccountingEffect($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountNature whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountNature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountNature whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountNature whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountNature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountNature whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountNature whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccountNature whereUpdatedAt($value)
 */
	class AccountNature extends \Eloquent {}
}

namespace Modules\App\App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $app_module
 * @property string|null $description
 * @property string|null $database
 * @property string $status
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|App newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|App newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|App query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|App whereAppModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|App whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|App whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|App whereDatabase($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|App whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|App whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|App whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|App whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|App whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|App whereUpdatedAt($value)
 */
	class App extends \Eloquent {}
}

namespace Modules\App\Menu\Models{
/**
 * @property int $id
 * @property int|null $parent_id
 * @property string $menu_type
 * @property int $app_id
 * @property string $title
 * @property string $link
 * @property int|null $app_module_id
 * @property string $status
 * @property string|null $icon
 * @property int|null $role_id
 * @property int|null $order_index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereAppId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereAppModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereMenuType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereOrderIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Menu whereUpdatedAt($value)
 */
	class Menu extends \Eloquent {}
}

namespace Modules\Base\Address\Models{
/**
 * @property int $id
 * @property string $line1
 * @property string|null $line2
 * @property string|null $landmark
 * @property string|null $post_office
 * @property string|null $district
 * @property string $city
 * @property int $state_id
 * @property int $country_id
 * @property string|null $postal_code
 * @property numeric|null $latitude
 * @property numeric|null $longitude
 * @property string|null $address_type
 * @property bool $is_primary
 * @property int $addressable_id
 * @property string $addressable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $addressable
 * @property-read \Modules\Base\Country\Models\Country|null $country
 * @property-read \Modules\Base\State\Models\State|null $state
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereAddressType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereAddressableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereAddressableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereIsPrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereLandmark($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address wherePostOffice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereUpdatedAt($value)
 */
	class Address extends \Eloquent {}
}

namespace Modules\Base\AppModuleFeature\Models{
/**
 * @property int $id
 * @property int $app_module_id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property string $status
 * @property string|null $action
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Base\AppModule\Models\AppModule|null $module
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Base\RolePermission\Models\RolePermission> $role_permissions
 * @property-read int|null $role_permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModuleFeature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModuleFeature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModuleFeature query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModuleFeature whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModuleFeature whereAppModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModuleFeature whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModuleFeature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModuleFeature whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModuleFeature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModuleFeature whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModuleFeature whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModuleFeature whereUpdatedAt($value)
 */
	class AppModuleFeature extends \Eloquent {}
}

namespace Modules\Base\AppModule\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property string $status
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Base\AppModuleFeature\Models\AppModuleFeature> $app_module_features
 * @property-read int|null $app_module_features_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModule query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModule whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModule whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModule whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModule whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModule whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppModule whereUpdatedAt($value)
 */
	class AppModule extends \Eloquent {}
}

namespace Modules\Base\CompanyType\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $code
 * @property string|null $description
 * @property \App\Enums\ActiveInactive $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Base\Company\Models\Company> $companies
 * @property-read int|null $companies_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyType whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyType whereUpdatedAt($value)
 */
	class CompanyType extends \Eloquent {}
}

namespace Modules\Base\Company\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $mailing_name
 * @property string|null $phone_no
 * @property string|null $mobile_no
 * @property string|null $email
 * @property string|null $website
 * @property int $company_type_id
 * @property string|null $cin_no
 * @property string|null $tin_no
 * @property string|null $tan_no
 * @property string|null $gst_no
 * @property string|null $pan_no
 * @property string|null $logo
 * @property int $currency_id
 * @property bool $is_group_company
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Base\Address\Models\Address|null $address
 * @property-read \Modules\Base\CompanyType\Models\CompanyType|null $company_type
 * @property-read \Modules\Base\Currency\Models\Currency|null $currency
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Base\FiscalYear\Models\FiscalYear> $fiscal_years
 * @property-read int|null $fiscal_years_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCinNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCompanyTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereGstNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereIsGroupCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereMailingName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereMobileNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company wherePanNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company wherePhoneNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereTanNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereTinNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereWebsite($value)
 */
	class Company extends \Eloquent {}
}

namespace Modules\Base\Country\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $phone_code
 * @property string|null $iso_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Base\State\Models\State> $states
 * @property-read int|null $states_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereIsoCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country wherePhoneCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereUpdatedAt($value)
 */
	class Country extends \Eloquent {}
}

namespace Modules\Base\Currency\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $symbol Symbol for the currency (e.g., $, €, £)
 * @property string|null $country
 * @property string|null $exchange_rate
 * @property string $decimal_places
 * @property string $status
 * @property string $format
 * @property string $thousands_separator
 * @property string $decimal_separator
 * @property string $symbol_position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereDecimalPlaces($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereDecimalSeparator($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereSymbolPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereThousandsSeparator($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereUpdatedAt($value)
 */
	class Currency extends \Eloquent {}
}

namespace Modules\Base\FiscalYear\Models{
/**
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property string|null $assessment_year
 * @property \App\Enums\ActiveInactive $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Base\Company\Models\Company|null $company
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FiscalYear newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FiscalYear newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FiscalYear query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FiscalYear whereAssessmentYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FiscalYear whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FiscalYear whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FiscalYear whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FiscalYear whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FiscalYear whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FiscalYear whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FiscalYear whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FiscalYear whereUpdatedAt($value)
 */
	class FiscalYear extends \Eloquent {}
}

namespace Modules\Base\RolePermission\Models{
/**
 * @property int $id
 * @property int $role_id
 * @property int $app_module_feature_id
 * @property bool $is_allowed
 * @property-read \Modules\Base\AppModuleFeature\Models\AppModuleFeature|null $feature
 * @property-read \Modules\Base\Role\Models\Role|null $role
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RolePermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RolePermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RolePermission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RolePermission whereAppModuleFeatureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RolePermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RolePermission whereIsAllowed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RolePermission whereRoleId($value)
 */
	class RolePermission extends \Eloquent {}
}

namespace Modules\Base\Role\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $status
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Base\RolePermission\Models\RolePermission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Base\User\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereStatus($value)
 */
	class Role extends \Eloquent {}
}

namespace Modules\Base\State\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int|null $country_id
 * @property string|null $gst_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Base\Country\Models\Country|null $country
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereGstCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|State whereUpdatedAt($value)
 */
	class State extends \Eloquent {}
}

namespace Modules\Base\UserFiscalYear\Models{
/**
 * @property int $id
 * @property string $user_id
 * @property string $fiscal_year_id
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property \Illuminate\Support\Carbon $current_date
 * @property-read \Modules\Base\FiscalYear\Models\FiscalYear|null $fiscal_year
 * @property-read \Modules\Base\User\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFiscalYear newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFiscalYear newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFiscalYear query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFiscalYear whereCurrentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFiscalYear whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFiscalYear whereFiscalYearId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFiscalYear whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFiscalYear whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserFiscalYear whereUserId($value)
 */
	class UserFiscalYear extends \Eloquent {}
}

namespace Modules\Base\UserRole\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property-read \Modules\Base\Role\Models\Role|null $role
 * @property-read \Modules\Base\User\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole whereUserId($value)
 */
	class UserRole extends \Eloquent {}
}

namespace Modules\Base\User\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $username
 * @property string $user_type
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property int|null $userable_id
 * @property string $userable_type
 * @property string $status
 * @property string|null $provider
 * @property string|null $provider_id
 * @property string|null $avatar
 * @property string|null $provider_token
 * @property string|null $provider_refresh_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Base\Role\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Modules\Base\UserFiscalYear\Models\UserFiscalYear|null $user_fiscal_year
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $userable
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProviderRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProviderToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUserableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUserableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUsername($value)
 */
	class User extends \Eloquent implements \PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject {}
}

namespace Modules\Document\Document\Models{
/**
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Document> $children
 * @property-read int|null $children_count
 * @property-read string $full_path
 * @property-read array $parents
 * @property-read Document|null $parent
 * @property-read \Modules\Base\User\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Document onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Document withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Document withoutTrashed()
 */
	class Document extends \Eloquent {}
}

namespace Modules\Document\SharedDocument\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SharedDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SharedDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SharedDocument query()
 */
	class SharedDocument extends \Eloquent {}
}

namespace Modules\Help\HelpCenter\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HelpCenter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HelpCenter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HelpCenter query()
 */
	class HelpCenter extends \Eloquent {}
}

namespace Modules\Hospital\Doctor\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor query()
 */
	class Doctor extends \Eloquent {}
}

namespace Modules\Hospital\Patient\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient query()
 */
	class Patient extends \Eloquent {}
}

namespace Modules\Hotel\Amenities\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Amenities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Amenities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Amenities query()
 */
	class Amenities extends \Eloquent {}
}

namespace Modules\Hotel\Booking\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking query()
 */
	class Booking extends \Eloquent {}
}

namespace Modules\Maintenance\Backup\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Backup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Backup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Backup query()
 */
	class Backup extends \Eloquent {}
}

namespace Modules\Maintenance\Restore\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Restore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Restore newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Restore query()
 */
	class Restore extends \Eloquent {}
}

namespace Modules\Pathology\Doctor\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor query()
 */
	class Doctor extends \Eloquent {}
}

namespace Modules\Pathology\Patient\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient query()
 */
	class Patient extends \Eloquent {}
}

namespace Modules\Pathology\Test\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Test newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Test newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Test query()
 */
	class Test extends \Eloquent {}
}

namespace Modules\Payroll\Department\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department query()
 */
	class Department extends \Eloquent {}
}

namespace Modules\Payroll\Designation\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Designation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Designation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Designation query()
 */
	class Designation extends \Eloquent {}
}

namespace Modules\Payroll\EmployeeGroup\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeGroup query()
 */
	class EmployeeGroup extends \Eloquent {}
}

namespace Modules\Payroll\Employee\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee query()
 */
	class Employee extends \Eloquent {}
}

namespace Modules\Resturant\Booking\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Booking query()
 */
	class Booking extends \Eloquent {}
}

namespace Modules\Resturant\Order\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 */
	class Order extends \Eloquent {}
}

namespace Modules\School\AcademicClass\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicClass newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicClass newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicClass query()
 */
	class AcademicClass extends \Eloquent {}
}

namespace Modules\School\AcademicSession\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicSession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicSession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicSession query()
 */
	class AcademicSession extends \Eloquent {}
}

namespace Modules\School\AcademicStandard\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicStandard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicStandard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AcademicStandard query()
 */
	class AcademicStandard extends \Eloquent {}
}

namespace Modules\School\Admission\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Admission query()
 */
	class Admission extends \Eloquent {}
}

namespace Modules\School\Building\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Building newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Building newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Building query()
 */
	class Building extends \Eloquent {}
}

namespace Modules\School\Campus\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campus query()
 */
	class Campus extends \Eloquent {}
}

namespace Modules\School\EducationBoard\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducationBoard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducationBoard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducationBoard query()
 */
	class EducationBoard extends \Eloquent {}
}

namespace Modules\School\ExaminationResult\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExaminationResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExaminationResult newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExaminationResult query()
 */
	class ExaminationResult extends \Eloquent {}
}

namespace Modules\School\ExaminationSchedule\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExaminationSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExaminationSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExaminationSchedule query()
 */
	class ExaminationSchedule extends \Eloquent {}
}

namespace Modules\School\ExaminationStandard\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExaminationStandard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExaminationStandard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExaminationStandard query()
 */
	class ExaminationStandard extends \Eloquent {}
}

namespace Modules\School\ExaminationType\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExaminationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExaminationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExaminationType query()
 */
	class ExaminationType extends \Eloquent {}
}

namespace Modules\School\Examination\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Examination newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Examination newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Examination query()
 */
	class Examination extends \Eloquent {}
}

namespace Modules\School\ExpenseGroup\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExpenseGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExpenseGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExpenseGroup query()
 */
	class ExpenseGroup extends \Eloquent {}
}

namespace Modules\School\ExpenseHead\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExpenseHead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExpenseHead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExpenseHead query()
 */
	class ExpenseHead extends \Eloquent {}
}

namespace Modules\School\Expense\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expense newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expense newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Expense query()
 */
	class Expense extends \Eloquent {}
}

namespace Modules\School\FeeHead\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeHead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeHead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeHead query()
 */
	class FeeHead extends \Eloquent {}
}

namespace Modules\School\FeeItemMonth\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeItemMonth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeItemMonth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeItemMonth query()
 */
	class FeeItemMonth extends \Eloquent {}
}

namespace Modules\School\FeeItem\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeItem query()
 */
	class FeeItem extends \Eloquent {}
}

namespace Modules\School\FeeRule\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeRule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeRule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeRule query()
 */
	class FeeRule extends \Eloquent {}
}

namespace Modules\School\FeeTemplate\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeTemplate query()
 */
	class FeeTemplate extends \Eloquent {}
}

namespace Modules\School\Fee\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Fee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Fee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Fee query()
 */
	class Fee extends \Eloquent {}
}

namespace Modules\School\Floor\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Floor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Floor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Floor query()
 */
	class Floor extends \Eloquent {}
}

namespace Modules\School\Guardian\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Guardian newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Guardian newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Guardian query()
 */
	class Guardian extends \Eloquent {}
}

namespace Modules\School\IncomeGroup\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IncomeGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IncomeGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IncomeGroup query()
 */
	class IncomeGroup extends \Eloquent {}
}

namespace Modules\School\Student\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student query()
 */
	class Student extends \Eloquent {}
}

namespace Modules\School\Teacher\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Teacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Teacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Teacher query()
 */
	class Teacher extends \Eloquent {}
}

namespace Modules\Support\SLAPolicyAction\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SLAPolicyAction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SLAPolicyAction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SLAPolicyAction query()
 */
	class SLAPolicyAction extends \Eloquent {}
}

namespace Modules\Support\SLAPolicyRule\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SLAPolicyRule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SLAPolicyRule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SLAPolicyRule query()
 */
	class SLAPolicyRule extends \Eloquent {}
}

namespace Modules\Support\SLAPolicy\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SLAPolicy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SLAPolicy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SLAPolicy query()
 */
	class SLAPolicy extends \Eloquent {}
}

namespace Modules\Support\TicketEventType\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketEventType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketEventType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketEventType query()
 */
	class TicketEventType extends \Eloquent {}
}

namespace Modules\Support\TicketEvent\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketEvent query()
 */
	class TicketEvent extends \Eloquent {}
}

namespace Modules\Support\TicketMaster\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketMaster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketMaster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketMaster query()
 */
	class TicketMaster extends \Eloquent {}
}

namespace Modules\Support\TicketMessage\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketMessage query()
 */
	class TicketMessage extends \Eloquent {}
}

namespace Modules\Support\TicketPriority\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketPriority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketPriority newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketPriority query()
 */
	class TicketPriority extends \Eloquent {}
}

namespace Modules\Support\TicketStatus\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus visibleTo(string $role)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus withoutTrashed()
 */
	class TicketStatus extends \Eloquent {}
}

namespace Modules\Support\TicketType\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketType query()
 */
	class TicketType extends \Eloquent {}
}

