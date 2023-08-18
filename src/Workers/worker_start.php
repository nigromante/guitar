<?php

require_once  '../vendor/autoload.php';

date_default_timezone_set('America/Santiago');
require_once "../config/load.php";


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

        $consumer = new $consumer_name( $connection );

        $consumer->run();

    }
