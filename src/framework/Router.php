<?php

namespace Framework;

use \Exception;

class Router
{

    private static $routes = ['GET' => [], 'POST' => []];

    public static function Get($uri, $callback)
    {
        if( is_array($callback ) ) {
            self::$routes['GET'][$uri] = ['class' => $callback[0], 'method' => $callback[1]];
            return ; 
        }
        if (is_callable($callback)) {
            self::$routes['GET'][$uri] = $callback;
        }
    }

    public static function Post($uri, $callback)
    {
        if( is_array($callback ) ) {
            self::$routes['POST'][$uri] = ['class' => $callback[0], 'method' => $callback[1]];
            return ; 
        }
        if (is_callable($callback)) {
            self::$routes['POST'][$uri] = $callback;
        }

    }

    public static function evalRequest($uri, $method)
    {

        // dump_group( 'router', 'Router' ) ; 
        // dumpsection( $uri , 'uri' ) ;
        // dumpsection( $method , 'method') ;

        foreach (self::$routes[$method] as $route => $callback) {
            if (strpos($route, ':') !== false) {
                $route = preg_replace('#:[\da-zA-Z\-]+#', '([\da-zA-Z\-]+)', $route);
            }


            if (preg_match("#^$route$#", $uri, $matches)) {
                $params = array_slice($matches, 1);

                $routeSelected = ['callback' => $callback, 'params' => $params];

                // dumpsection( $routeSelected, 'route' ) ;

                return $routeSelected;
            }
        }

        throw new Exception( sprintf( "Error 404 : %s [%s]" , $uri, $method ) );
    }

    public static function dispatch($route, $uri, $method)
    {
        global $ENV_VARS;

        dump_group('Environment', 'Environment');
        dumpsection($ENV_VARS, 'ENV_VARS');

        extract($route);
        if (is_callable($callback)) {

            return $callback(...$params);
        }

        if (is_array($callback)) {
            $clase =  $callback["class"];
            $metodo = $callback["method"];

            dump_group('Controller', 'Controller');
            dumpsection( $callback, 'Callback');
            
            $obj = new ($clase)();

            if (method_exists($clase, 'CheckAuth')) {
                if (!$obj->CheckAuth()) {

                    FileLog::Alert("$method | $uri | $clase :: $metodo ");

                    $obj->redirect("/backend/acceso/no-access");
                    return "";
                }
            }

            $response =  $obj->{$metodo}(...$params);

            Event::proccess() ; 

            return $response ;

        }

        return false;
    }


    public static function list()
    {
        return self::$routes;
    }
}
