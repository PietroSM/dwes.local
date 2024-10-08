<?php
class Asociado{

    private $id;
    private $nombre;
    private $logo;
    private $descripcion;

    const RUTA_LOGOS_ASOCIADOS = '/public/images/asociados/';

    public function __construct($nombre, $logo, $descripcion)
    {
        $this->id = 0;
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;

    }


    //Getters and Setters
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getLogo(){
        return $this->logo;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }
    public function setLogo($logo){
        $this->logo = $logo;
        return $this;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
        return $this;
    }


    public function getUrlAsociado(){
        return self::RUTA_LOGOS_ASOCIADOS.$this->getLogo();
    }

    public function __toString()
    {
        return $this->getDescripcion();
    }
}