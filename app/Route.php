<?php

namespace App;

class Route
{
    protected static $routes = [];

    public static function add($uri, $callback)
    {
        self::$routes[$uri] = $callback;
    }

    public static function get($uri, $callback)
    {
        self::add('GET:' . $uri, $callback);
    }

    public static function post($uri, $callback)
    {
        self::add('POST:' . $uri, $callback);
    }

    public static function put($uri, $callback)
    {
        self::add('PUT:' . $uri, $callback);
    }

    public static function patch($uri, $callback)
    {
        self::add('PATCH:' . $uri, $callback);
    }

    public static function delete($uri, $callback)
    {
        self::add('DELETE:' . $uri, $callback);
    }

    public static function dispatch($uri, $method)
    {
        $routeKey = $method . ':' . $uri;
        if (array_key_exists($routeKey, self::$routes)) {
            return call_user_func(self::$routes[$routeKey]);
        }

        return null;
    }
}
