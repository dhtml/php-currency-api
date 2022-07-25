<?php

namespace App\Console\Commands;

use App\Core\Command;
use PHPUnit\TextUI\Command as PUCommand;

class runTests  extends Command
{
    /**
     * The name and signature of the console command
     *
     * @var string
     */
    protected $signature = 'test';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $command = new PUCommand();
        $command->run(['phpunit', 'tests','--verbose','--testdox']);
    }
}