<?php

namespace Tests\Feature;

use Tests\TestCase;

class APITest extends TestCase
{
    /**
     * Test Get Country Records
     *
     * @return void
     */
    public function testGetCountryRecords()
    {
        $response = $this->visitUrl(url('api/countries?term=british'));

        $this->assertObjectHasAttribute('total_pages', $response);
        $this->assertObjectHasAttribute('per_page', $response);
        $this->assertObjectHasAttribute('data', $response);
        if (isset($response->versionCode)) {
            $this->assertGreaterThanOrEqual(1, $response->total_pages);
        }
    }

    /**
     * Test Get Currency Records
     *
     * @return void
     */
    public function testGetCurrenciesRecords()
    {
        $response = $this->visitUrl(url('api/currencies?term=british'));
        $this->assertObjectHasAttribute('total_pages', $response);
        $this->assertObjectHasAttribute('per_page', $response);
        $this->assertObjectHasAttribute('data', $response);
        if (isset($response->versionCode)) {
            $this->assertGreaterThanOrEqual(1, $response->total_pages);
        }
    }
}
