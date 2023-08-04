<?php
namespace Controllers\backend;

use  Controllers\backend\Controller;
use Domain\application\services\Usuarios\CheckLogin;
use Domain\application\services\Usuarios\FindByEmail;
use Domain\infrastructure\repositories\Usuarios\UsuarioDatabaseRepository;

class AccesoController extends Controller {


    public function login() {

        if( isset( $_SESSION['user.email'] ) )  {
            $this->redirect( "/backend/dashboard" ) ;
            return ; 
        }

        return $this->View( 'login' , [] , 'acceso') ;

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

            return $this->redirect( "/backend/dashboard" ) ;
        }

        return $this->View( 'login' , [] , 'acceso') ;

    }


    public function logout() { 
        session_destroy() ;
        return $this->redirect( "/backend/acceso/login" ) ;

    }

    public function forgot_password(){
        return $this->View( 'forgot_password' , [] , 'acceso') ;
    }

    public function forgot_password_procesar() {
        $data = $this->Post() ; 
        return $this->View( 'forgot_password_procesar' , compact( "data" ) , 'acceso') ;
    }

    public function no_access(){
        return $this->View( 'no_access' , [] , 'acceso') ;
    }


}