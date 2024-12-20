

<body id="page-top">

    <!-- Navigation Bar -->
    <?php
    require_once __DIR__ . '/navegacion.part.php';
    ?>
    <!-- End of Navigation Bar -->
    <?php require_once __DIR__.'/show-error.part.view.php';
            ?>
    <!-- Formulario que permite subir una imagen con su descripción -->
    <!-- Hay que indicar OBLIGATORIAMENTE enctype="multipart/form-data" para enviar ficheros al servidor -->
    <form clas="form-horizontal" action="asociados/nueva" method="post"
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
                <!-- CAPTCAHA -->
                <label class="label-control">Introduce el captcha <img style="border: 1px solid #D3D0D0 "
                        src="/app/utils/captcha.php" id='captcha'></label>
                <input class="form-control" type="text" name="captcha">

                <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
            </div>
        </div>
    </form>
    <hr class="divider">
    <div class="imagenes_galeria">
    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($asociados as $asociado) : ?>
                            <tr>
                                <th scope="row"><?= $asociado->getId() ?></th>
                                <td>
                                    <img src="<?= $asociado->getUrlAsociado() ?>"
                                        alt="<?= $asociado->getDescripcion() ?>"
                                        title="<?= $asociado->getDescripcion() ?>"
                                        width="100px">
                                </td>                                
                                <td><?= $asociado->getDescripcion() ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
    </div>
    </div>
    </div>
    </div>
    <?php
