<?php

$router->get('', 'PagesController@index');
$router->get('about', 'PagesController@about');
$router->get('Asociados', 'AsociadosController@index', 'ROLE_ADMIN');
$router->get('blog', 'PagesController@blog');
$router->get('contact', 'PagesController@contact');
$router->get('galeria', 'GaleriaController@index', 'ROLE_USER');
$router->get('single_post', 'PagesController@post');
$router->post('imagenes-galeria/nueva', 'GaleriaController@nueva', 'ROLE_USER');
$router->post('asociados/nueva', 'AsociadosController@nueva');
$router->post('contact/enviar', 'app/controllers/contact-enviar.php');
$router->get ('galeria/:id', 'GaleriaController@show', 'ROLE_USER');

$router->get ('login', 'AuthController@login');
$router->post('check-login', 'AuthController@checkLogin');
$router->get ('logout', 'AuthController@logout');


$router->get ('registro', 'AuthController@registro');
$router->post('check-registro', 'AuthController@checkRegistro');