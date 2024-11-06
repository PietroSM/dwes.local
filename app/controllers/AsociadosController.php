<?php

namespace dwes\app\controllers;

use dwes\app\entity\Asociado;
use dwes\app\exceptions\AppException;
use dwes\app\exceptions\FileException;
use dwes\app\exceptions\QueryException;
use dwes\app\repository\AsociadosRepository;
use dwes\app\utils\File;
use dwes\core\App;
use dwes\core\Response;

class AsociadosController{

    public function index(){
        session_start();
        $mensaje = "Introduzca el código de seguridad.";
        $errores = [];
        $Nombre = "";
        $descripcion = "";
    
        try {
        
            $conexion = App::getConnection();
            $asociadosRepositoy = App::getRepository(AsociadosRepository::class);
            $asociados = App::getRepository($asociadosRepositoy::class)->findAll();
        
        
            if (isset($_POST['captcha']) && ($_POST['captcha'] != "")) {
                if ($_SESSION['captchaGenerado'] != $_POST['captcha']) {
                    $mensaje = "¡Ha introducido un código de seguridad incorrecto! Inténtelo de nuevo.";
                    $errores = [];
                    $Nombre = "";
                    $descripcion = "";
                } else {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $Nombre = trim(htmlspecialchars($_POST['Nombre']));
                    $descripcion = trim(htmlspecialchars($_POST['descripcion']));
                    $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
                    $Logo = new File('Logo', $tiposAceptados);
                    $Logo->saveUploadFile(Asociado::RUTA_LOGOS_ASOCIADOS);
        
        
                    $asociadosGaleria = new Asociado($Nombre, $Logo->getFileName(), $descripcion);
                    $asociadosRepositoy = App::getRepository(AsociadosRepository::class)->save($asociadosGaleria);
        
                    $mensaje = "Se ha guardado la imagen correctamente";
        
                    $asociadosRepositoy = App::getRepository(AsociadosRepository::class);
                    $asociados = App::getRepository($asociadosRepositoy::class)->findAll();
                    
                    }
                }
            }
        } catch (FileException $fileException) {
            $errores[] = $fileException->getMessage();
        } catch (QueryException $queryException) {
            $errores[] = $queryException->getMessage();
        } catch (AppException $appException) {
            $errores[] = $appException->getMessage();
        }


        Response::renderView(
            'Asociados',
            'layout',
            compact('asociadosRepositoy','asociados','Nombre','descripcion')
        );
    }



}