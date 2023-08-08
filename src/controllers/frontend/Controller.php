<?php

namespace Controllers\frontend;

use Domain\application\services\Instrumentos\getSelectedInstrumentos;
use Domain\infrastructure\repositories\Instrumentos\InstrumentoDatabaseRepository;


class Controller extends \Framework\Controller
{

    protected $instrumentos;

    public function __construct()
    {
        $serviceAll = new getSelectedInstrumentos(new InstrumentoDatabaseRepository());
        $instrumentos =  $serviceAll->execute();
        parent::addGlobals("instrumentos", $instrumentos );
    
   }

}
