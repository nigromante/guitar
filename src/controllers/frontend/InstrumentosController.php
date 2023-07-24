<?php
namespace Controllers\frontend;

use  Controllers\frontend\Controller;

use Domain\application\services\Instrumentos\FindByAlias;
use Domain\application\services\Instrumentos\getNonSelectedInstruments;
use Domain\infrastructure\repositories\Instrumentos\InstrumentoDatabaseRepository;




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



}