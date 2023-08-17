<?php 

namespace Workers\RabbitMQ;


interface RabbitMQConsumerInterface {

    public function handle( $msg ) ;

}