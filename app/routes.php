<?php

$router->get('index', 'app/controllers/index.php');
$router->get('about', 'app/controllers/about.php');
$router->get('Asociados', 'app/controllers/asociados.php');
$router->get('blog', 'app/controllers/blog.php');
$router->get('contact', 'app/controllers/contact.php');
$router->get('galeria', 'app/controllers/galeria.php');
$router->get('post', 'app/controllers/single_post.php');
$router->post('imagenes-galeria/nueva', 'app/controllers/nueva-imagen-galeria.php');
$router->post('contact/enviar', 'app/controllers/contact-enviar.php');
