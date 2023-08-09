<?php

namespace Framework;


class Logger
{

    const USER_ERROR_DIR = '/var/www/logs/guitar.log';
    const USER_ALERTS_DIR = '/var/www/logs/guitar_alerts.log';



    public static function Alert($msg, $subject = "Alert" )
    {

        global $ClientIpAddress;

        $date = date('d.m.Y h:i:s');

        $log = "ALERT | $date | {$ClientIpAddress} | $msg \n";

        mail("julianvidal@live.cl", $subject , $log , "From: sistema@guitar.cl");


        error_log($log, 3, self::USER_ALERTS_DIR);
    }

    public static function Error($msg, $subject = "Error" )
    {

        $date = date('d.m.Y h:i:s');

        $log = "ERROR :: $date  |  $msg \n";

        mail("julianvidal@live.cl", $subject , $log , "From: sistema@guitar.cl");

        error_log($log, 3, self::USER_ERROR_DIR);
    }
}
