<?php
require_once __DIR__ . '/../src/entity/file.class.php';
require_once __DIR__ . '/../src/exceptions/fileException.class.php';
require_once __DIR__ . '/../src/entity/Asociado.php';
//require_once __DIR__.'/../src/utils/captcha.php';
require_once __DIR__.'/../src/database/connection.class.php';


session_start();


if (isset($_POST['captcha']) && ($_POST['captcha'] != "")) {
    if ($_SESSION['captchaGenerado'] != $_POST['captcha']) {
        $mensaje = "¡Ha introducido un código de seguridad incorrecto! Inténtelo de nuevo.";
        $errores = [];
        $nombre = "";
        $descripcion = "";
    } else {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $Nombre = trim(htmlspecialchars($_POST['Nombre']));
                $descripcion = trim(htmlspecialchars($_POST['descripcion']));
                $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
                $Logo = new File('Logo', $tiposAceptados);
                $Logo->saveUploadFile(Asociado::RUTA_LOGOS_ASOCIADOS);
                // $mensaje = "Datos enviados";

                $conexion = Connection::make();
                $sql = "INSERT INTO asociados (nombre, logo, descripcion) 
                        VALUES (:nombre, :logo, :descripcion)";
                $pdoStatement = $conexion->prepare($sql);
                $parametros = [
                    ':nombre' => $Nombre,
                    ':logo' => $Logo->getFileName(),
                    ':descripcion' => $descripcion
                ];
                if ($pdoStatement->execute($parametros) === false)
                    $errores[] = "No se ha podido guardar la imagen en la base de datos";
                else {
                    $descripcion = "";
                    $mensaje = "Se ha guardado la imagen correctamente";
                }
            } catch (fileException $fileException) {
                $errores[] = $fileException->getMessage();
            }
        } else {
            $errores = [];
            $Nombre = "";
            $descripcion = "";
            $mensaje = "";
        }
    }
} else {
    $mensaje = "Introduzca el código de seguridad.";
    $errores = [];
    $nombre = "";
    $descripcion = "";
}

require_once __DIR__ . '/views/Asociados.view.php';
