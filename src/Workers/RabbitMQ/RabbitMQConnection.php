<?php

namespace Workers\RabbitMQ;

use PhpAmqpLib\Connection\AMQPStreamConnection;


class RabbitMQConnection {

    public static function Init( RabbitMQConnectionCommand $command ) {
        return new AMQPStreamConnection( $command->server , $command->port, $command->user, $command->password ) ; 
    }
}