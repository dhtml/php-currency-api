<?php
if (!ini_get("auto_detect_line_endings")) {
    ini_set("auto_detect_line_endings", '1');
}

const DS = DIRECTORY_SEPARATOR;
define("BASE_PATH", dirname(__DIR__ . "../") . DS);
const APP_PATH = BASE_PATH . "app" . DS;
const COMMANDS_PATH = APP_PATH . "Console" . DS . "Commands" . DS;

const DB_PATH = BASE_PATH . "database" . DS;
const MIGRATION_PATH = DB_PATH . "Migrations" . DS;
const SCHEMA_PATH = DB_PATH . "Schema" . DS;

require __DIR__ . '/../environment.php';
require __DIR__ . '/BaseFuncs.php';

require __DIR__ . '/database.php';
require __DIR__ . '/console.php';

Database::initialize();

if(isset($argc)) {
    Console::initialize($argc, $argv);
}
