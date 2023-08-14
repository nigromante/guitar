<?php

namespace Framework;


class FileLog
{

    const USER_ERROR_DIR = '/var/www/logs/guitar.log';
    const USER_ALERTS_DIR = '/var/www/logs/guitar_alerts.log';



    public static function Alert($msg)
    {

        global $ClientIpAddress;

        $date = date('d.m.Y h:i:s');

        $log = "ALERT | $date | {$ClientIpAddress} | $msg \n";

        error_log($log, 3, self::USER_ALERTS_DIR);
    }

    public static function Error($msg)
    {

        $date = date('d.m.Y h:i:s');

        $log = "ERROR :: $date  |  $msg \n";

        error_log($log, 3, self::USER_ERROR_DIR);
    }
}
