<?php

namespace Domain\infrastructure\repositories\Usuarios;


interface  UsuarioRepository
{

    public function All();
    public function Selected();
    public function NonSelected();
    public function FindByEmail($email);
    public function FindById($id);
    public function Borrar($id);

    public function Save($data);
    public function Update($id, $data);
    public function UserCheckLogin($Email, $password);

    public function UserLoginSuccess($Email);
    public function UserLoginError($Email);

}
