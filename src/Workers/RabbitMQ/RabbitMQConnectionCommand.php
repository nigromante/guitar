<?php

namespace Workers\RabbitMQ;

class RabbitMQConnectionCommand {

    public function __construct( public string $server , public int $port, public string $user, public string $password ) {}

}