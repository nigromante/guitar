<?php

namespace Utilities;

class AppSession {


    public static function getId() {
        return session_id();    
    }


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

        if( ! isset( $_SESSION['user.nombre'] ))
            return null ; 

        return $_SESSION['user.nombre'] ;
    }

    
    public static function UserThemeSet( $key ) {
        $_SESSION['user.theme'] = $key;
    }
    
    public static function UserThemeGet( ) {

        if( ! isset( $_SESSION['user.theme'] ))
            return null ;
             
        return $_SESSION['user.theme'] ;
    }

    public static function UserAvatarSet( $key ) {
        $_SESSION['user.avatar'] = $key;
    }
    
    public static function UserAvatarGet( ) {

        if( ! isset( $_SESSION['user.avatar'] ))
            return null ;
             
        return $_SESSION['user.avatar'] ;
    }


}
