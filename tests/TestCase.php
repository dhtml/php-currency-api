<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{

    /**
     * @param $url
     * @return mixed
     */
    public function visitUrl($url)
    {
        $urlData = @file_get_contents($url);
        return @json_decode($urlData);
    }
}
