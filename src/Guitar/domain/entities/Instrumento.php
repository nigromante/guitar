<?php
namespace Domain\domain\entities;

  //  Clases es una definicion de datos y su comportamiento
  enum InstrumentoFamilia
  {
      case GUITARRA;
      case PERCUSION;
      case VIENTOS;
      case OTROS;
  }

  
  class Instrumento {

  // Atributos
    private $alias ; 
    private $nombre ; 
    private InstrumentoFamilia $tipo ; 
    private $descripcion ; 


  // Metodos

    // constructor
      public function __construct( $alias, $nombre, InstrumentoFamilia $tipo, $descripcion="???")
      {
        // validaciones
        if( strlen( $alias ) != 3 )
          throw new Exception('Alias debe ser de 3 letras');

        if ( strlen( $nombre ) <3 || strlen( $nombre ) >30) 
          throw new exception('Nombre debe contener entre 3 y 10 letras');


        // asignaciones   
        $this->alias = strtoupper($alias) ;
        $this->nombre = $nombre ;
        $this->tipo = $tipo ;
        $this->descripcion = $descripcion ;
      }



    // Getter / Setter
      public function Alias( ) { return  $this->alias ; }

      public function Nombre( ) {    // Getter -- Obtenr informacion del objeto
        return  ucwords( $this->nombre ) ; 
      }
      
      public function Tipo( ) { return  $this->tipo->name ; }
      public function SetTipo( InstrumentoFamilia $tipo ) {   $this->tipo = $tipo ; return $this; }   //  Setter --- Asigna info al objeto

      public function Descripcion( ) { return  ucfirst($this->descripcion) ; }
      public function DescripcionOriginal( ) { return  $this->descripcion ; }
      public function SetDescripcion( $descripcion ) {  $this->descripcion = $descripcion ; return $this; }


    // Otros metodos
  
      public function Resumen() { return $this->Alias() . ":" . $this->Nombre() . " / " . $this->Tipo() . " ::: "  . $this->Descripcion() ; }

  }



?>