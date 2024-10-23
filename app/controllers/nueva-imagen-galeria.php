<?php
require_once __DIR__ . '/../../src/entity/File.php';
require_once __DIR__ . '/../../src/exceptions/FileException.php';
require_once __DIR__ . '/../../src/entity/Imagen.php';
require_once __DIR__ . '/../../src/database/Connection.php';
require_once __DIR__ . '/../../src/database/QueryBuilder.php';
require_once __DIR__ . '/../../src/repository/ImagenesRepository.php';
require_once __DIR__ . '/../../src/repository/categoriaRepository.php';
require_once __DIR__.'/../../src/entity/Categoria.php';
require_once __DIR__.'/../../core/bootstrap.php';

$errores = [];
$titulo = "";
$descripcion = "";
$mensaje = "";

try {
    $titulo = trim(htmlspecialchars($_POST['titulo']));
    $descripcion = trim(htmlspecialchars($_POST['descripcion']));
    $categoria = trim(htmlspecialchars($_POST['categoria']));
    if ( empty($categoria))
    throw new CategoriaException;
   
    $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
    $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php
    $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS );
    $imagenGaleria = new Imagen($imagen->getFileName(),$descripcion, $categoria);
    $imagenesRepository = new ImagenesRepository();
    $imagenesRepository->guarda($imagenGaleria);

    App::get('logger')->add("Se ha guardado una imagen: "
        .$imagenGaleria->getNombre());
   } catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
   }
   catch ( QueryException $queryException ){
    $errores[] = $queryException->getMessage();
   }
   catch ( AppException $appException ){
    $errores[] = $appException->getMessage();
   }
   catch ( CategoriaException ) {
    $errores[] = "No se ha seleccionado una categoría válida";
   }
   App::get('router')->redirect('galeria');


require_once __DIR__ . '/views/galeria.view.php';
