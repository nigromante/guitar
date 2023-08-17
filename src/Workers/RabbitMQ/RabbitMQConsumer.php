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
    }


    public function run()
    {

        echo ' [x] Receiving events from queue : ', $this->queue_name, "\n\n";

        $this->channel->basic_consume($this->queue_name, '', false, true, false, false, function ($msg) {
            $this->handle($msg);
        });

        while ($this->channel->is_open()) {
            echo "\n", '> ';
            $this->channel->wait();
        }

        echo ' [x] Stop Receiving events for : ', $this->queue_name, "\n";

        $this->channel->close();
        $this->connection->close();
    }
}
