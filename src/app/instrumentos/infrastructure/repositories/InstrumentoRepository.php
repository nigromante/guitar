<?php

namespace Sebastian\Guitar\instrumentos\infrastructure\repositories;

interface  InstrumentoRepository {

    public function All() ;
    public function Selected() ;
    public function NonSelected() ;
    public function FindByAlias( $alias ) ;
    public function FindById($id) ;
    public function Borrar($id) ;

    public function Save();

}
?>