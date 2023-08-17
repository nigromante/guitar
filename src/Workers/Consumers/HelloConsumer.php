<?php 

namespace Workers\Consumers;
use Workers\RabbitMQ\RabbitMQConsumer;
use Workers\RabbitMQ\RabbitMQConsumerInterface;

final class  HelloConsumer extends RabbitMQConsumer implements RabbitMQConsumerInterface {
    public $queue_name = 'hello' ;

    public function handle( $msg ) {

        $email = $msg->body ; 
        echo ' [x] Received handle [RabbitConsumerHello] ... ', $msg->body, "\n";

    }
    

}