<?php

use Sebastian\Guitar\frontend\instrumentos\application\controllers\InstrumentosController ; 
use Sebastian\Guitar\frontend\contactos\application\controllers\ContactoController ; 

use Framework\Router;

Router::Get( '/xdebug' , function() { return 
    xdebug_info(); 
}   ) ; 


Router::Get( '/' , [InstrumentosController::class , 'index'] ) ; 

Router::Get( '/test/:paso' , function($paso) { return "test : " . $paso ;} ) ;

Router::Get( '/instrumentos/info' , [InstrumentosController::class , 'info'] ) ;
Router::Get( '/instrumentos/list' , [InstrumentosController::class , 'index'] ) ;
Router::Get( '/instrumentos/all' , [InstrumentosController::class , 'all'] ) ;

Router::Get( '/instrumentos/marca/:codigo' , [InstrumentosController::class , 'marca'] ) ; 

Router::Get( '/contacto/form' , [ContactoController::class , 'form'] ) ; 
Router::Post( '/contacto/form' , [ContactoController::class , 'formPost'] ) ; 



