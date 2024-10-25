<?php
use dwes\app\exceptions\AppException;
use dwes\app\exceptions\FileException;
use dwes\app\exceptions\QueryException;
use dwes\app\entity\Asociado;
use dwes\app\utils\File;
use dwes\core\database\Connection;
use dwes\app\repository\AsociadosRepository;
use dwes\core\App;


session_start();
$mensaje = "Introduzca el código de seguridad.";
$errores = [];
$Nombre = "";
$descripcion = "";



try {
    // $config = require __DIR__ . '/../app/config.php';
    // App::bind('config', $config); // Guardamos la configuración en el contenedor de servicios
    $conexion = App::getConnection();


    $asociadosRepositoy = new AsociadosRepository();
    $asociados = $asociadosRepositoy->findAll();


    if (isset($_POST['captcha']) && ($_POST['captcha'] != "")) {
        if ($_SESSION['captchaGenerado'] != $_POST['captcha']) {
            $mensaje = "¡Ha introducido un código de seguridad incorrecto! Inténtelo de nuevo.";
            $errores = [];
            $nombre = "";
            $descripcion = "";
        } else {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Nombre = trim(htmlspecialchars($_POST['Nombre']));
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $Logo = new File('Logo', $tiposAceptados);
            $Logo->saveUploadFile(Asociado::RUTA_LOGOS_ASOCIADOS);


            $asociadosGaleria = new Asociado($nombre, $Logo->getFileName(), $descripcion);
            $asociadosRepositoy->save($asociadosGaleria);

            $mensaje = "Se ha guardado la imagen correctamente";


            $asociados = $asociadosRepositoy->findAll();
            $asociadosRepositoy = new AsociadosRepository();
            }
        }
    }
} catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $fileException->getMessage();
} catch (AppException $appException) {
    $errores[] = $appException->getMessage();
}




require_once __DIR__ . '/views/Asociados.view.php';
