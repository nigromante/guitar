<?php

use Controllers\frontend\InstrumentosController;
use Controllers\frontend\ContactoController;


use Framework\Router;



Router::Get( '/' , [InstrumentosController::class , 'index'] ) ; 


Router::Get( '/instrumentos/info' , [InstrumentosController::class , 'info'] ) ;
Router::Get( '/instrumentos/list' , [InstrumentosController::class , 'index'] ) ;
Router::Get( '/instrumentos/all' , [InstrumentosController::class , 'all'] ) ;
Router::Get( '/instrumentos/marca/:codigo' , [InstrumentosController::class , 'marca'] ) ; 

Router::Get( '/contacto/form' , [ContactoController::class , 'form'] ) ; 
Router::Post( '/contacto/form' , [ContactoController::class , 'formPost'] ) ; 



