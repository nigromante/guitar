<?php

namespace Framework\crypt;

class CryptNothing implements CryptInterface 
{

    public static function encript( $input ): string {
        return $input ;
    }

    public static function decript( $input ): string {
        return $input;
    }

}