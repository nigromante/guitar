<?php

use Controllers\backend\InstrumentosController ; 
use Controllers\backend\FilesController ; 
use Controllers\backend\DashboardController ; 
use Controllers\backend\UsuariosController ;
use Controllers\backend\AccesoController ;

use Framework\Router;
Router::Get( '/backend' , [DashboardController::class , 'index'] ) ;
Router::Get( '/dashboard' , [DashboardController::class , 'index'] ) ;
Router::Get( '/backend/dashboard' , [DashboardController::class , 'index'] ) ;


Router::Post( '/backend/acceso/login' , [AccesoController::class , 'login_validar'] ) ;
Router::Get(  '/backend/acceso/login' , [AccesoController::class , 'login'] ) ;
Router::Get(  '/backend/acceso/logout' , [AccesoController::class , 'logout'] ) ;
Router::Get(  '/backend/acceso/forgot-password' , [AccesoController::class , 'forgot_password'] ) ;
Router::Get(  '/backend/acceso/no-access' , [AccesoController::class , 'no_access'] ) ;

Router::Get( '/backend/instrumentos/listado' , [InstrumentosController::class , 'listado'] ) ;
Router::Get( '/backend/instrumentos/detalle/:id' , [InstrumentosController::class , 'detalle'] ) ;
Router::Get( '/backend/instrumentos/borrar/:id' , [InstrumentosController::class , 'borrar'] ) ;
Router::Get(  '/backend/instrumentos/crear' , [InstrumentosController::class , 'crear'] ) ;
Router::Post( '/backend/instrumentos/crear' , [InstrumentosController::class , 'crear_grabar'] ) ;
Router::Get( '/backend/instrumentos/modificar/:id' , [InstrumentosController::class , 'modificar'] ) ;
Router::Post('/backend/instrumentos/modificar/:id' , [InstrumentosController::class , 'modificar_grabar'] ) ;



Router::Get( '/backend/files/listado' , [FilesController::class , 'listado'] ) ;
Router::Get( '/backend/files/borrar/:id' , [FilesController::class , 'borrar'] ) ;
Router::Get( '/backend/files/detalle/:id' , [FilesController::class , 'detalle'] ) ;


Router::Get( '/backend/usuarios/listado' , [UsuariosController::class , 'listado'] ) ;
Router::Get( '/backend/usuarios/detalle/:id' , [UsuariosController::class , 'detalle'] ) ;
Router::Get( '/backend/usuarios/borrar/:id' , [UsuariosController::class , 'borrar'] ) ;
Router::Get( '/backend/usuarios/crear' , [UsuariosController::class , 'crear'] ) ;
Router::Post( '/backend/usuarios/crear' , [UsuariosController::class , 'crear_grabar'] ) ;
Router::Get( '/backend/usuarios/modificar/:id' , [UsuariosController::class , 'modificar'] ) ;
Router::Post( '/backend/usuarios/modificar/:id' , [UsuariosController::class , 'modificar_grabar'] ) ;