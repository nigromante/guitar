<?php
use Nigromante\Framework\Router ;
use Controllers\frontend\InstrumentosController;
use Controllers\frontend\ContactoController;



Router::Get('/', ['Controllers\frontend\HomeController','index']);

Router::Get('/instrumentos/marca/:codigo', [InstrumentosController::class, 'marca']);
Router::Get('/instrumentos/otrasmarcas', [InstrumentosController::class, 'otrasmarcas']);

Router::Get('/contacto/form', [ContactoController::class, 'form']);
Router::Post('/contacto/form', [ContactoController::class, 'formPost']);
