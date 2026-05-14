<?php

namespace Modules\Aipt\AccountLedger\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Aipt\AccountLedger\Facades\AccountLedgerFacade;
use Modules\Aipt\AccountLedger\Resources\AccountLedgerResource;
use Modules\Aipt\AccountLedger\Resources\AccountLedgerCollection;
use Modules\Aipt\AccountLedger\Requests\AccountLedgerRequest;
use Modules\Aipt\AccountLedger\Resources\LedgerBalanceResource;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class AccountLedgerController extends Controller
{
    use ApiResponseTrait;

    public function index(): AccountLedgerCollection
    {
        $data = AccountLedgerFacade::getAll();
        return new AccountLedgerCollection($data);
    }

    public function show(int $id): AccountLedgerResource
    {
        $data = AccountLedgerFacade::getById($id);
        return new AccountLedgerResource($data, 'AccountLedger retrieved successfully');
    }

    public function store(AccountLedgerRequest $request): AccountLedgerResource
    {
        $data = AccountLedgerFacade::store($request->validated());
        return new AccountLedgerResource($data, 'AccountLedger created successfully');
    }

    public function update(AccountLedgerRequest $request, int $id): AccountLedgerResource
    {
        $data = AccountLedgerFacade::update($request->validated(), $id);
        return new AccountLedgerResource($data, 'AccountLedger updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $result = AccountLedgerFacade::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'AccountLedger deleted successfully' : 'AccountLedger not found',
        ]);
    }

    public function ledger_balance(int $id): LedgerBalanceResource
    {
        $data = AccountLedgerFacade::getLedgerBalance($id);
        return new LedgerBalanceResource((object) $data, 'AccountLedger Balance retrieved successfully');
    }

    public function purchase_ledgers(): AccountLedgerCollection
    {
        $data = AccountLedgerFacade::getPurchaseLedgers();
        return new AccountLedgerCollection($data);
    }

    public function sale_ledgers(): AccountLedgerCollection
    {
        $data = AccountLedgerFacade::getSaleLedgers();
        return new AccountLedgerCollection($data);
    }

    public function supplier_ledgers(): AccountLedgerCollection
    {
        $data = AccountLedgerFacade::getSupplierLedgers();
        return new AccountLedgerCollection($data);
    }

    public function distributor_ledgers(): AccountLedgerCollection
    {
        $data = AccountLedgerFacade::getDistributorLedgers();
        return new AccountLedgerCollection($data);
    }

    public function stock_in_hand_ledgers(): AccountLedgerCollection
    {
        $data = AccountLedgerFacade::getStockInHandLedgers();
        return new AccountLedgerCollection($data);
    }
}
