<?php
require_once __DIR__ . '/../../src/entity/file.class.php';
require_once __DIR__ . '/../../src/exceptions/fileException.class.php';
require_once __DIR__ . '/../../src/entity/imagen.class.php';
require_once __DIR__ . '/../../src/database/connection.class.php';
require_once __DIR__ . '/../../src/database/QueryBuilder.class.php';
require_once __DIR__ . '/../../src/repository/imagenesRepository.php';
require_once __DIR__ . '/../../src/repository/categoriaRepository.php';
require_once __DIR__.'/../../src/entity/Categoria.class.php';
require_once __DIR__.'/../../core/bootstrap.php';

$errores = [];
$titulo = "";
$descripcion = "";
$mensaje = "";

try {
    $conexion = App::getConnection();

    $imagenesRepository = new ImagenesRepository();
    $categoriaRepository = new categoriaRepository();
    $imagenes = $imagenesRepository->findAll();
    $categorias = $categoriaRepository->findAll();

    $imagenes = $imagenesRepository->findAll();
} catch (fileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $fileException->getMessage();
} catch (AppException $appException) {
    $errores[] = $appException->getMessage();
} 


require_once __DIR__ . '/views/galeria.view.php';
