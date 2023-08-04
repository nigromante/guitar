<?php

namespace Controllers\backend;

use  Controllers\backend\SecureController;

use Domain\application\services\Instrumentos\Borrar;
use Domain\application\services\Instrumentos\FindById;
use Domain\application\services\Instrumentos\Update;
use Domain\application\services\Instrumentos\getAllInstrumentos;
use Domain\application\services\Instrumentos\Save;
use Domain\infrastructure\repositories\Instrumentos\InstrumentoDatabaseRepository;


class InstrumentosController extends SecureController
{


    public function listado()
    {

        $service = new getAllInstrumentos(new InstrumentoDatabaseRepository());
        $instrumentos_listado = $service->execute();
        return $this->View('listado', compact('instrumentos_listado'));
    }


    public function crear()
    {

        return $this->View('crear', []);
    }

    public function crear_grabar()
    {
        $data = $this->Post();
        var_dump($data);
        $service = new Save(new InstrumentoDatabaseRepository());
        $instrumento = $service->execute($data);
        return $this->View("crear_grabar", []);
    }

    public function detalle($id)
    {
        $service = new FindById(new InstrumentoDatabaseRepository());
        $instrumento = $service->execute($id);
        return $this->View('detalle', compact('instrumento'));
    }

    public function borrar($id)
    {
        $service = new Borrar(new InstrumentoDatabaseRepository());
        $instrumento = $service->execute($id);
        return "Registro Eliminado";
    }


    public function modificar($id)
    {
        $service = new FindById(new InstrumentoDatabaseRepository());
        $instrumento = $service->execute($id);
        return $this->View('modificar', compact('id', 'instrumento'));
    }

    public function modificar_grabar($id)
    {
        $data = $this->Post();
        var_dump($data);
        $service = new Update(new InstrumentoDatabaseRepository());
        $instrumento = $service->execute($id, $data);
        return $this->View("modificar_grabar", []);
    }
}
