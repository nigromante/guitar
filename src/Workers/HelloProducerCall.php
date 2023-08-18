<?php 
namespace Workers;

use Workers\Producers\HelloProducer;
use Workers\RabbitMQ\RabbitMQConnection;
use Workers\RabbitMQ\RabbitMQConnectionCommand;

class HelloProducerCall {

    public static function Send( $message ) {

        $connection = RabbitMQConnection::Init( new RabbitMQConnectionCommand('rabbitmq', 5672, 'guest', 'guest')  ) ;

        $consumer = new HelloProducer( $connection );
    
        $consumer->message( $message ) ; 

    }

}


