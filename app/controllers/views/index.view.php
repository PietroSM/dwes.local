<body id="page-top">

<!-- End of Navigation Bar -->

<!-- Principal Content Start -->
   <div id="index">

    <!-- Header -->
      <div class="row">
         <div class="col-xs-12 intro">
            <div class="carousel-inner">
               <div class="item active">
                <img class="img-responsive" src="/public/images/index/woman.jpg" alt="header picture">
               </div>
               <div class="carousel-caption">
                  <h1>FIND NICE PICTURES HERE</h1>
                  <hr>
               </div>
            </div>
         </div>
      </div>

      <div id="index-body">
      <!-- Pictures Navigation table -->
        <div class="table-responsive">
          <table class="table text-center">
            <thead>
              <tr>
                <td><a class="link active" href="#category1" data-toggle="tab">category I</a></td>
                <td><a class="link" href="#category2" data-toggle="tab">category II</a></td>
                <td><a class="link" href="#category3" data-toggle="tab">category III</a></td>
              </tr>
            </thead>
          </table>
          <hr>
        </div>
      
      <!-- Navigation Table Content -->
        <div class="tab-content">

        <!-- First Category pictures -->
        <?php
        $idCategoria = 1;
        shuffle($imagenesHome);
        require_once  __DIR__.'/index.part.view.php';
        ?>
        <!-- End of First category pictures -->

        <!--second category pictures -->
        <?php
        $idCategoria = 2;
        shuffle($imagenesHome);
        require_once  __DIR__.'/index.part.view.php';
        ?>
        <!-- End of second category pictures -->

        <!-- Third Category Pictures -->    

        <?php
        $idCategoria = 3;
        shuffle($imagenesHome);
        require_once  __DIR__.'/index.part.view.php';
        ?>
        <!-- Third Category Pictures -->

        </div>
    <!-- End of Navigation Table Content -->
      </div><!-- End of Index-body box -->

    <!-- Newsletter form -->
      <div class="index-form text-center">
        <h3>SUSCRIBE TO OUR NEWSLETTER </h3>
        <h5>Suscribe to receive our News and Gifts</h5>
        <form class="form-horizontal">
          <div class="form-group">
            <div class="col-xs-12 col-sm-6 col-sm-push-3 col-md-4 col-md-push-4">
            <input class="form-control" type="text" placeholder="Type here your email address">
            <a href="" class="btn btn-lg sr-button">SUBSCRIBE</a>
            </div>
          </div>
        </form>
      </div>
    <!-- End of Newsletter form -->  

    <!-- Box within partners name and logo -->
      <?php
      require_once __DIR__.'/indexlogos.view.part.php';
      ?>
    <!-- End of Box within partners name and logo -->

   </div><!-- End of index box -->

   <!-- Footer -->
</body>
</html>
