<?php

namespace App\Core;

class Model
{
    protected $table = "";
    public function getTableName()
    {
        return $this->table;
    }
}