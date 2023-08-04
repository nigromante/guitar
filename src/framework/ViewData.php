<?php

namespace Framework;

class ViewData
{
    private static $instance;
    private static $values;

    protected function __construct()
    {
        self::$values = [];
    }

    public static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function set($key, $value = '')
    {
        self::$values[trim($key)] = trim($value);
    }

    public function get($key)
    {
        if (!isset(self::$values[trim($key)]))
            return "";
        return self::$values[trim($key)];
    }
}
