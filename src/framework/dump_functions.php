<?php
    use \Framework\Dump ; 

    function dump( $data, $title = "" ) {
        Dump::getInstance()->set( $data, $title ) ; 
    }

    function getDump( ) {
        return Dump::getInstance()->get() ; 
    }
