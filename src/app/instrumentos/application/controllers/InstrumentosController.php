<?php
namespace Sebastian\Guitar\instrumentos\application\controllers;

use Sebastian\Guitar\instrumentos\application\services\Borrar;
use  Sebastian\Guitar\shared\application\controllers\Controller;

use Sebastian\Guitar\instrumentos\application\services\FindById;
use Sebastian\Guitar\instrumentos\application\services\FindByAlias;
use Sebastian\Guitar\instrumentos\application\services\getAllInstrumentos;
use Sebastian\Guitar\instrumentos\application\services\getNonSelectedInstruments;
use Sebastian\Guitar\instrumentos\infrastructure\repositories\InstrumentoDatabaseRepository;
use Sebastian\Guitar\instrumentos\infrastructure\repositories\InstrumentoInMemoryRepository;


class InstrumentosController extends Controller {

    public function index() {

        return $this->View( 'index' , [], "home" ) ;
    }

    public function info() {

        return $this->Data( json_encode($this->Globals()) ) ;
    }

    public function marca( $codigo = '' ) {


        if( empty($codigo)) 
            return $this->redirect( "/" ) ;

        if( $codigo != "otras-marcas" ) {
            $service = new FindByAlias( new InstrumentoDatabaseRepository() ) ; 
            $instrumento = $service->execute( $codigo ) ; 
            if( $instrumento === false ) {
                return $this->redirect( "/" ) ;
            }
            return $this->View( 'marca' , compact('instrumento') ) ;
        }

        $service = new getNonSelectedInstruments( new InstrumentoDatabaseRepository() ) ; 
        $instrumentosOtrasMarcas = $service->execute( ) ; 
        if( $instrumentosOtrasMarcas === false ) {
            return $this->redirect( "/" ) ;
        }
        return $this->View( 'otrasMarcas' , compact('instrumentosOtrasMarcas') ) ;

    }

 public function mantencion_listado() {

    $service = new getAllInstrumentos( new InstrumentoDatabaseRepository() ) ; 
    $instrumentos_listado = $service->execute( ) ; 
    return $this->View( 'mantencion_listado' , compact('instrumentos_listado'), "admin" ) ;

 }

 public function mantencion_detalle( $id ) {
    $service = new FindById( new InstrumentoDatabaseRepository() ) ; 
    $instrumento = $service->execute( $id ) ; 
    return $this->View( 'mantencion_detalle' , compact('instrumento') ) ;
 }

 public function mantencion_borrar( $id ) {
    $service = new Borrar( new InstrumentoDatabaseRepository() ) ; 
    $instrumento = $service->execute( $id ) ; 
    return "Registro Eliminado" ;
 }


}