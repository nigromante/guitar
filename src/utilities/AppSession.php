<?php

namespace utilities;

class AppSession {

    public static function UserSet( $key, $name ) {

        $_SESSION['user.email'] = $key;
        $_SESSION['user.nombre'] = $name ;
    }
    public static function UserCheck() {

        return isset( $_SESSION['user.email'] ) ;
    }

    public static function UserName( ) {

        return $_SESSION['user.nombre'] ;
    }

}
