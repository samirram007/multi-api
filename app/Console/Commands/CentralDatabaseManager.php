<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CentralDatabaseManager extends Command
{
    protected $signature = 'db:central {action : The action to perform (migrate, rollback)} 
                                {--seed : Seed the database} 
                                {--refresh : Refresh the database (rollback and re-migrate)} 
                                {--fresh : Drop all tables and re-migrate}';

    protected $description = 'Perform migration operations on the central database';

    public function handle()
    {
        $action = $this->argument('action');
        
        $baseCommand = match ($action) {
            'migrate' => 'migrate',
            'rollback' => 'migrate:rollback',
            default => null,
        };

        if ($this->option('fresh')) $command = 'migrate:fresh';
        elseif ($this->option('refresh')) $command = 'migrate:refresh';
        else $command = $baseCommand;

        if (!$command) {
            $this->error("Invalid action: {$action}.");
            return;
        }

        $params = [
            '--database' => 'central',
            '--force' => true,
        ];

        // For migrate:fresh and migrate:refresh, path needs to be handled carefully
        // or just accept that they run against the connection.
        // If we use --path, migrate:fresh/refresh also supports it.
        $params['--path'] = 'database/migrations/central';

        if ($this->option('seed')) {
            $params['--seed'] = true;
            $params['--seeder'] = 'CentralDatabaseSeeder';
        }

        $this->info("Running {$command} on 'central' connection...");
        $this->call($command, $params);
        $this->info("Finished.");
    }
}
