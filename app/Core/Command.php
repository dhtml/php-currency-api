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
}
