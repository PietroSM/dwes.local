<?php
require_once 'IEntity.php';

class Categoria implements IEntity{

    private $id;
    private $nombre;
    private $numImagenes;

    public function __construct($nombre="", $numImagenes=0)
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->numImagenes = $numImagenes;
    }

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getNumImagenes(){
        return $this->numImagenes;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }
    public function setNumImagenes($numImagenes){
        $this->numImagenes = $numImagenes;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'NumImagenes' => $this->getNumImagenes()
        ];
    }

}