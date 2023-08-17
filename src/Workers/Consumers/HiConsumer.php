<?php 

namespace Workers\Consumers;
use Workers\RabbitMQ\RabbitMQConsumer;
use Workers\RabbitMQ\RabbitMQConsumerInterface;

final class  HiConsumer extends RabbitMQConsumer implements RabbitMQConsumerInterface {
    public $queue_name = 'hello' ;

    public function handle( $msg ) {

        echo ' [x] Received handle [HiConsumer] ... ', $msg->body, "\n";

    }
    

}