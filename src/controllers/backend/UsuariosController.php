<?php

namespace Controllers\backend;

use  Controllers\backend\SecureController;

use Framework\crypt\CryptMD5 as CRYPT ;

// Services
use Domain\application\services\Usuarios\Borrar;
use Domain\application\services\Usuarios\FindById;
use Domain\application\services\Usuarios\Update;
use Domain\application\services\Usuarios\getAllUsuarios;
use Domain\application\services\Usuarios\CreateUsuario;
use Domain\application\services\Usuarios\CreateUsuarioCommand;
// Repositories
use Domain\infrastructure\repositories\Usuarios\UsuarioDatabaseRepository;
use Domain\infrastructure\repositories\Usuarios\Database\UsuariosAllRepository;
use Domain\infrastructure\repositories\Usuarios\Database\CreateUserRepository;


class UsuariosController extends SecureController
{

    public function listado()
    {
        $service = new getAllUsuarios( new UsuariosAllRepository() );
        $usuarios_listado = $service->execute();
        return $this->View('listado', compact('usuarios_listado'));
    }


    public function crear()
    {
        return $this->View('crear', []);
    }


    public function crear_grabar()
    {
        $data = $this->Post();
        $data_command = new CreateUsuarioCommand( 
                $data['Nombre'] , 
                $data['Apellido'] , 
                $data['Email'] , 
                ( new CRYPT() )->encript( $data['password']) 
            ) ;  

        $service = new CreateUsuario(new CreateUserRepository());
        $service->execute( $data_command );
        return $this->View("crear_grabar", compact( 'data_command' ));
    }



    public function detalle($id)
    {
        $service = new FindById(new UsuarioDatabaseRepository());
        $usuario = $service->execute($id);
        return $this->View('detalle', compact('usuario'));
    }


    public function borrar($id)
    {
        $service = new Borrar(new UsuarioDatabaseRepository());
        $usuario = $service->execute($id);
        return "Registro Eliminado";
    }


    public function modificar($id)
    {
        $service = new FindById(new UsuarioDatabaseRepository());
        $usuario = $service->execute($id);
        return $this->View('modificar', compact('id', 'usuario'));
    }


    public function modificar_grabar($id)
    {
        $data = $this->Post();
        $service = new Update(new UsuarioDatabaseRepository(), new CRYPT());
        $service->execute($id, $data);
        return $this->View("modificar_grabar", []);
    }
}
