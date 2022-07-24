<?php

namespace App\Core;

use DB;

class Model
{
    protected $table = "";
    public function getTableName()
    {
        return $this->table;
    }

    /**
     * @param array $record
     * @return mixed
     */
    public function insert(Array $record)
    {
        return DB::insert($this->table, $record);
    }


    /**
     * @param array $record
     * @return mixed
     */
    public function insertIgnore(Array $record)
    {
        return DB::insertIgnore($this->table, $record);
    }

    public function truncate()
    {
        return DB::query("truncate table " . $this->table);
    }


}