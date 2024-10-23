<?php
require_once __DIR__ . '/../../src/entity/File.php';
require_once __DIR__ . '/../../src/exceptions/FileException.php';
require_once __DIR__ . '/../../src/entity/Imagen.php';
require_once __DIR__ . '/../../src/database/Connection.php';
require_once __DIR__ . '/../../src/database/QueryBuilder.php';
require_once __DIR__ . '/../../src/repository/ImagenesRepository.php';
require_once __DIR__ . '/../../src/repository/CategoriaRepository.php';
require_once __DIR__.'/../../src/entity/Categoria.php';
require_once __DIR__.'/../../core/bootstrap.php';

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
