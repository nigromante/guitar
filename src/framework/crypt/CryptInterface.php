<?php

namespace Framework\crypt;

interface CryptInterface  
{

    public static function encript( $input ): string ;

    public static function decript( $input ): string ;

}