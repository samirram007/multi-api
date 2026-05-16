<?php
namespace Modules\Aipt\Customer\Repositories;

use Modules\Aipt\Customer\Contracts\CustomerRepositoryInterface;
use Modules\Aipt\Customer\Models\Customer;
use App\Support\Repositories\BaseRepository;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    public function __construct(Customer $model)
    {
        parent::__construct($model, cacheable: true);
    }
}
