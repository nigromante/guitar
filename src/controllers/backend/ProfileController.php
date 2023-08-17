<?php

namespace Controllers\backend ;

use Controllers\backend\SecureController;
use Domain\application\services\Profile\CambiarTema;
use Domain\application\services\Profile\UpdateProfile;
use Domain\application\services\Usuarios\FindByEmail;
use Domain\infrastructure\repositories\Usuarios\Database\CambiarTemaRepository;
use Domain\infrastructure\repositories\Usuarios\Database\FindByEmailRepository;
use Utilities\AppSession;

class ProfileController extends SecureController
{

    public function cambiartema()
    {
        $tema = AppSession::UserThemeGet() ; 
        $avatar = AppSession::UserAvatarGet() ;
        return $this->View('cambiartema', compact( 'tema' , 'avatar') );
    }

    public function cambiartema_grabar()
    {
        $data = $this->Post();

        $tema = $data["Tema"] ;
        $avatar = $data["Avatar"] ;
        
        AppSession::UserThemeSet( $tema ) ;
        AppSession::UserAvatarSet( $avatar ) ;

        $service = new UpdateProfile( );
        $service->ChangeUserThemeAndAvatar( AppSession::UserEmailGet(), $tema , $avatar);
    
        return $this->View('cambiartema', compact( 'tema' , 'avatar' ) );
        
    }

    /*
    public function editarperfil($id)
    {
        $service = new FindById(new EditarPerfilRepository());
        $usuario = $service->execute($id);
        return $this->View('editarperfil', compact('id', 'usuario'));
    }

    public function editarperfil_grabar($id)
    {
        $data = $this->Post();
        $service = new Update(new EditarPerfilRepository());
        $service->execute($id, $data);
        return $this->View("editarperfil_grabar", []);
    }
    */




}




