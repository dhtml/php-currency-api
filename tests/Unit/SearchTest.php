<?php

namespace Tests\Unit;

use App\Models\Country;
use App\Models\Currency;
use App\Services\ModelSearchService;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /**
     * Test currency search Filter
     */
    public function testCurrencySearchFilter()
    {
        $response = ModelSearchService::find(Currency::getInstance(), ['term'=>'british']);
        $this->assertIsArray($response);
        $this->assertNotEmpty($response['data']);

        if(isset($response['current_page'])) {
            $this->assertSame($response['current_page'],1);
            $this->assertCount(4, $response);
        }

        if(isset($response['data'][0])) {
            $this->assertContains('1', array_values($response['data'][0]));
        }
    }

    /**
     * Test currency search Filter Failure
     */
    public function testCurrencySearchFilterFailure()
    {
        $response = ModelSearchService::find(Currency::getInstance(), ['term'=>'british government']);
        $this->assertEmpty($response['data']);
    }


    /**
     * Test country search Filter
     */
    public function testCountrySearchFilter()
    {
        $response = ModelSearchService::find(Country::getInstance(), ['term'=>'british']);
        $this->assertIsArray($response);
        $this->assertNotEmpty($response['data']);

        if(isset($response['current_page'])) {
            $this->assertSame($response['current_page'],1);
            $this->assertCount(4, $response);
        }

        if(isset($response['data'][0])) {
            $this->assertContains('33', array_values($response['data'][0]));
        }
    }

    /**
     * Test country search Filter Failure
     */
    public function testCountrySearchFilterFailure()
    {
        $response = ModelSearchService::find(Country::getInstance(), ['term'=>'british government']);
        $this->assertEmpty($response['data']);
    }
}
