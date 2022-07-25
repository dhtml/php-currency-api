<?php

namespace Tests\Feature;

use Tests\TestCase;

class BrowserTest extends TestCase
{
    /**
     * Test Browser Connectivity
     *
     * @return void
     */
    public function testBrowserConnectivityCheck()
    {
        $response = $this->visitUrl(url('api'));

        $this->assertObjectHasAttribute('versionCode', $response);
        $this->assertObjectHasAttribute('versionName', $response);

        if(isset($response->versionName)) {
            $this->assertIsString($response->versionName);
            $this->assertStringContainsStringIgnoringCase('agpaytech', $response->versionName);
        }

        if(isset($response->versionCode)) {
            $this->assertGreaterThanOrEqual(1, $response->versionCode);
        }
    }
}
