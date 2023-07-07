<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!doctype html>
<html lang="en">
  <!--  Bloque donde se incluye los links con relacion a las css para el
        control del navbar, framework bootstrap y otras tags que son
        parte de la cabecera de la página web o sitio web -->
  <?php include 'shared/head.php'; ?>

  <!--  Bloque donde se incluye el tag svg para los "symbolos"
          con relación a los iconos de redes sociales -->
    <?php include 'shared/iconsm.php'; ?>
  <body> 
    
  <header><!-- Agregar la equita header -->
    <!--  Bloque donde se incluye el script para la lista de
            opciones (menú dinámico) de la página web o sitio web -->
    <?php include 'shared/navbar.php'; ?>
  </header>

    <main><!-- Se retira el estilo en relación a class="container", con la finalidad de abarcar toda el ancho de la pantalla-->
      <!-- Inicio de la maquetación para el coomponente carousel -->
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        
        <div class="carousel-inner">
          <!-- Inicio del script para construir dinamicamente el Componente Carousel  -->

          <!-- Aplicamos el filtro de "a.pagesettings_id = 1" a nuestra sentencia SQL
               con la finalidad de filtrar el registro correspodiente a  Carousel -->

          <?php
            $sql =  mysqli_query($con, "SELECT  a.pagesettings_name, b.websection_name, b.websection_title, b.websection_subtitle,
                                                b.websection_image_url, b.websection_button_url, b.websection_button_text
                                        FROM pagesettings a INNER JOIN websection b ON a.pagesettings_id = b.pagesettings_id WHERE a.active = 1 
                                        and a.pagesettings_id = 1"); /*nuevo filtro*/
            if(mysqli_num_rows($sql) > 0){
                while($row = mysqli_fetch_assoc($sql)){
                  echo '              
                  <div class="'.$row['websection_name'].'">
                    <div class="opacity-25">
                      <img src='.$row['websection_image_url'].' class="d-block w-100" alt="welcome learning bootstrap">
                    </div>
                    <div class="container">
                      <div class="carousel-caption text-start">              
                        <h1>'.$row['websection_title'].'</h1>              
                        <h3>'.$row['websection_subtitle'].'</h3>
                        <p><a class="btn btn-lg btn-primary" href='.$row['websection_button_url'].'>'.$row['websection_button_text'].'</a></p>
                      </div>
                    </div>
                  </div>              
                ';
                }            
            }
          ?>
          <!-- Finl de la construcción del script para alimentar el Componente Carousel -->
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- Fin de la maquetación para el componente carousel -->

      <!-- Inicio de la maquetación para el componente placeholder -->
      
      <!-- El placeholder es parte de otro container con la finalidad de centrar el contenido-->
      <div class="container marketing">
        <!-- Tres columnas para el componente placeholder -->
        <div class="row">
            <!-- Inicio del script para construir dinamicamente el Componente placeholder  -->
            <?php
              $sql =  mysqli_query($con, "SELECT  a.pagesettings_name, b.websection_name, b.websection_title, b.websection_subtitle,
                                                  b.websection_image_url, b.websection_button_url, b.websection_button_text
                                          FROM pagesettings a INNER JOIN websection b ON a.pagesettings_id = b.pagesettings_id WHERE a.active = 1 
                                          and a.pagesettings_id = 2"); /*filtrar los valores del placeholder*/
              if(mysqli_num_rows($sql) > 0){
                  while($row = mysqli_fetch_assoc($sql)){
                    echo '              
                    <div class="col-lg-4">                  
                      <img class="bd-placeholder-img" width="140" height="140" src='.$row['websection_image_url'].' class="d-block w-100" alt="welcome learning bootstrap">                  
                      
                      <h2>'.$row['websection_title'].'</h2>
                      <p>'.$row['websection_subtitle'].'</p>
                      <p><a class="btn btn-secondary" href='.$row['websection_button_url'].'>'.$row['websection_button_text'].'</a></p>
                      
                    </div>              
                  ';
                  }            
              }
            ?>
            <!-- Finl de la construcción del script para alimentar el Componente placeholder -->
        </div><!-- /.row -->
      </div>

      <!-- Inicio de la maquetación para el componente jumbotron -->      
      <?php
        /*  Script SQL para recuperar los registro y listar los valores para 
            alimentar dinámicamente a los jumbotrons
        */
        $sqljp  = mysqli_query($con, "SELECT * FROM pagesettings WHERE pagesettings_id = 3 and active = 1");

          foreach($sqljp as $jp)
          {
              $jp_name    = $jp['pagesettings_name'];
              $jp_details = $jp['pagesettings_details'];

              echo '
               <div class="jumbotron">
                  <div class="text-center p-5">
                      <h2>'.$jp_name.'</h2>
                      <p>'.$jp_details.'</p>
                  </div>
                </div>';

              $sqlh =  mysqli_query($con, "SELECT  a.pagesettings_name, a.pagesettings_id, b.websection_id, b.websection_name, b.websection_title, b.websection_subtitle,
                                                  b.websection_image_url, b.websection_button_url, b.websection_button_text
                                          FROM pagesettings a INNER JOIN websection b ON a.pagesettings_id = b.pagesettings_id WHERE a.active = 1 
                                          and a.pagesettings_id = 3 ORDER BY b.websection_id"); 
              foreach($sqlh as $jph)
              {
                if($jph['websection_id'] == 7)
                {
                  echo '      
                    <div class="jumbotron-one">
                      <div class="row">

                        <div class="col-6">
                          <img src='.$jph['websection_image_url'].' class="d-block w-100" alt="jumbotron one">
                        </div>    

                        <div class="col-6">            
                          <div class="p-5 mb-4 text-white">
                            <div class="container-fluid py-5">
                              <h1 class="display-5 fw-bold">'.$jph['websection_title'].'</h1>
                              <p class="col-md-10 fs-4">'.$jph['websection_subtitle'].'</p>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>';
                }
              }

              $sqlhy =  mysqli_query($con, "SELECT  a.pagesettings_name, a.pagesettings_id, b.websection_id, b.websection_name, b.websection_title, b.websection_subtitle,
                                                  b.websection_image_url, b.websection_button_url, b.websection_button_text
                                          FROM pagesettings a INNER JOIN websection b ON a.pagesettings_id = b.pagesettings_id WHERE a.active = 1 
                                          and a.pagesettings_id = 3 and b.websection_id != 7 ORDER BY b.websection_id"); 
              echo '<div class="container py-4">
                  <div class="row align-items-md-stretch">';
              foreach($sqlhy as $jphy)
              {
                echo '
                
                    <div class="col-md-6">';
                      if($jphy['websection_id'] == 8){
                        echo '<div class="h-100 p-5 text-bg-dark rounded-3">';
                      }elseif($jphy['websection_id'] == 9){
                        echo '<div class="h-100 p-5 bg-light border rounded-3">';
                      }                    
                      echo '
                        <h2>'.$jphy['websection_title'].'</h2>
                        <p>'.$jphy['websection_subtitle'].'</p>
                        <p><a class="btn btn-secondary" href='.$jphy['websection_button_url'].'>'.$jphy['websection_button_text'].'</a></p>
                      </div>

                    </div>
                    ';
              }

              echo '</div>
                </div>';
          }
      ?>      
      <!-- Fin de la maquetación para el componente jumbotron -->

    </main>
    <!--  Bloque donde se incluye el footer de la página web o sitio web-->
    <?php include 'shared/footer.php'; ?>
  </body>
</html>