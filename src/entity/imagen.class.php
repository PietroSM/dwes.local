<?php
class imagen{
    const RUTA_IMAGENES_PORTFOLIO = '/public/images/index/portfolio/';
    const RUTA_IMAGENES_GALERIA = '/public/images/index/gallery/';
    const RUTA_IMAGENES_CLIENTES = '/public/images/clients/';


    private $id;
    private $nombre;
    private $descripcion;
    private $categoria;
    private $numVisualizaciones;
    private $numLikes;
    private $numDownloads;


    public function __construct($nombre="", $descripcion="", $categoria="", 
        $numVisualizaciones=0, $numLikes=0, $numDownloads=0){
        $this->id = 0;
        $this->nombre = $nombre;
        $this->descripcion  = $descripcion;
        $this->categoria = $categoria;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this-> numDownloads = $numDownloads;
    }


    //Getters And Setters
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getCategoria(){
        return $this->categoria;
    }
    public function getNumVisualizaciones(){
        return $this->numVisualizaciones;
    }
    public function getNumLikes(){
        return $this->numLikes;
    }
    public function getNumDownloads(){
        return $this->numDownloads;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
        return $this;
    }
    public function setCategoria($categoria){
        $this->categoria = $categoria;
        return $this;
    }
    public function setNumVisualizaciones($numVisualizaciones){
        $this->numVisualizaciones = $numVisualizaciones;
        return $this;
    }
    public function setNumLikes($numLikes){
        $this->numLikes = $numLikes;
        return $this;
    }
    public function setNumDownloads($numDownloads){
        $this->numDownloads = $numDownloads;
        return $this;
    }



    public function getUrlPortfolio(){
        return self::RUTA_IMAGENES_PORTFOLIO.$this->getNombre();
    }
    public function getUrlGaleria(){
        return self::RUTA_IMAGENES_GALERIA.$this->getNombre();
    }
    public function getUrlClientes(){
        return self::RUTA_IMAGENES_CLIENTES.$this->getNombre();
    }


    public function __toString()
    {
        return $this->getDescripcion();
    }
}