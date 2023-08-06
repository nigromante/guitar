<?php

namespace Framework\crypt;

class CryptMD5 implements CryptInterface 
{

    public static function encript( $input ): string {
        return md5($input) ;
    }

    public static function decript( $input ): string {
        return $input;
    }

}
