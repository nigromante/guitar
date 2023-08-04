<?php

namespace Framework;

use Framework\ViewData;


class View
{

    private static $BASE_APP;

    private const BASE_PATH = "/var/www/views";

    public static function setApp($app)
    {
        self::$BASE_APP = $app;
    }

    public static function getApp()
    {
        return self::BASE_PATH . "/" .  self::$BASE_APP;
    }



    public static function include($view_file, $layout, $data)
    {
        extract($data);
        include self::getApp() . "/layouts/" . $layout . ".html.php";
    }

    public static function include_part($view_part_file, $data)
    {
        extract($data);
        include self::getApp() . "/parts/" . $view_part_file . ".html.php";
    }

    public static function include_content($view_file, $data)
    {
        extract($data);
        include self::getApp() . "/" . $view_file . ".html.php";
    }

    public static function transform($html)
    {
        $html = preg_replace_callback("#{{.*:.*}}#", [self::class, "find_and_set"], $html);
        $html = preg_replace_callback("#{{.*}}#", [self::class, "find_and_replace"], $html);

        return $html;
        //return self::minify_html($html, true)  ; 
    }


    public static function minify_html($html, $use = true)
    {
        if (!$use) return $html;

        $search = array(
            '/(\n|^)(\x20+|\t)/',
            '/(\n|^)\/\/(.*?)(\n|$)/',
            '/\n/',
            '/\<\!--.*?-->/',
            '/(\x20+|\t)/', # Delete multispace (Without \n)
            '/\>\s+\</', # strip whitespaces between tags
            '/(\"|\')\s+\>/', # strip whitespaces between quotation ("') and end tags
            '/=\s+(\"|\')/'
        ); # strip whitespaces between = "'

        $replace = array(
            "\n",
            "\n",
            " ",
            "",
            " ",
            "><",
            "$1>",
            "=$1"
        );

        $html = preg_replace($search, $replace, $html);
        return $html;
    }


    // private $values ; 

    public static function find_and_set($text_arr)
    {
        $text = $text_arr[0];
        $text = str_replace("{{", "", $text);
        $text = str_replace("}}", "", $text);
        $key = "";
        $value = "";
        list($key, $value)  = explode("::", $text);
        if ($value != null) {
            ViewData::getInstance()->set($key, $value);
        }
        return "";
    }

    public static function find_and_replace($text_arr)
    {
        $text = $text_arr[0];
        $text = str_replace("{{", "", $text);
        $text = str_replace("}}", "", $text);

        return ViewData::getInstance()->get($text);
    }
}
