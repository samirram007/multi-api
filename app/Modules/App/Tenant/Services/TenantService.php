<?php

namespace Modules\App\Tenant\Services;

use Modules\App\Tenant\Contracts\TenantServiceInterface;
use Modules\App\Tenant\Models\Tenant;
use Illuminate\Database\Eloquent\Collection;

class TenantService implements TenantServiceInterface
{
    protected $resource = [];

    public function __construct(
        protected TenantManager $tenantManager,
        protected TenantDatabaseService $databaseService
    ) {}

    public function getAll(): Collection
    {
        return Tenant::with($this->resource)->get();
    }

    public function getById(int $id): ?Tenant
    {
        return Tenant::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Tenant
    {
        // 1. Link to authenticated owner
        $data['tenant_user_id'] = auth('tenant_api')->id();

        // 2. Auto-generate unique API key
        $data['api_key'] = \Illuminate\Support\Str::random(32);
        $data['api_key_expires_at'] = now()->addYears(1);

        // 3. Auto-generate database name if not provided
        if (empty($data['db_name'])) {
            $data['db_name'] = 'tenant_' . \Illuminate\Support\Str::slug($data['name'], '_') . '_' . \Illuminate\Support\Str::random(4);
        }

        // 4. Default module
        $data['app_module'] = $data['app_module'] ?? 'Aipt';

        $tenant = Tenant::create($data);

        if ($tenant->db_name) {
            // 5. Create the database
            $this->databaseService->createDatabase($tenant->db_name);

            // 6. Run migrations using the command (more robust for child process isolation)
            try {
                \Illuminate\Support\Facades\Artisan::call('db:tenant', [
                    'id' => $tenant->id,
                    'action' => 'migrate',
                    '--seed' => true
                ]);
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Tenant migration failed during provisioning', [
                    'tenant_id' => $tenant->id,
                    'error' => $e->getMessage()
                ]);
            }
        }

        return $tenant;
    }

    public function update(array $data, int $id): Tenant
    {
        $record = Tenant::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Tenant::findOrFail($id);
        return $record->delete();
    }
}
