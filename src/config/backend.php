<?php

use Controllers\backend\InstrumentosController ; 

use Framework\Router;

Router::Get( '/backend/instrumentos/listado' , [InstrumentosController::class , 'listado'] ) ;
Router::Get( '/backend/instrumentos/detalle/:id' , [InstrumentosController::class , 'detalle'] ) ;
Router::Get( '/backend/instrumentos/borrar/:id' , [InstrumentosController::class , 'borrar'] ) ;


