<?php

namespace Controllers\api;

use  Controllers\api\Controller;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitController extends Controller
{

    private function message( $queue , $message ) {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
        $channel = $connection->channel();
 
        $channel->queue_declare( $queue, false, false, false, false);

        $msg = new AMQPMessage( $message );
        $channel->basic_publish($msg, '', $queue);
        

        $channel->close();
        $connection->close();

    }



    public function send()
    {
        $message = 'julianvidal@live.cl' ; 
        $fecha = date('Y-m-d H:i:s');

        echo "\n" .  '[x] ' , $fecha , ' :: Sent :: ' , $message ;

        $this->message( 'hello' , $message ) ; 

        return "" ;
    }
}
