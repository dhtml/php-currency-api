<?php

class Database
{

    public static function initialize()
    {
        DB::$host = DB_HOSTNAME;
        DB::$user = DB_USERNAME;
        DB::$password = DB_PASSWORD;
        DB::$dbName = DB_NAME;

        try {
            $result = DB::query("SET NAMES UTF8");
        } catch (MeekroDBException $e) {
            exit($e->getMessage());
        }
    }

}
