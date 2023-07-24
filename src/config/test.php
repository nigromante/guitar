<?php 
use Framework\Router;
use Controllers\frontend\TestController;


Router::Get( '/xdebug' , function() { return 
    xdebug_info(); 
}   ) ; 


Router::Get( '/test/instrumentos' , [TestController::class , 'index'] ) ;

Router::Get( '/test/:paso' , function($paso) { return "test : " . $paso ;} ) ;

