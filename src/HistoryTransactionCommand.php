<?php

namespace Eza\HistoryTransaction;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class HistoryTransactionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'history-transaction:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install new history transaction package';

    /**
     * Compatiblity for Lumen 5.5.
     *
     * @return void
     */
    public function handle()
    {
        $this->fire();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->publishMigrations();

        $this->info("History Transaction alredy installed");
    }


    /**
     * Publish the directory to the given directory.
     *
     * @param  string  $from
     * @param  string  $to
     * @return void
     */
    protected function publishDirectory($from , $to)
    {
        $exclude = array('..' , '.' , '.DS_Store');
        $source = array_diff(scandir($from) , $exclude);

        foreach ($source as $item) {
            $this->info("Copying file: " . $to . $item);
            File::copy($from . $item , $to . $item);
        }
    }

    /**
     * Publish migrations.
     *
     * @return void
     */
    protected function publishMigrations()
    {
        $this->publishDirectory(__DIR__.'/migrations/', app()->databasePath()."/migrations/");
    }
}
