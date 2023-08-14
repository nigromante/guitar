<?php

namespace Framework;


class Event
{

    private static $events = [];
    private static $listeners = [];

    public static function Listeners($listeners)
    {
        self::$listeners = $listeners;
    }


    public static function dispatch($data)
    {
        $eventName = $data::class;
        if (isset(self::$listeners[$eventName])) {
            self::$events[$eventName] = $data;
        }
    }


    public static function proccess()
    {
        while ($event = self::pop()) {
            if (isset(self::$listeners[$event['name']])) {
                foreach (self::$listeners[$event['name']] as $listener) {
                    (new $listener($event['object']))->handle();
                }
            }
        }
    }

    private static function pop()
    {
        if (count(self::$events) == 0)
            return false;

        $ret = ['name' => key(self::$events), 'object' => reset(self::$events)];
        array_shift(self::$events);
        return $ret;
    }

}
