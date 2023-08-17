<?php

namespace Controllers\api;

use  Controllers\api\Controller;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitController extends Controller
{


    public function send()
    {

        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
        $channel = $connection->channel();
 
        $channel->queue_declare('hello', false, false, false, false);

        $msg = new AMQPMessage('julianvidal@live.cl');
        $channel->basic_publish($msg, '', 'hello');
        
        echo " [x] Sent 'Hello World!'\n";

        $channel->close();
        $connection->close();


        return "rabbit send" ;
    }
}
