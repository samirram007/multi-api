<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Maintenance backup/restore blade test routes
use App\Modules\Maintenance\Facades\Maintenance;

Route::get('maintenance/backup', function () {
    return view('Maintenance::backup');
})->name('maintenance.backup.form');

Route::post('maintenance/backup', function (\Illuminate\Http\Request $request) {
    $tables = $request->input('tables') ? array_map('trim', explode(',', $request->input('tables'))) : [];
    $structure = $request->has('structure');
    $data = $request->has('data');
    $format = $request->input('format', 'sql');
    try {
        $file = Maintenance::backup($tables, $structure, $data, $format);
        return redirect()->route('maintenance.backup.form')->with('file', $file);
    } catch (\Exception $e) {
        return redirect()->route('maintenance.backup.form')->with('error', $e->getMessage());
    }
})->name('maintenance.backup');

Route::get('maintenance/restore', function () {
    return view('Maintenance::restore');
})->name('maintenance.restore.form');

Route::post('maintenance/restore', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'file' => [
            'required',
            'string',
            'regex:/^.*storage[\\\\/]app[\\\\/]private[\\\\/]maintenance[\\\\/].*\\.sql$/',
        ],
    ]);
    $filePath = $request->input('file');
    $allowedDir = storage_path('app/private/maintenance');
    $realFilePath = realpath($filePath);
    $realAllowedDir = realpath($allowedDir);
    if (!$realFilePath || !$realAllowedDir || strpos($realFilePath, $realAllowedDir) !== 0 || !str_ends_with($realFilePath, '.sql') || !file_exists($realFilePath)) {
        return redirect()->route('maintenance.restore.form')->with('error', 'Invalid or missing backup file.');
    }
    try {
        $result = Maintenance::restore($realFilePath);
        return redirect()->route('maintenance.restore.form')->with('restored', true);
    } catch (\Exception $e) {
        return redirect()->route('maintenance.restore.form')->with('error', $e->getMessage());
    }
})->name('maintenance.restore');
