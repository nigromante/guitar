<?php

require_once  '../vendor/autoload.php';

use Workers\Consumers\HelloConsumer;
use Workers\RabbitMQ\RabbitMQConnection;
use Workers\RabbitMQ\RabbitMQConnectionCommand;

    system('clear');

    $connections = [ 
        'rabbitmq' => RabbitMQConnection::Init( new RabbitMQConnectionCommand('rabbitmq', 5672, 'guest', 'guest')  ) 
        ] ;

    $consumers = [
      HelloConsumer::class => $connections[ 'rabbitmq' ]
    ] ;


    foreach( $consumers as $consumer_name => $connection ) {

        echo "\n" , $consumer_name ;
        // $fiber = new Fiber(function( $consumer_name, $connection ) : void {

            echo "\n" , 'Instance of ' , $consumer_name , "\n" ; 
        //    Fiber::suspend('fiber') ;

            $consumer = new $consumer_name( $connection );

            $consumer->run();
  
        // });

        //$fiber->start( $consumer_name, $connection );

    }


