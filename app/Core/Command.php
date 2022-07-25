<?php

namespace App\Core;

class Command
{

    public function __construct()
    {
    }

    /**
     * Get Signature If There Is One
     *
     * @return boolean
     */
    public function getSignature()
    {
        return $this->signature ?? false;
    }

    /**
     * Log message to console
     * @param $message
     */
    public function log($message)
    {
        console_log($message);
    }
}
