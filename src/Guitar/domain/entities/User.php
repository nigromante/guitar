<?php

namespace Domain\domain\entities;

class User
{
    private $id ; 
    private $nombre;
    private $apellido;
    private $email;
    private $estado;
    private $fecha_creacion;
    private $password;

    public function __construct($id, $nombre, $apellido, $email, $estado, $fecha_creacion = '', $password = '' )
    {
      $this->id = $id;
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->email = $email;
      $this->estado = $estado;
      $this->fecha_creacion = $fecha_creacion;
      $this->password = $password;
    }

    public function getId() { return ( $this->id ) ; } 
    public function getNombre() { return ( $this->nombre ) ; }
    public function getApellido() { return ( $this->apellido ) ; }
    public function getEmail() { return ( $this->email ) ; }
    public function getEstado() { return ( $this->estado ) ; }
    public function getPassword() { return ( $this->password ) ; }
    public function getFechaCreacion() { return ( $this->fecha_creacion ) ; }

    public function getFullName() { return Trim(  sprintf( "%s %s" , $this->nombre , $this->apellido )) ; }

}