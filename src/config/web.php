<?php

use Sebastian\Guitar\instrumentos\application\controllers\InstrumentosController ; 
use Sebastian\Guitar\contactos\application\controllers\ContactoController ; 

use Framework\Router;

Router::Get( '/xdebug' , function() { return 
    xdebug_info(); 
}   ) ; 


Router::Get( '/' , [InstrumentosController::class , 'index'] ) ; 

Router::Get( '/test/:paso' , function($paso) { return "test : " . $paso ;} ) ;

Router::Get( '/instrumentos/mantencion/listado' , [InstrumentosController::class , 'mantencion_listado'] ) ;
Router::Get( '/instrumentos/mantencion/detalle/:id' , [InstrumentosController::class , 'mantencion_detalle'] ) ;
Router::Get( '/instrumentos/mantencion/borrar/:id' , [InstrumentosController::class , 'mantencion_borrar'] ) ;

Router::Get( '/instrumentos/info' , [InstrumentosController::class , 'info'] ) ;
Router::Get( '/instrumentos/list' , [InstrumentosController::class , 'index'] ) ;
Router::Get( '/instrumentos/all' , [InstrumentosController::class , 'all'] ) ;

Router::Get( '/instrumentos/marca/:codigo' , [InstrumentosController::class , 'marca'] ) ; 

Router::Get( '/contacto/form' , [ContactoController::class , 'form'] ) ; 
Router::Post( '/contacto/form' , [ContactoController::class , 'formPost'] ) ; 



