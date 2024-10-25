<div class="last-box row">
        <div class="col-xs-12 col-sm-4 col-sm-push-4 last-block">
        <div class="partner-box text-center">
          <p>
          <i class="fa fa-map-marker fa-2x sr-icons"></i> 
          <span class="text-muted">35 North Drive, Adroukpape, PY 88105, Agoe Telessou</span>
          </p>
          <h4>Our Main Partners</h4>
          <hr>
        <div class="text-muted text-left">
          <?php
            use dwes\app\utils\Utils;
            $novaArray = Utils::extraeElementosAleatorios($imagenesLogo, 3);

            foreach($novaArray as $imagen){
          ?>
                <ul class="list-inline">
                    <li><img src="<?= $imagen->getUrlAsociado() ?>" alt="logo"></li>
                    <li><?= $imagen->getNombre() ?></li>
                </ul>


            <?php } ?>
        </div>
        </div>
        </div>
      </div>