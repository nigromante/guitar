<?php

namespace Framework;

class bootstrap
{

    private static $instance;

    private $config;
    private $args;
    private $route;

    private $clase;
    private $metodo;

    public static function init($args, $config, $route): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new self($args, $config, $route);
        }
        return self::$instance;
    }

    private function __construct($args, $config, $route)
    {
        $this->args = $args;
        $this->config = $config;
        $this->route = $route;
    }


    public function Clase()
    {
        return $this->route["callback"]["class"];
    }

    public function Metodo()
    {
        return $this->route["callback"]["method"];
    }
    public function Params()
    {
        return $this->route["params"];
    }

    public function Config()
    {
        return $this->config;
    }

    public function EnvVars()
    {
        return $this->args;
    }


    public function Get($key, $default = '')
    {
        if (!isset($this->args["GET"][$key]))
            return $default;
        return $this->args["GET"][$key];
    }

    public function GetAll()
    {
        return $this->args["GET"];
    }

    public function Post()
    {
        return $this->args["POST"];
    }
    public function RequestUri()
    {
        return $this->args['SERVER']['REQUEST_URI'];
    }

    public function RequestMethod()
    {
        return $this->args['SERVER']['REQUEST_METHOD'];
    }


    public function run()
    {

        extract($this->route);
        if (is_callable($callback)) {

            echo $callback(...$params);
        }
        if (is_array($callback)) {
            $this->clase =  $callback["class"];
            $this->metodo = $callback["method"];

            $obj = new ($this->clase)($this);

            if ($obj->{$this->metodo}(...$params) !== false) {
                $obj->getResponse();
            }
        }
    }
}
