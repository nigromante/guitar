<?php
namespace Controllers\backend;

use  Controllers\backend\Controller;

use Domain\application\services\Usuarios\Borrar;
use Domain\application\services\Usuarios\FindById;
use Domain\application\services\Usuarios\Update;
use Domain\application\services\Usuarios\getAllUsuarios;
use Domain\application\services\Usuarios\Save;

use Domain\infrastructure\repositories\Usuarios\UsuarioDatabaseRepository;


class UsuariosController extends Controller {


    public function listado() {

        $service = new getAllUsuarios( new UsuarioDatabaseRepository() ) ; 
        $usuarios_listado = $service->execute( ) ; 

        var_dump($usuarios_listado ); 

        return $this->View( 'listado' , compact('usuarios_listado') ) ;

    }


    public function crear() {

        return $this->View( 'crear' , [] ) ;
    
    
    }
    
    public function crear_grabar(){
        $data = $this->Post() ; 
        var_dump( $data ) ;
        $service = new Save( new UsuarioDatabaseRepository() ) ; 
        $usuario = $service->execute( $data ) ; 
        return $this->View( "crear_grabar" , []) ;
    }

    public function detalle( $id ) {
        $service = new FindById( new UsuarioDatabaseRepository() ) ; 
        $usuario = $service->execute( $id ) ; 
        return $this->View( 'detalle' , compact('usuario') ) ;
    }

    public function borrar( $id ) {
        $service = new Borrar( new UsuarioDatabaseRepository() ) ; 
        $usuario = $service->execute( $id ) ; 
        return "Registro Eliminado" ;
    }

    
    public function modificar( $id) {
        $service = new FindById( new UsuarioDatabaseRepository() ) ; 
        $usuario = $service->execute( $id ) ; 
        return $this->View( 'modificar' , compact( 'id' , 'usuario') ) ;
    }

    public function modificar_grabar( $id ) {
        $data = $this->Post() ; 
        var_dump( $data ) ;
        $service = new Update( new UsuarioDatabaseRepository() ) ; 
        $usuario = $service->execute( $id, $data ) ; 
        return $this->View( "modificar_grabar" , []) ; 
    }

}