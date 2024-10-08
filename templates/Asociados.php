<?php
require_once __DIR__.'/../src/entity/file.class.php';
require_once __DIR__.'/../src/exceptions/fileException.class.php';
require_once __DIR__.'/../src/entity/Asociado.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $Nombre = trim(htmlspecialchars($_POST['Nombre']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $Logo = new File('Logo', $tiposAceptados);
        $Logo->saveUploadFile(Asociado::RUTA_LOGOS_ASOCIADOS);
        $mensaje = "Datos enviados";
        
    } catch (fileException $fileException) {
        $errores[] = $fileException->getMessage();
    }
} else {
    $errores = [];
    $Nombre = "";
    $descripcion = "";
    $mensaje = "";
}


require_once __DIR__.'/views/Asociados.view.php';