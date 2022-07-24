<?php

namespace App\Services;

use DB;

class SchemaService
{
    /**
     * Install path of schemas
     * @param string $path
     *
     * @return array
     */
    public function installPath(string $path)
    {
            foreach (glob($path) as $filename) {
                if(!$this->installFile($filename)) {
                    return ["message"=>"Database Schema Setup Failed", "success"=>false];
                }
            }
            return ["message"=>"Database schema setup was successful","success"=>true];
    }

    /**
     * Install individual schema
     *
     * @param $filename
     */
    private function installFile($filename)
    {
        try {
            console_log("Setting up " . pathinfo($filename, PATHINFO_BASENAME));
            DB::query(file_get_contents($filename));
            return true;
        } catch (MeekroDBException $e) {
            console_log($e->getMessage());
            return false;
        }
    }
}