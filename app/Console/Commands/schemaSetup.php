<?php

namespace App\Console\Commands;

use App\Core\Command;
use App\Services\SchemaService;

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
        $schemaService = new SchemaService();
        $response = $schemaService->installPath(SCHEMA_PATH . "*.sql");
        echo $response['message'];
    }
}
