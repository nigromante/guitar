<?php

namespace Framework;

use Framework\View;

class Controller
{

    private $globals = [];

    public function addGlobals($key, $value)
    {
        $this->globals[$key] = $value;
    }

    public function Globals()
    {
        return $this->globals;
    }

    public function View($viewName,  $data = [], $layout = 'default')
    {

        dump_group('view', 'View');
        dumpsection($layout, 'layout');


        $data = array_merge($data, $this->globals);

        $viewFile = $this->ViewFile($viewName);

        ob_start();
        View::include($viewFile, $layout, $data, []);
        $response = ob_get_clean();

        return  View::transform($response);
    }

    private function ViewFile($viewName)
    {
        $t = explode("\\", $this->Clase());

        $controller_name = array_pop($t);
        $controller_name = str_replace("Controller", "", $controller_name);

        $aplication_name = array_pop($t);

        dump_group('view', 'View');
        dumpsection($aplication_name, 'aplication_name');
        dumpsection($controller_name, 'controller_name');
        dumpsection($viewName, 'viewName');


        View::setApp($aplication_name);

        return "{$controller_name}/{$viewName}";
    }


    public function Raw($text)
    {
        return  $text;
    }

    public function Data($data)
    {
        return $data;
    }


    public function redirect($destino)
    {
        header("Location: {$destino}");
        return false;
    }

    public function Clase()
    {
        return static::class;
    }

    public function Post()
    {
        global $ENV_VARS;
        return $ENV_VARS["POST"];
    }
}
