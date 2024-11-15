<?php

namespace dwes\app\controllers;

use dwes\app\entity\Asociado;
use dwes\app\exceptions\AppException;
use dwes\app\exceptions\FileException;
use dwes\app\exceptions\QueryException;
use dwes\app\repository\AsociadosRepository;
use dwes\app\utils\File;
use dwes\core\App;
use dwes\core\helpers\FlashMessage;
use dwes\core\Response;

class AsociadosController{

    public function index(){

        $mensaje = FlashMessage::get('mensaje');
        $errores = FlashMessage::get('errores', []);
        $Nombre = FlashMessage::get('Nombre');
        $descripcion = FlashMessage::get('descripcion');
    
        try {
            $conexion = App::getConnection();
            $asociadosRepositoy = App::getRepository(AsociadosRepository::class);
            $asociados = App::getRepository($asociadosRepositoy::class)->findAll();
        
        } catch (FileException $fileException) {
            FlashMessage::set('errores', [$fileException->getMessage()]);
        } catch (QueryException $queryException) {
            FlashMessage::set('errores', [$queryException->getMessage()]);
        } catch (AppException $appException) {
            FlashMessage::set('errores', [$appException->getMessage()]);
        }


        Response::renderView(
            'Asociados',
            'layout',
            compact('asociadosRepositoy','asociados','Nombre','descripcion', 'mensaje')
        );
    }


    public function nueva(){

        try{



            if (isset($_POST['captcha']) && ($_POST['captcha'] != "")) {
                if ($_SESSION['captchaGenerado'] != $_POST['captcha']) {
                    $mensaje = "¡Ha introducido un código de seguridad incorrecto! Inténtelo de nuevo.";
                    $Nombre = "";
                    $descripcion = "";
                    FlashMessage::set('mensaje', $mensaje);
                } else {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    
                    $Nombre = trim(htmlspecialchars($_POST['Nombre']));
                    FlashMessage::set('Nombre', $Nombre);
                    $descripcion = trim(htmlspecialchars($_POST['descripcion']));
                    FlashMessage::set('descripcion', $descripcion);

                    $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
                    $Logo = new File('Logo', $tiposAceptados);
                    $Logo->saveUploadFile(Asociado::RUTA_LOGOS_ASOCIADOS);
        
                    $mensaje = "Se ha guardado la imagen correctamente";
                    App::get('logger')->add($mensaje);
                    $asociadosGaleria = new Asociado($Nombre, $Logo->getFileName(), $descripcion);

                    $asociadosRepositoy = App::getRepository(AsociadosRepository::class)->guarda($asociadosGaleria);
        
                    }
                }
            }else{
                FlashMessage::set('mensaje', 'Debes introducir un captcha');
            }

        } catch (FileException $fileException) {
            FlashMessage::set('errores', [$fileException->getMessage()]);
        } catch (QueryException $queryException) {
            FlashMessage::set('errores', [$queryException->getMessage()]);
        } catch (AppException $appException) {
            FlashMessage::set('errores', [$appException->getMessage()]);
        }

        App::get('router')->redirect('Asociados');


    }

}