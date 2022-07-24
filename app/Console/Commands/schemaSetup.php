<?php

namespace App\Console\Commands;

use App\Core\Command;
use DB;

class schemaSetup extends Command
{
    /**
     * The name and signature of the console command
     *
     * @var string
     */
    protected $signature = 'schema:install';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->log("Installing database schema");
        try {
        foreach (glob(SCHEMA_PATH . "*.sql") as $filename) {
            $this->log("Setting up " . pathinfo($filename,PATHINFO_BASENAME));
            DB::query(file_get_contents($filename));
        }
            $this->log("Database schema setup was successful");
        } catch (MeekroDBException $e) {
            exit($e->getMessage());
        }
    }
}
