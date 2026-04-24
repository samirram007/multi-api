<?php

namespace App\Modules\Maintenance\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Maintenance\Models\Maintenance;

interface MaintenanceServiceInterface
{
    /**
     * Backup database with options
     * @param array $tables
     * @param bool $structure
     * @param bool $data
     * @param string $format
     * @return string Backup file path
     */
    public function backup(array $tables = [], bool $structure = true, bool $data = true, string $format = 'sql'): string;

    /**
     * Restore database from a backup file
     * @param string $filePath
     * @return bool
     */
    public function restore(string $filePath): bool;
}
