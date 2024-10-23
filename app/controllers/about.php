<?php
require_once __DIR__.'/../../src/entity/Imagen.php';

$imagenesCliente[] = new imagen('client1.jpg' ,'MISS BELLA');
$imagenesCliente[] = new imagen('client2.jpg', 'DON PENO');
$imagenesCliente[] = new imagen('client3.jpg', 'SWEETY');
$imagenesCliente[] = new imagen('client4.jpg', 'LADY');

require_once __DIR__.'/views/about.view.php';