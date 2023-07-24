<?php
namespace Controllers\frontend;

use  Controllers\frontend\Controller;


class ContactoController extends Controller {

    public function form() {

        return $this->View( 'form' ) ;
    }

    
    public function formPost() {
        $post_data = $this->Post() ;
         
        if( $this->ValidarContactForm( $post_data )  ) {

            $this->SaveContactForm( $post_data ) ; 
        }

        return $this->View( 'form' ) ;
    }
    

    private function ValidarContactForm( $post_data ) {

        if( count( $post_data ) > 0  ) {
            extract( $post_data ) ;  //  Extrae datos de POST como variables 
    
            if( $email != ""  && $mensaje != "" )  {
    
                return true ; 
            }
       }
    
       return false ;
    }


    private function SaveContactForm( $post_data ) {
        extract( $post_data ) ;  //  Extrae datos de POST como variables 
 
        dump( $email , "Email"  ) ;

        dump( $mensaje, "Mensaje") ;
    }


}
