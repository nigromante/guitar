<?php
namespace Workers\RabbitMQ;

use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQProducer {

    private $connection;
    private $channel;
    public $queue_name = '';

    public function __construct($connection)
    {
        $this->connection = $connection;

        $this->channel =  $this->connection->channel();
        $this->channel->queue_declare($this->queue_name, false, false, false, false);
    }

    public function message( $message ) {

        $msg = new AMQPMessage( $message );
        $this->channel->basic_publish($msg, '', $this->queue_name );
   
        $this->channel->close();
        $this->connection->close();

    }

}

