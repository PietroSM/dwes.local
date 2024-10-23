<?php
require_once __DIR__ . '/../../../src/utils/Utils.php';
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
            <a  class="navbar-brand page-scroll" href="#page-top">
              <span>[PHOTO]</span>
            </a>
         </div>
         <div class="collapse navbar-collapse navbar-right" id="menu">
            <ul class="nav navbar-nav">

              <?php if (Utils::esOpcionMenuActiva('/index')==true || Utils::esOpcionMenuActiva('/')==true)
                echo '<li class="active lien">'; else echo '<li class=”0lien”>';?>
              <a href="index">Home</a></li>

              <?php if (Utils::esOpcionMenuActiva('/about')==true || Utils::esOpcionMenuActiva('/')==true)
                echo '<li class="active lien">'; else echo '<li class=”0lien”>';?>
              <a href="about">About</a></li>

              <?php if (Utils::esOpcionMenuActiva('/blog')==true || Utils::esOpcionMenuActiva('/')==true)
                echo '<li class="active lien">'; else echo '<li class=”0lien”>';?>
              <a href="blog">Photo</a></li>

              <?php if (Utils::esOpcionMenuActiva('/contact')==true || Utils::esOpcionMenuActiva('/')==true)
                echo '<li class="active lien">'; else echo '<li class=”0lien”>';?>
              <a href="contact">Contact</a></li>

              <?php if (Utils::esOpcionMenuActiva('/galeria')==true || Utils::esOpcionMenuActiva('/')==true)
                echo '<li class="active lien">'; else echo '<li class=”0lien”>';?>
              <a href="galeria">Galeria</a></li>

              <?php if (Utils::esOpcionMenuActiva('/Asociados')==true || Utils::esOpcionMenuActiva('/')==true)
                echo '<li class="active lien">'; else echo '<li class=”0lien”>';?>
              <a href="Asociados">Asociados</a></li>

            </ul>
         </div>
     </div>
   </nav>