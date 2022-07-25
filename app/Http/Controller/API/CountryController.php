<?php

namespace App\Http\Controller\API;

use App\Models\Country;
use App\Services\ModelSearchService;

class CountryController
{
    public function index()
    {
        $response = ModelSearchService::find(Country::getInstance(), $_GET);
        render_json($response);
    }
}