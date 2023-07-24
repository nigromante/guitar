<?php

use Sebastian\Guitar\backend\instrumentos\application\controllers\InstrumentosController ; 

use Framework\Router;

Router::Get( '/backend/instrumentos/listado' , [InstrumentosController::class , 'mantencion_listado'] ) ;
Router::Get( '/backend/instrumentos/detalle/:id' , [InstrumentosController::class , 'mantencion_detalle'] ) ;
Router::Get( '/backend/instrumentos/borrar/:id' , [InstrumentosController::class , 'mantencion_borrar'] ) ;


