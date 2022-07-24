<?php

namespace App\Console\Commands;

use App\Core\Command;

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
        echo "Install database schema";
    }
}
