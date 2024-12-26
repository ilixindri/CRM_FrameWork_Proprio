<?php

namespace App\Http;

class Request
{
    public static function capture()
    {
        return new static;
    }
}