<?php

use \Framework\Dump;

function dump($data, $title = "")
{
    Dump::getInstance()->setGroup();
    Dump::getInstance()->set($data, $title);
}

function dump_group($group, $description = "")
{
    Dump::getInstance()->setGroup($group, $description);
}


function dumpsection($data, $title = "")
{
    Dump::getInstance()->set($data, $title);
}


function getDump()
{
    return Dump::getInstance()->getAll();
}
