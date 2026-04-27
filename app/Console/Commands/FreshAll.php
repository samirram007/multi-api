<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('fresh-all')]
#[Description('Command description')]
class FreshAll extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate:rollback');
        $this->call('migrate', ['--seed' => true]);

    // // SQLite
    // $this->call('db:wipe', ['--database' => 'sqlite']);
    // $this->call('migrate', ['--database' => 'sqlite']);
    // $this->call('db:seed', ['--database' => 'sqlite']);
    }
}
