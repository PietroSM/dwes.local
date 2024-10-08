<?php
require_once __DIR__.'/../src/entity/imagen.class.php';

//$imagenesHome[] = new imagen()
$imagenesHome[] = new imagen('1.jpg','First category picture',1, 1000, 500, 100);
$imagenesHome[] = new imagen('2.jpg','First category picture',1, 1000, 500, 100);
$imagenesHome[] = new imagen('3.jpg','First category picture',1, 1000, 500, 100);
$imagenesHome[] = new imagen('4.jpg','First category picture',1, 1000, 500, 100);
$imagenesHome[] = new imagen('5.jpg','First category picture',1, 1000, 500, 100);
$imagenesHome[] = new imagen('6.jpg','First category picture',1, 1000, 500, 100);
$imagenesHome[] = new imagen('7.jpg','First category picture',1, 1000, 500, 100);
$imagenesHome[] = new imagen('8.jpg','First category picture',1, 1000, 500, 100);
$imagenesHome[] = new imagen('9.jpg','First category picture',1, 1000, 500, 100);
$imagenesHome[] = new imagen('10.jpg','First category picture',1, 1000, 500, 100);
$imagenesHome[] = new imagen('11.jpg','First category picture',1, 1000, 500, 100);
$imagenesHome[] = new imagen('12.jpg','First category picture',1, 1000, 500, 100);



require_once __DIR__.'/../src/entity/Asociado.php';

$imagenesLogo[] = new Asociado('log1','log1.jpg','descripcion1');
$imagenesLogo[] = new Asociado('log2','log2.jpg','descripcion2');
$imagenesLogo[] = new Asociado('log3','log3.jpg','descripcion3');



require_once __DIR__ . '/views/index.view.php';