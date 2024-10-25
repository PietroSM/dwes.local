<?php
use dwes\app\exceptions\AppException;
use dwes\app\exceptions\FileException;
use dwes\app\exceptions\QueryException;
use dwes\app\repository\ImagenesRepository;
use dwes\app\repository\CategoriaRepository;
use dwes\core\App;


$errores = [];
$titulo = "";
$descripcion = "";
$mensaje = "";

try {
    $conexion = App::getConnection();

    $imagenesRepository = new ImagenesRepository();
    $categoriaRepository = new CategoriaRepository();
    $imagenes = $imagenesRepository->findAll();
    $categorias = $categoriaRepository->findAll();

    $imagenes = $imagenesRepository->findAll();
} catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $fileException->getMessage();
} catch (AppException $appException) {
    $errores[] = $appException->getMessage();
} 


require_once __DIR__ . '/views/galeria.view.php';
