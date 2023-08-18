<?php

namespace Workers\RabbitMQ;

abstract class RabbitMQConsumer
{

    private $connection;
    private $channel;
    public $queue_name = '';

    public function __construct($connection)
    {
        $this->connection = $connection;

        $this->channel =  $this->connection->channel();
        $this->channel->queue_declare($this->queue_name, false, false, false, false);
    }


    public function handle($msg)
    {
        $fecha = date('Y-m-d H:i:s');
        $class = get_class( $this ) ;

        echo $fecha , " :: " , $class , ' : ' , $msg->body ;

    }


    public function run()
    {
        $this->channel->basic_consume($this->queue_name, '', false, true, false, false, function ($msg) {
            $this->handle($msg);
        });

        while ($this->channel->is_open()) {
            echo "\n" , '> ';
            $this->channel->wait();
        }

        $this->channel->close();
        $this->connection->close();
    }
}
