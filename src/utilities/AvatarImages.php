<?php

namespace Utilities;

class AvatarImages {


    public static function ResolverAvatar( $avatar ) {


        $avatar_img = '';
        if( $avatar == 'cptkirk')
        $avatar_img = 'https://source.unsplash.com/Mv9hjnEUHR4/60x60' ;
        return $avatar_img ;

    }
}

