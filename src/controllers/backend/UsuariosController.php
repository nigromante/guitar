<?php

namespace Controllers\backend;

use  Controllers\backend\SecureController;

use Domain\domain\entities\User;
use Framework\crypt\CryptMD5 as CRYPT ;

// Services
use Domain\application\services\Usuarios\Borrar;
use Domain\application\services\Usuarios\FindById;
use Domain\application\services\Usuarios\Update;
use Domain\application\services\Usuarios\GetAllUsers;
use Domain\application\services\Usuarios\CreateUsuario;
// Repositories
use Domain\infrastructure\repositories\Usuarios\UsuarioDatabaseRepository;
use Domain\infrastructure\repositories\Usuarios\Database\GetAllUsersRepository;
use Domain\infrastructure\repositories\Usuarios\Database\CreateUserRepository;
use Domain\infrastructure\repositories\Usuarios\Database\FindByIdRepository;


class UsuariosController extends SecureController
{

    public function listado()
    {
        $service = new GetAllUsers( new GetAllUsersRepository() );
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
        $user = new User(
                null, 
                $data['Nombre'] , 
                $data['Apellido'] , 
                $data['Email'] , 
                0,
                '',
                ( new CRYPT() )->encript( $data['password']) 
            ) ;  

        $service = new CreateUsuario(new CreateUserRepository());
        $newUser = $service->execute($user);
        return $this->View("crear_grabar", compact( 'newUser' ));
    }



    public function detalle($id)
    {
        $service = new FindById(new FindByIdRepository());
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
        $service = new FindById(new FindByIdRepository());
        $usuario = $service->execute($id);
        return $this->View('modificar', compact('usuario'));
    }


    public function modificar_grabar($id)
    {
        $data = $this->Post();
        $service = new Update(new UsuarioDatabaseRepository(), new CRYPT());
        $service->execute($id, $data);
        return $this->View("modificar_grabar", []);
    }
}
