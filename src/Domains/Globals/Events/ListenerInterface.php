<?php

namespace App\Globals\Events;

interface ListenerInterface
{

    public function __construct($event);

    public function handle();
}
