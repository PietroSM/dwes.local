<?php

use dwes\app\utils\Utils;
?>


<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand page-scroll" href="#page-top">
        <span>[PHOTO]</span>
      </a>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="menu">
      <ul class="nav navbar-nav">

        <?php if (Utils::esOpcionMenuActiva('/') == true || Utils::esOpcionMenuActiva('/') == true)
          echo '<li class="active lien">';
        else echo '<li class=”0lien”>'; ?>
        <a href="/">Home</a></li>

        <?php if (Utils::esOpcionMenuActiva('/about') == true || Utils::esOpcionMenuActiva('/') == true)
          echo '<li class="active lien">';
        else echo '<li class=”0lien”>'; ?>
        <a href="about">About</a></li>

        <?php if (Utils::esOpcionMenuActiva('/blog') == true || Utils::esOpcionMenuActiva('/') == true)
          echo '<li class="active lien">';
        else echo '<li class=”0lien”>'; ?>
        <a href="blog">Photo</a></li>

        <?php if (Utils::esOpcionMenuActiva('/contact') == true || Utils::esOpcionMenuActiva('/') == true)
          echo '<li class="active lien">';
        else echo '<li class=”0lien”>'; ?>
        <a href="contact">Contact</a></li>

        <?php if (is_null($app['user'])) : ?>
          <?php if (Utils::esOpcionMenuActiva('/login') == true) echo '<li class="active lien">';
          else echo '<li class=" lien">'; ?>
          <a href="/login"><i class="fa fa-user-secret sr-icons"></i> Login</a></li>

          <li class="<?= Utils::esOpcionMenuActiva('/registro') ? 'active' : '' ?> lien">
            <a href="<?= Utils::esOpcionMenuActiva('/registro') ? '#' : '/registro' ?>">
              <i class="fa fa-sign-in sr-icons"></i> Registro</a>
          </li>
        <?php else : ?>


          <?php if (Utils::esOpcionMenuActiva('/galeria') == true || Utils::esOpcionMenuActiva('/') == true)
            echo '<li class="active lien">';
          else echo '<li class=”0lien”>'; ?>
          <a href="galeria">Galeria</a></li>

          <?php if (Utils::esOpcionMenuActiva('/Asociados') == true || Utils::esOpcionMenuActiva('/') == true)
            echo '<li class="active lien">';
          else echo '<li class=”0lien”>'; ?>
          <a href="Asociados">Asociados</a></li>

          <?php if (Utils::esOpcionMenuActiva('/logout') == true) echo '<li class="active lien">';
          else echo '<li class=" lien">'; ?>
          <a href="/logout"><i class="fa fa-sign-out sr-icons"></i> <?= $app['user']->getUsername() ?></a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>