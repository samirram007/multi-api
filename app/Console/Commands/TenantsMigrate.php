<?php

namespace App\Console\Commands;

use Modules\App\Tenant\Models\Tenant;
use Modules\App\Tenant\Services\TenantManager;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class TenantsMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrate {--fresh : Whether to run migrate:fresh} {--seed : Whether to seed the database}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations for all tenants';

    public function __construct(protected TenantManager $tenantManager)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tenants = Tenant::all();

        if ($tenants->isEmpty()) {
            $this->info('No tenants found.');
            return;
        }

        foreach ($tenants as $tenant) {
            $this->info("Migrating tenant: {$tenant->name} ({$tenant->code})");

            try {
                $this->tenantManager->switchToTenant($tenant);

                $command = $this->option('fresh') ? 'migrate:fresh' : 'migrate';
                
                $params = [
                    '--force' => true,
                    '--database' => 'tenant',
                ];

                if ($this->option('seed')) {
                    $params['--seed'] = true;
                }

                $this->call($command, $params);

                $this->info("Successfully migrated tenant: {$tenant->name}");
            } catch (\Exception $e) {
                $this->error("Failed to migrate tenant: {$tenant->name}. Error: {$e->getMessage()}");
            } finally {
                $this->tenantManager->reset();
            }
        }

        $this->info('All tenant migrations completed.');
    }
}
