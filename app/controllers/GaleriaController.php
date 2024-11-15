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
use dwes\core\helpers\FlashMessage;
use dwes\core\Response;

class GaleriaController
{
    public function index()
    {
        $titulo = "";

        $errores = FlashMessage::get('errores', []);
        $mensaje = FlashMessage::get('mensaje');
        $descripcion = FlashMessage::get('descripcion');
        $categoriaSeleccionada = FlashMessage::get('categoriaSeleccionada');

        FlashMessage::unset('descripcion');
        FlashMessage::unset('categoriaSeleccionada');


        try {
            $conexion = App::getConnection();
            $imagenesRepository = App::getRepository(ImagenesRepository::class);
            $categoriaRepository = App::getRepository(CategoriaRepository::class);

            $imagenes = App::getRepository($imagenesRepository::class)->findAll();
            $categorias = App::getRepository($categoriaRepository::class)->findAll();
        } catch (FileException $fileException) {
            FlashMessage::set('errores', [$fileException->getMessage()]);
        } catch (QueryException $queryException) {
            FlashMessage::set('errores', [$queryException->getMessage()]);
        } catch (AppException $appException) {
            FlashMessage::set('errores', [$appException->getMessage()]);
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
                'categoriaRepository',
                'categoriaSeleccionada'
            )
        );
    }

    public function nueva()
    {

        try {
            $titulo = trim(htmlspecialchars($_POST['titulo']));
            FlashMessage::set('titulo', $titulo);
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            FlashMessage::set('descripcion', $descripcion);
            $categoria = trim(htmlspecialchars($_POST['categoria']));

            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php
            if (empty($categoria))
                throw new CategoriaException();
            FlashMessage::set('categoriaSeleccionada', $categoria); // utilizamos categoriaSeleccionaa
            // porque ya hay una variable llamada categoría en la vista.


            $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);
            $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion, $categoria);


            $imagenesRepository =
                App::getRepository(ImagenesRepository::class)->guarda($imagenGaleria);

            $mensaje = "Se ha guardado una imagen: " . $imagenGaleria->getNombre();
            App::get('logger')->add($mensaje);

           FlashMessage::set('mensaje', $mensaje);

           FlashMessage::unset('descripcion');
           FlashMessage::unset('categoriaSeleccionada');
           FlashMessage::unset('titulo');

        } catch (FileException $fileException) {
            FlashMessage::set('errores', [$fileException->getMessage()]);
        } catch (QueryException $queryException) {
            FlashMessage::set('errores', [$queryException->getMessage()]);
        } catch (AppException $appException) {
            FlashMessage::set('errores', [$appException->getMessage()]);
        } catch (CategoriaException) {
            FlashMessage::set('errores', "No se ha seleccionado una categoría válida");
        }
        App::get('router')->redirect('galeria');
    }


    public function show($id)
    {
        $imagenesRepository = App::getRepository(ImagenesRepository::class);
        $imagen = $imagenesRepository->find($id);
        Response::renderView(
            'imagen-show',
            'layout',
            compact('imagen', 'imagenesRepository')
        );
    }
}
