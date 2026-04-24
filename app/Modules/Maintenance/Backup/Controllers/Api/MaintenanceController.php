<?php

namespace App\Modules\Maintenance\Controllers\Api;

use App\Http\Controllers\Controller;


use App\Modules\Maintenance\Facades\MaintenanceFacade as Maintenance;

use App\Modules\Maintenance\Requests\MaintenanceRequest;



class MaintenanceController extends Controller
{


    public function __construct()
    {
    }

    /**
     * Backup database with options
     * POST /api/maintenance/backup
     * Params: tables[] (array), structure (bool), data (bool), format (string)
     */
    public function backup(MaintenanceRequest $request)
    {
        dd($request->all());
        $validated = $request->validate([
            'tables' => 'array',
            'tables.*' => 'string',
            'structure' => 'boolean',
            'data' => 'boolean',
            'format' => 'string',
        ]);

        $tables = $validated['tables'] ?? [];
        $structure = $validated['structure'] ?? true;
        $data = $validated['data'] ?? true;
        $format = $validated['format'] ?? 'sql';

        try {
            $file = Maintenance::backup($tables, $structure, $data, $format);
            return $this->successResponse(['file' => $file], 'Backup created successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Restore database from a backup file
     * POST /api/maintenance/restore
     * Params: file (string)
     */
    public function restore(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'file' => [
                'required',
                'string',
                // Must be in the maintenance backup directory and end with .sql
                'regex:/^.*storage[\\\/]app[\\\/]private[\\\/]maintenance[\\\/].*\.sql$/',
            ],
        ]);

        $filePath = $validated['file'];
        $allowedDir = storage_path('app/private/maintenance');
        // Normalize slashes for cross-platform compatibility
        $realFilePath = realpath($filePath);
        $realAllowedDir = realpath($allowedDir);
        if (!$realFilePath || !$realAllowedDir || strpos($realFilePath, $realAllowedDir) !== 0 || !str_ends_with($realFilePath, '.sql') || !file_exists($realFilePath)) {
            return $this->errorResponse('Invalid or missing backup file.', 422);
        }
        try {
            $result = Maintenance::restore($realFilePath);
            return $this->successResponse(['restored' => $result], 'Database restored successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

}
