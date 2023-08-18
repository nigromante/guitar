<?php 

require_once  '../vendor/autoload.php';
system('clear');

use Workers\HelloProducerCall;

HelloProducerCall::Send( "julianvidal@live.cl" ) ;
