<?php

namespace App\Console\Commands;

use App\Core\Command;
use App\Services\importCSVService;

class importCurrencies extends Command
{
    /**
     * The name and signature of the console command
     *
     * @var string
     */
    protected $signature = 'import:currencies';


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
        $importCsvService = new ImportCSVService();
        $importCsvService->import("currency");
    }
}
