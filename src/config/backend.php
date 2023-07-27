<?php

use Controllers\backend\InstrumentosController ; 
use Controllers\backend\FilesController ; 
use Controllers\backend\DashboardController ; 
use Controllers\backend\UsuariosController ;

use Framework\Router;

Router::Get( '/backend' , [DashboardController::class , 'index'] ) ;

Router::Get( '/backend/instrumentos/listado' , [InstrumentosController::class , 'listado'] ) ;
Router::Get( '/backend/instrumentos/detalle/:id' , [InstrumentosController::class , 'detalle'] ) ;
Router::Get( '/backend/instrumentos/borrar/:id' , [InstrumentosController::class , 'borrar'] ) ;
Router::Get( '/backend/instrumentos/crear' , [InstrumentosController::class , 'crear'] ) ;
Router::Post( '/backend/instrumentos/crear' , [InstrumentosController::class , 'crear_grabar'] ) ;
Router::Get( '/backend/instrumentos/modificar/:id' , [InstrumentosController::class , 'modificar'] ) ;
Router::Post('/backend/instrumentos/modificar/:id' , [InstrumentosController::class , 'modificar_grabar'] ) ;



Router::Get( '/backend/files/listado' , [FilesController::class , 'listado'] ) ;
Router::Get( '/backend/files/borrar/:id' , [FilesController::class , 'borrar'] ) ;
Router::Get( '/backend/files/detalle/:id' , [FilesController::class , 'detalle'] ) ;


Router::Get( '/backend/usuarios/prueba' , [UsuariosController::class , 'index'] ) ;