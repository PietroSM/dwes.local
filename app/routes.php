<?php

$router->get('', 'PagesController@index');
$router->get('about', 'PagesController@about');
$router->get('Asociados', 'AsociadosController@index');
$router->get('blog', 'PagesController@blog');
$router->get('contact', 'PagesController@contact');
$router->get('galeria', 'GaleriaController@index');
$router->get('single_post', 'PagesController@post');
$router->post('imagenes-galeria/nueva', 'GaleriaController@nueva');
$router->post('contact/enviar', 'app/controllers/contact-enviar.php');
$router->get ('galeria/:id', 'GaleriaController@show');