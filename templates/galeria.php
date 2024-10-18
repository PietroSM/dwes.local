<?php
require_once __DIR__ . '/../src/entity/file.class.php';
require_once __DIR__ . '/../src/exceptions/fileException.class.php';
require_once __DIR__ . '/../src/entity/imagen.class.php';
require_once __DIR__ . '/../src/database/connection.class.php';
require_once __DIR__ . '/../src/database/QueryBuilder.class.php';
require_once __DIR__ . '/../src/repository/imagenesRepository.php';
require_once __DIR__ . '/../src/repository/categoriaRepository.php';
require_once __DIR__.'/../src/entity/Categoria.class.php';

$errores = [];
$titulo = "";
$descripcion = "";
$mensaje = "";

try {
    $config = require __DIR__ . '/../app/config.php';
    App::bind('config', $config); // Guardamos la configuración en el contenedor de servicios
    $conexion = App::getConnection();

    //$queryBuilder = new QueryBuilder('imagenes', 'Imagen');
    $imagenesRepository = new ImagenesRepository();


    // $imagenes = $queryBuilder->findAll();
    $imagenes = $imagenesRepository->findAll();

    $categoriaRepository = new categoriaRepository();
    $categorias = $categoriaRepository->findAll();

    // $conexion = Connection::make();
    // $conexion = Connection::make($config['database']);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $categoria = trim(htmlspecialchars($_POST['categoria']));
        $titulo = trim(htmlspecialchars($_POST['titulo']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php
        $imagen->saveUploadFile(imagen::RUTA_IMAGENES_SUBIDAS);
        // $mensaje = "Datos enviados";

        $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion,$categoria);
        // $queryBuilder->save($imagenGaleria);
        $imagenesRepository->guarda($imagenGaleria);


        $mensaje = "Se ha guardado la imagen correctamente";
        // $imagenes = $queryBuilder->findAll();
        $imagenes = $imagenesRepository->findAll();
    }

    // $queryBuilder = new QueryBuilder();
    // $queryBuilder = new QueryBuilder('imagenes', 'Imagen');
    $imagenesRepository = new ImagenesRepository();
    // $queryBuilder = new QueryBuilder($conexion);
    // $imagenes = $queryBuilder->findAll('imagenes', 'Imagen');
    // $imagenes = $queryBuilder->findAll();
    $imagenes = $imagenesRepository->findAll();
} catch (fileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $fileException->getMessage();
} catch (AppException $appException) {
    $errores[] = $appException->getMessage();
} 


require_once __DIR__ . '/views/galeria.view.php';
