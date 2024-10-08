<?php
require_once __DIR__ . '/../../src/utils/utils.class.php';
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

              <?php if (Utils::esOpcionMenuActiva('/index.php')==true || Utils::esOpcionMenuActiva('/')==true)
                echo '<li class="active lien">'; else echo '<li class=”0lien”>';?>
              <a href="index.php">Home</a></li>

              <?php if (Utils::esOpcionMenuActiva('/about.php')==true || Utils::esOpcionMenuActiva('/')==true)
                echo '<li class="active lien">'; else echo '<li class=”0lien”>';?>
              <a href="about.php">About</a></li>

              <?php if (Utils::esOpcionMenuActiva('/blog.php')==true || Utils::esOpcionMenuActiva('/')==true)
                echo '<li class="active lien">'; else echo '<li class=”0lien”>';?>
              <a href="blog.php">Photo</a></li>

              <?php if (Utils::esOpcionMenuActiva('/contact.php')==true || Utils::esOpcionMenuActiva('/')==true)
                echo '<li class="active lien">'; else echo '<li class=”0lien”>';?>
              <a href="contact.php">Contact</a></li>

              <?php if (Utils::esOpcionMenuActiva('/galeria.php')==true || Utils::esOpcionMenuActiva('/')==true)
                echo '<li class="active lien">'; else echo '<li class=”0lien”>';?>
              <a href="galeria.php">Galeria</a></li>

              <?php if (Utils::esOpcionMenuActiva('/Asociados.php')==true || Utils::esOpcionMenuActiva('/')==true)
                echo '<li class="active lien">'; else echo '<li class=”0lien”>';?>
              <a href="Asociados.php">Asociados</a></li>

            </ul>
         </div>
     </div>
   </nav>