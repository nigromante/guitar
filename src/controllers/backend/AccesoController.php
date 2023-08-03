<?php
namespace Controllers\backend;

use  Controllers\backend\Controller;
use Domain\application\services\Usuarios\CheckLogin;
use Domain\application\services\Usuarios\FindByEmail;
use Domain\infrastructure\repositories\Usuarios\UsuarioDatabaseRepository;

class AccesoController extends Controller {


    public function login() {

        if( isset( $_SESSION['user.email'] ) )  {
            $this->redirect( "/backend" ) ;
            return ; 
        }

        return $this->View( 'login' , [] , 'simple') ;

    }

    public function login_validar() {
        $data = $this->Post() ; 

        $service = new CheckLogin( new UsuarioDatabaseRepository() ) ; 
        $isValidUser = $service->execute( $data ["email"], $data ["password"] ) ; 

        if( $isValidUser ) {
            $service = new FindByEmail( new UsuarioDatabaseRepository() ) ; 
            $usuario = $service->execute( $data ["email"] ) ; 

            $_SESSION['user.email'] = $data ["email"] ; 
            $_SESSION['user.nombre'] = $usuario ["Nombre"] . " " . $usuario ["Apellido"]; 

            return $this->redirect( "/backend" ) ;
        }

        return $this->View( 'login' , [] , 'simple') ;

    }


    public function logout() { 
        // unset( $_SESSION['user.email'] ) ;
        session_destroy() ;
        return $this->redirect( "/backend/acceso/login" ) ;

    }


}