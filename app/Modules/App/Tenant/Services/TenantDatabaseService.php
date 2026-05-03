<?php

namespace Modules\App\Tenant\Services;

use Illuminate\Support\Facades\DB;

class TenantDatabaseService
{
    /**
     * Create a new database for the tenant.
     */
    public function createDatabase(string $dbName): bool
    {
        // Use the central connection to create the new database
        return DB::connection('mariadb')->statement("CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    }

    /**
     * Drop a database (use with caution).
     */
    public function dropDatabase(string $dbName): bool
    {
        return DB::connection('mariadb')->statement("DROP DATABASE IF EXISTS `{$dbName}`");
    }
}
