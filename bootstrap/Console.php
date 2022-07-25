<?php

use App\Core\Command;

class Console
{
    private static $consoleCommands = [];

    public static function initialize($argc, $argv)
    {
        if (isset($argc) && $argc > 1) {
            self::load();
            $command = $argv[1];
            $parameters = array_slice($argv, 2);
            self::executeCommand($command, $parameters);
        }
    }

    public static function load()
    {
        $commandNameSpace = "App/Console/Commands/";

        foreach (glob(COMMANDS_PATH . "*.php") as $filename) {
            require $filename;
        }
        $namespaces = get_current_namespaces($commandNameSpace);

        //instantiate spaces
        foreach ($namespaces as $namespace) {
            $object = new $namespace();
            if ($object instanceof Command && $signature = $object->getSignature()) {
                self::register($object, $signature);
            }
        }
    }

    /**
     * Register a console command
     *
     * @param Command $object
     * @param bool $signature
     */
    private static function register(Command $object, string $signature)
    {
        if (isset(self::$consoleCommands[$signature])) {
            throw new Exception("The signature '$signature' must be unique");
        }
        self::$consoleCommands["$signature"] = $object;
    }

    /**
     * Execute console command
     * @param string $signature
     * @param array $parameters
     * @throws Exception
     */
    private static function executeCommand(string $signature, array $parameters)
    {
        if (isset(self::$consoleCommands[$signature])) {
            self::$consoleCommands[$signature]->handle($parameters);
        } else {
            console_log("Command not found : $signature");
            exit();
        }
    }

}
