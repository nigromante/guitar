<?php

use Controllers\backend\InstrumentosController ; 
use Controllers\backend\FilesController ; 
use Controllers\backend\DashboardController ; 

use Framework\Router;

Router::Get( '/backend' , [DashboardController::class , 'index'] ) ;

Router::Get( '/backend/instrumentos/listado' , [InstrumentosController::class , 'listado'] ) ;
Router::Get( '/backend/instrumentos/detalle/:id' , [InstrumentosController::class , 'detalle'] ) ;
Router::Get( '/backend/instrumentos/borrar/:id' , [InstrumentosController::class , 'borrar'] ) ;

Router::Get( '/backend/files/listado' , [FilesController::class , 'listado'] ) ;

