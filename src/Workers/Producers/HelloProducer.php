<?php
namespace Workers\Producers;
use Workers\RabbitMQ\RabbitMQProducer;


class HelloProducer extends RabbitMQProducer {

    public $queue_name = 'hello';

}