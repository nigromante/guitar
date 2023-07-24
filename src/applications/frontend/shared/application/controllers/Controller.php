<?php
namespace Sebastian\Guitar\frontend\shared\application\controllers;

use Sebastian\Guitar\frontend\instrumentos\application\services\getSelectedInstrumentos;
use Sebastian\Guitar\frontend\instrumentos\infrastructure\repositories\InstrumentoDatabaseRepository;
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