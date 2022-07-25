<?php

namespace App\Http\Controller\API;

use App\Models\Currency;
use App\Services\ModelSearchService;

class CurrencyController
{
    public function index()
    {
        $response = ModelSearchService::find(Currency::getInstance(), $_GET);
        render_json($response);
    }

}