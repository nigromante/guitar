<?php

namespace Framework ;

use \Exception;

class Router {

    private static $routes = [ 'GET' => [], 'POST' => []  ]; 

    public static function Get( $uri, $callback ) {
        if( is_callable($callback)) {
            self::$routes['GET'][ $uri ] = $callback ; 
            return;    
        }
        self::$routes['GET'][ $uri ] = [ 'class' => $callback[0], 'method' => $callback[1] ] ; 
    }

    public static function Post( $uri, $callback ) {
        if( is_callable($callback)) {
            self::$routes['POST'][ $uri ] = $callback ; 
            return;    
        }
        self::$routes['POST'][ $uri ] = [ 'class' => $callback[0], 'method' => $callback[1] ] ; 
    }

    public static function evalRequest( $uri, $method ) {

        // dump_group( 'router', 'Router' ) ; 
        // dumpsection( $uri , 'uri' ) ;
        var_dump( $uri ) ;
        var_dump( $method ) ;
        // dumpsection( $method , 'method') ;

        foreach( self::$routes[$method] as $route => $callback ) {
            if( strpos( $route, ':' ) !== false ) {
                $route = preg_replace( '#:[\da-zA-Z\-]+#', '([\da-zA-Z\-]+)' , $route ) ; 
            }


            if(preg_match( "#^$route$#" , $uri, $matches) ) {
                $params = array_slice($matches, 1) ;
                
                $routeSelected = ['callback' => $callback, 'params' => $params] ;

                // dumpsection( $routeSelected, 'route' ) ;

                return $routeSelected ; 
            } 
        }

        throw new Exception("404") ;
    } 

    public static function dispatch( $route ) {
        // var_dump( $route ) ;
        GLOBAL $ENV_VARS ; 


        dump_group( 'Environment', 'Environment' ) ; 
        dumpsection( $ENV_VARS , 'ENV_VARS' ) ;


        extract( $route ) ;
        if( is_callable( $callback)) {

            return $callback(...$params) ;

        }

        if( is_array( $callback) ) {
            $clase =  $callback["class"] ; 
            $metodo = $callback["method"] ;
    

            
            $obj = new ($clase)( ) ;
            return $obj->{$metodo}(...$params) ;
        }

        return false ;
    }


    public static function list(  ) {
        return self::$routes ; 
    }

}