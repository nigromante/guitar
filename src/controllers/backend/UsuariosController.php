<?php

namespace Controllers\backend;

use  Controllers\backend\SecureController;

use Framework\crypt\CryptMD5 as CRYPT ;

// Model
use Domain\domain\entities\User;

// Services
use Domain\application\services\Usuarios\DisableUser;
use Domain\application\services\Usuarios\FindById;
use Domain\application\services\Usuarios\GetAllUsers;
use Domain\application\services\Usuarios\CreateUsuario;
use Domain\application\services\Usuarios\UpdateUser;
// Repositories
use Domain\infrastructure\repositories\Usuarios\Database\GetAllUsersRepository;
use Domain\infrastructure\repositories\Usuarios\Database\CreateUserRepository;
use Domain\infrastructure\repositories\Usuarios\Database\FindByIdRepository;
use Domain\infrastructure\repositories\Usuarios\Database\ChangeUserStateRepository;
use Domain\infrastructure\repositories\Usuarios\Database\UpdateUserRepository;


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
        $servicefind = new FindById(new FindByIdRepository());
        $user = $servicefind->execute($id);


        $service = new DisableUser(new ChangeUserStateRepository());
        $usuario = $service->execute($user);
        return $usuario->getFullName() . " Disabled";
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

        $password = empty($data['password']) ? '' : ( new CRYPT() )->encript( $data['password']) ;

        $user = new User(
            $id, 
            $data['Nombre'] , 
            $data['Apellido'] , 
            $data['Email'] , 
            0,
            '',
            $password 
        ) ;  


        $service = new UpdateUser(new UpdateUserRepository());
        $userUpdated = $service->execute($user);
        return $this->View("modificar_grabar", compact( 'userUpdated' ));
    }
}
