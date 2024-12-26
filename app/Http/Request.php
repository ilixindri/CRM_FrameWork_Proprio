<?php

namespace App\Http;

class Request
{
    public static function capture()
    {
        $_SERVER['REQUEST_URI'];
    }
}