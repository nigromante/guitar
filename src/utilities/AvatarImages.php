<?php

namespace Utilities;

class AvatarImages {
    
 
    private static $avatars = [
        
        'startrek' =>  [ 'name' => 'Star Trek' , 
            'characters' => [
                'cptkirk' => [  'description'=> 'Capitan James Kirk' , 'image' => '/cptkirk.jpeg']
            ]
        ] , 

        'starwars' =>  [ 'name' => 'Star Wars' , 
            'characters' => [
                'luke' => [  'description'=> 'Luke Skywalker' , 'image' => ''] 
            ]
        ] ,
        
        

        'lotr' =>  [ 'name' => 'Lord of the rings' , 
            'characters' => [
                'frodo' => [  'description'=> 'Frodo Bolson' , 'image' => ''] 
            ]
        ] ,
    ] ;

    public static function All(  $theme ) {
        return self::$avatars[ $theme ][ 'characters'] ;
    }

    public static function AllThemes( ) {
        $themes = [] ;

        foreach( self::$avatars as $key => $value ) {
            $themes[ $key ] = $value['name'] ;
        }
        return $themes  ; 
    }



    public static function ResolverAvatarImage( $theme , $avatar ) {

        if( $avatar == null )
            return '' ;

        $avatars = self::$avatars[ $theme ]['characters'] ;

        if( ! isset( $avatars[ $avatar ] ) )
            return '';

        return $avatars[ $avatar ]['image'] ;
    }


    public static function ResolverAvatarDescription( $theme, $avatar ) {

        if( $avatar == null )
            return '' ;
            $avatars = self::$avatars[ $theme ]['characters'] ;

            if( ! isset( $avatars[ $avatar ] ) )
                return '';
    
            return $avatars[ $avatar ]['description'] ;
    }


}

