<?php 
use Framework\Router;


Router::Get( '/xdebug' , function() { return 
    xdebug_info(); 
}   ) ; 

Router::Get( '/test/:paso' , function($paso) { return "test : " . $paso ;} ) ;
