<?php

namespace dwes\app\controllers;

use dwes\app\entity\Imagen;
use dwes\app\exceptions\AppException;
use dwes\app\exceptions\CategoriaException;
use dwes\app\exceptions\FileException;
use dwes\app\exceptions\QueryException;
use dwes\app\repository\CategoriaRepository;
use dwes\app\repository\ImagenesRepository;
use dwes\app\utils\File;
use dwes\core\App;
use dwes\core\Response;

class GaleriaController
{



    public function index()
    {

        $errores = [];
        $titulo = "";
        $descripcion = "";
        $mensaje = "";

        try {
            $conexion = App::getConnection();
            $imagenesRepository = App::getRepository(ImagenesRepository::class);
            $categoriaRepository = App::getRepository(CategoriaRepository::class);

            $imagenes = App::getRepository($imagenesRepository::class)->findAll();
            $categorias = App::getRepository($categoriaRepository::class)->findAll();
        } catch (FileException $fileException) {
            $errores[] = $fileException->getMessage();
        } catch (QueryException $queryException) {
            $errores[] = $queryException->getMessage();
        } catch (AppException $appException) {
            $errores[] = $appException->getMessage();
        }

        Response::renderView(
            'galeria',
            'layout',
            compact(
                'errores',
                'titulo',
                'descripcion',
                'mensaje',
                'imagenes',
                'categorias',
                'imagenesRepository',
                'categoriaRepository'
            )
        );
    }

    public function nueva()
    {

        try {
            $titulo = trim(htmlspecialchars($_POST['titulo']));
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $categoria = trim(htmlspecialchars($_POST['categoria']));

            if (empty($categoria))
                throw new CategoriaException();

            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php
            $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);
            $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion, $categoria);


            $imagenesRepository =
                App::getRepository(ImagenesRepository::class)->guarda($imagenGaleria);

            App::get('logger')->add("Se ha guardado una imagen: "
                . $imagenGaleria->getNombre());
        } catch (FileException $fileException) {
            $errores[] = $fileException->getMessage();
        } catch (QueryException $queryException) {
            $errores[] = $queryException->getMessage();
        } catch (AppException $appException) {
            $errores[] = $appException->getMessage();
        } catch (CategoriaException) {
            $errores[] = "No se ha seleccionado una categoría válida";
        }
        App::get('router')->redirect('galeria');

        // Response::renderView(
        //     'galeria',
        //     'layout',
        //     compact(
        //         'imagenesRepository',
        //         'imagen'
        //     )
        // );
    }
}
