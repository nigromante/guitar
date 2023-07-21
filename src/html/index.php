<?php
    require_once "../vendor/autoload.php" ; 
    require_once "../config/load.php" ; 
    require_once "../framework/dump_functions.php" ; 
    require_once "../framework/Session.php" ; 

    use Framework\Router ; 

    $routes = Router::list() ;
    

    try {
        $route = Router::evalRequest( $_SERVER["REQUEST_URI"] , $_SERVER["REQUEST_METHOD"] ) ; 

        $response = Router::dispatch( $route );
        
        echo $response ; 


    }catch( Exception $e) {
        echo $e->getMessage() ; 
    }

    /*
    $sessionInfo = $handler_session->info( ) ; 
    dump($sessionInfo);
    echo json_encode( getDump() ) ; 
    */
    