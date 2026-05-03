<?php

namespace Modules\App\Tenant\Services;

use Modules\App\Tenant\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class TenantManager
{
    protected ?Tenant $currentTenant = null;

    /**
     * Switch the database connection to the given tenant.
     */
    public function switchToTenant(Tenant $tenant): void
    {
        $this->currentTenant = $tenant;

        // Get the original connection configuration
        $config = config('database.connections.tenant');

        // Merge tenant specific values
        $config['host'] = $tenant->db_host ?? $config['host'] ?? env('DB_HOST', '127.0.0.1');
        $config['port'] = $tenant->db_port ?? $config['port'] ?? env('DB_PORT', '3306');
        $config['database'] = $tenant->db_name;
        $config['username'] = $tenant->db_username ?? $config['username'] ?? env('DB_USERNAME', 'root');
        $config['password'] = $tenant->db_password ?? $config['password'] ?? env('DB_PASSWORD', '');

        // Set the full array
        Config::set('database.connections.tenant', $config);

        \Illuminate\Support\Facades\Log::info('Switching tenant connection', [
            'database' => $config['database'],
            'username' => $config['username'],
            'host' => $config['host'],
            'port' => $config['port']
        ]);

        // Purge and Reconnect
        DB::purge('tenant');
        DB::reconnect('tenant');
        
        // Ensure default is set to tenant
        DB::setDefaultConnection('tenant');
    }

    /**
     * Get the current tenant.
     */
    public function getCurrentTenant(): ?Tenant
    {
        return $this->currentTenant;
    }

    /**
     * Reset the database connection to the default.
     */
    public function reset(): void
    {
        $this->currentTenant = null;
        DB::purge('tenant');
        DB::setDefaultConnection(config('database.default'));
    }
}
