<?php

namespace App\Modules\Maintenance\Services;

use App\Modules\Maintenance\Contracts\MaintenanceServiceInterface;
use App\Modules\Maintenance\Models\Maintenance;
use Illuminate\Database\Eloquent\Collection;

class MaintenanceService implements MaintenanceServiceInterface
{
    /**
     * Backup database with options
     */
    public function backup(array $tables = [], bool $structure = true, bool $data = true, string $format = 'sql'): string
    {
        $db = config('database.connections.' . config('database.default'));
        $database = $db['database'];
        $username = $db['username'];
        $password = $db['password'];
        $host = $db['host'];
        $port = $db['port'] ?? 3306;

        $backupPath = storage_path('app/private/maintenance');
        if (!is_dir($backupPath)) {
            mkdir($backupPath, 0777, true);
        }
        $file = $backupPath . '/backup_' . date('Ymd_His') . '.' . $format;

        $tableList = $tables ? implode(' ', array_map('escapeshellarg', $tables)) : '';
        $noData = $structure && !$data ? '--no-data' : '';
        $noCreateInfo = $data && !$structure ? '--no-create-info' : '';

        $command = sprintf(
            'mysqldump --user=%s --password=%s --host=%s --port=%d %s %s %s %s > "%s"',
            escapeshellarg($username),
            escapeshellarg($password),
            escapeshellarg($host),
            $port,
            $noData,
            $noCreateInfo,
            escapeshellarg($database),
            $tableList,
            $file
        );

        $result = null;
        $output = null;
        exec($command, $output, $result);
        if ($result !== 0) {
            throw new \Exception('Backup failed.');
        }
        return $file;
    }

    /**
     * Restore database from a backup file
     */
    public function restore(string $filePath): bool
    {
        $db = config('database.connections.' . config('database.default'));
        $database = $db['database'];
        $username = $db['username'];
        $password = $db['password'];
        $host = $db['host'];
        $port = $db['port'] ?? 3306;

        if (!file_exists($filePath)) {
            throw new \Exception('Backup file not found.');
        }

        $command = sprintf(
            'mysql --user=%s --password=%s --host=%s --port=%d %s < "%s"',
            escapeshellarg($username),
            escapeshellarg($password),
            escapeshellarg($host),
            $port,
            escapeshellarg($database),
            $filePath
        );

        $result = null;
        $output = null;
        exec($command, $output, $result);
        if ($result !== 0) {
            throw new \Exception('Restore failed.');
        }
        return true;
    }
}
