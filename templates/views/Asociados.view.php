<?php
 require_once __DIR__ . '/inicio.part.php';
 ?>
<body id="page-top">

<!-- Navigation Bar -->
<?php
 require_once __DIR__ . '/navegacion.part.php';
 ?>
<!-- End of Navigation Bar -->
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                            <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                                <?php if (empty($errores)) : ?>
                                    <p><?= $mensaje ?></p>
                                <?php else : ?>
                                    <ul>
                                        <?php foreach ($errores as $error) : ?>
                                            <li><?= $error ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
            <!-- Formulario que permite subir una imagen con su descripción -->
            <!-- Hay que indicar OBLIGATORIAMENTE enctype="multipart/form-data" para enviar ficheros al servidor -->
            <form clas="form-horizontal" action="<?= $_SERVER['PHP_SELF'] ?>" method="post"
                enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Logo</label>
                        <input class="form-control-file" type="file" name="Logo">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $Nombre ?> ">
                        <label class="label-control">Descripción</label>
                        <textarea class="form-control" name="descripcion"><?= $descripcion ?></textarea>
                        <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                    </div>
                </div>
            </form>
            <hr class="divider">
            <div class="imagenes_galeria">
            </div>
        </div>
    </div>
</div>
<?php
require_once __DIR__ . '/fin.part.php';