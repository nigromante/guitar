<?php

namespace Utilities;

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
    public static function UserEmail( ) {

        return $_SESSION['user.email'] ;
    }
    public static function UserThemeSet( $key ) {
        $_SESSION['user.theme'] = $key;
    }
    
    public static function UserThemeGet( ) {
        return $_SESSION['user.theme'] ;
    }


}
