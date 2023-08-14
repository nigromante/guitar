<?php

namespace App\Auth\Domain\Notifies;


class NotifyEvent
{

    public function __construct( private $data, private $dest )
    {
    }

    public function data()
    {
        return [
            "data" => $this->data,
            "destinatary" => $this->dest
        ];
    }
}
