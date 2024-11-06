<?php

namespace dwes\app\controllers;

use dwes\app\repository\AsociadosRepository;
use dwes\app\repository\ImagenesRepository;
use dwes\app\entity\Imagen;
use dwes\app\entity\Asociado;
use dwes\core\App;
use dwes\core\Response;

class PagesController
{
    /**
     * @throws QueryException
     */
    public function index()
    {   
        $imagenesLogo[] = new Asociado('log1','log1.jpg','descripcion1');
        $imagenesLogo[] = new Asociado('log2','log2.jpg','descripcion2');
        $imagenesLogo[] = new Asociado('log3','log3.jpg','descripcion3');

        $imagenesHome = App::getRepository(ImagenesRepository::class)->findAll();
        $imagenesLogo = App::getRepository(AsociadosRepository::class)->findAll();
        
        Response::renderView(
            'index',
            'layout',
            compact ( 'imagenesHome','imagenesLogo')
            );
           
    }

    public function about()
    {

        $imagenesCliente[] = new imagen('client1.jpg' ,'MISS BELLA');
        $imagenesCliente[] = new imagen('client2.jpg', 'DON PENO');
        $imagenesCliente[] = new imagen('client3.jpg', 'SWEETY');
        $imagenesCliente[] = new imagen('client4.jpg', 'LADY');

        Response::renderView(
            'about',
            'layout',
            compact('imagenesCliente')
            );
    }

    public function blog()
    {
        Response::renderView(
            'blog',
            'layout',
            );
    }

    public function contact()
    {
        Response::renderView(
            'contact',
            'layout-with-footer',
            );
    }


    public function post()
    {
        require __DIR__ . '/views/single_post.view.php';
        Response::renderView(
            'post',
            'layout'
        );
    }
}
