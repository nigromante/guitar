<?php
namespace Controllers\backend;

use  Controllers\backend\Controller;

use Domain\application\services\Instrumentos\Borrar;
use Domain\application\services\Instrumentos\FindById;
use Domain\application\services\Instrumentos\getAllInstrumentos;
use Domain\infrastructure\repositories\Instrumentos\InstrumentoDatabaseRepository;


class InstrumentosController extends Controller {


    public function listado() {

        $service = new getAllInstrumentos( new InstrumentoDatabaseRepository() ) ; 
        $instrumentos_listado = $service->execute( ) ; 
        return $this->View( 'listado' , compact('instrumentos_listado') ) ;

    }

    public function detalle( $id ) {
        $service = new FindById( new InstrumentoDatabaseRepository() ) ; 
        $instrumento = $service->execute( $id ) ; 
        return $this->View( 'detalle' , compact('instrumento') ) ;
    }

    public function borrar( $id ) {
        $service = new Borrar( new InstrumentoDatabaseRepository() ) ; 
        $instrumento = $service->execute( $id ) ; 
        return "Registro Eliminado" ;
    }


}