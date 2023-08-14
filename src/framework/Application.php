<?php

namespace Framework;


class Application
{

    public function run() {

        try {

            dump_group( 'Application', 'Application' ) ; 
            dumpsection( 'Guitar' , 'Name' ) ;
    
            dump_group( 'Routes', 'Routes' ) ; 
            dumpsection( Router::list() , 'All Routes' ) ;
    
            $uri = $_SERVER["REQUEST_URI"] ; 
            $method = $_SERVER["REQUEST_METHOD"] ; 

            $workRoute = Router::evalRequest( $uri, $method );

            dump_group( 'Route', 'Route' ) ; 
            dumpsection( $workRoute , 'workRoute' ) ;

            $response = Router::dispatch($workRoute, $uri, $method );

            echo $response;
            
        } catch ( \Exception $e) {

            FileLog::Error( $e->getMessage() );

            header( sprintf( "HTTP/1.0 500 Internal Server Error: %s", $e->getMessage()));
        }

    }

}
