<?php

namespace Domain\infrastructure\repositories\Usuarios;
use Domain\application\services\Usuarios\CreateUsuarioCommand;


interface  UsuarioRepository
{

    public function Selected();
    public function NonSelected();
    public function FindByEmail($email);
    public function FindById($id);
    public function Borrar($id);

    public function Update($id, $data);
    public function UserCheckLogin($Email, $password);

    public function UserLoginSuccess($Email);
    public function UserLoginError($Email);

    public function UserSession();
}
