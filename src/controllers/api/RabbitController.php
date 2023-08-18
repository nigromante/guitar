<?php

namespace Controllers\api;

use  Controllers\api\Controller;

use Workers\HelloProducerCall;

class RabbitController extends Controller
{

    public function send()
    {
        $message = 'julianvidal@live.cl' ; 
        $fecha = date('Y-m-d H:i:s');

        echo "\n" .  '[x] ' , $fecha , ' :: Sent :: ' , $message ;


        HelloProducerCall::Send( $message ) ;


        return "" ;
    }
}
