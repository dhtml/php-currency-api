<?php

namespace App\Models;

use App\Core\Model;

class Currency extends Model
{
    protected $fillable = [
        'iso_code',
        'iso_numeric_code',
        'common_name',
        'official_name',
        'symbol',
    ];
    protected $table = "currencies";
}