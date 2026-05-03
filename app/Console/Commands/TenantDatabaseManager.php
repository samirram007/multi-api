<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\App\Tenant\Models\Tenant;
use Modules\App\Tenant\Services\TenantManager;
use Modules\App\Tenant\Services\TenantDatabaseService;

class TenantDatabaseManager extends Command
{
    protected $signature = 'db:tenant {id : The ID of the tenant} {action : The action to perform (migrate, rollback)} 
                                {--seed : Seed the database} 
                                {--refresh : Refresh the database (rollback and re-migrate)} 
                                {--fresh : Drop all tables and re-migrate}';

    protected $description = 'Perform migration operations on a specific tenant database';

    public function __construct(
        protected TenantManager $tenantManager,
        protected TenantDatabaseService $dbService
    ) {
        parent::__construct();
    }

    public function handle()
    {
        $id = $this->argument('id');
        $action = $this->argument('action');

        $tenant = Tenant::find($id);

        if (!$tenant) {
            $this->error("Tenant with ID {$id} not found.");
            return;
        }

        $this->dbService->createDatabase($tenant->db_name);
        
        $this->info("Processing tenant: {$tenant->name} (ID: {$tenant->id})");

        // Use a separate process to trigger migration/seeding.
        $cmd = sprintf(
            'php artisan %s --database=tenant --force %s',
            match ($action) {
                'migrate' => $this->option('fresh') ? 'migrate:fresh' : ($this->option('refresh') ? 'migrate:refresh' : 'migrate'),
                'rollback' => 'migrate:rollback',
            },
            $this->option('seed') ? '--seed' : ''
        );

        $process = \Symfony\Component\Process\Process::fromShellCommandline($cmd);
        $process->setEnv([
            'APP_MODULE' => $tenant->app_module,
            'TENANT_DB_CONFIG' => json_encode([
                'DB_DATABASE' => $tenant->db_name,
                'DB_USERNAME' => $tenant->db_username,
                'DB_PASSWORD' => $tenant->db_password,
                'DB_HOST' => $tenant->db_host,
                'DB_PORT' => $tenant->db_port,
            ]),
        ]);
        $process->setTimeout(300);
        $process->run(function ($type, $buffer) {
            $this->output->write($buffer);
        });

        $this->info("Finished.");
    }
}
