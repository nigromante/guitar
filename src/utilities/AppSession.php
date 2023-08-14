<?php

namespace Utilities;

class AppSession {


    public static function UserCheck() {

        return isset( $_SESSION['user.email'] ) ;
    }

    public static function UserEmailSet( $email ) {

        $_SESSION['user.email'] = $email;
    }

    public static function UserEmailGet( ) {

        return $_SESSION['user.email'] ;
    }



    public static function UserNameSet( $name ) {
        $_SESSION['user.nombre'] = $name ;
    }


    public static function UserNameGet( ) {

        return $_SESSION['user.nombre'] ;
    }

    
    public static function UserThemeSet( $key ) {
        $_SESSION['user.theme'] = $key;
    }
    
    public static function UserThemeGet( ) {
        return $_SESSION['user.theme'] ;
    }


}
