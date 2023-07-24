<?php
namespace Sebastian\Guitar\backend\instrumentos\infrastructure\repositories;
use Sebastian\Guitar\backend\instrumentos\infrastructure\repositories\InstrumentoRepository;

class InstrumentoInMemoryRepository  implements  InstrumentoRepository {

    private $marcas ;
    private $selected ;

    public function __construct() {
        $this->marcas = [ 
            "IBZ" =>  [ "nombre" => "Ibanez" , "descripcion" => "Ibanez"  ]  , 
            "GIB" =>  [ "nombre" => "Gibson" , "descripcion" => "asdf"  ]  , 
            "FEN" =>  [ "nombre" => "Fender" , "descripcion" => "jkjkjk" ]  , 
            "PRS" =>  [ "nombre" => "Paul Reed Smith" , "descripcion" => "cachilupi"  ]  , 
            ] ;

            $this->selected = [ "GIB" , "FEN", "PRS" ] ;

            asort( $this->marcas ) ;
    }


    public function All() {
        return $this->marcas ; 

    }

    public function Selected()
    {
        $response = [] ; 
        foreach( $this->selected as $key ) {
            $response[ $key ] = $this->marcas[ $key ] ;
        }

        return $response ; 
    }
    
    public function NonSelected()
    {
        $response = [] ;
        $akeys = array_keys( $this->marcas ) ; 
        foreach( $akeys as $key ) {
            if( ! in_array( $key , $this->selected ) ) {

                $response[ $key ] = $this->marcas[ $key ] ;
            }
        }

        return $response ; 
        
    }


    public function FindByAlias( $alias ) {
        if( !isset($this->marcas[ $alias ]))
            return false;

        return $this->marcas[ $alias ] ; 

    }

    public function FindById( $id ) {
        if( !isset($this->marcas[ $id ]))
            return false;

        return $this->marcas[ $id ] ; 

    }

    public function Save() {}

}
?>