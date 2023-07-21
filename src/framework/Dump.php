<?php

namespace Framework ; 

class Dump
{
    private static $instance;
    private static $values ;

    protected function __construct() { 
        self::$values = [];
    }

    public static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function set( $data, $title='' )
    {
        self::$values[] =  [ $data , $title ] ; 
    }

    public function get(  )
    {
        return self::$values ; 
    }

}

