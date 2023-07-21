<?php
namespace Sebastian\Guitar\shared\application\controllers;

use Sebastian\Guitar\instrumentos\application\services\getSelectedInstrumentos;
use Sebastian\Guitar\instrumentos\infrastructure\repositories\InstrumentoDatabaseRepository;
// use Sebastian\Guitar\instrumentos\infrastructure\repositories\InstrumentoInMemoryRepository;


class Controller extends \Framework\Controller {

    protected $instrumentos ;

    public function __construct(  )
    {
        parent::addGlobals( "instrumentos", $this->AllInstrumentos() ) ;
    }

    private function AllInstrumentos() {
        $serviceAll = new getSelectedInstrumentos( new InstrumentoDatabaseRepository() ) ; 
        return  $serviceAll->execute() ; 

    }

}