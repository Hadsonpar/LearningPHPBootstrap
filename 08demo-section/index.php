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
    
  <header class="header fixed-top"><!-- Agregar la equita header -->
    <!--  Bloque donde se incluye el script para la lista de
            opciones (menú dinámico) de la página web o sitio web -->
    <?php include 'shared/navbar.php'; ?>
  </header>

    <!--<main>-->
    <section id="home">
      <!-- Se retira el estilo en relación a class="container", con la finalidad de abarcar toda el ancho de la pantalla-->
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
    </section>

    <section id="services">
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
    </section>

    <section id="about">
      <div class="container-fluid">
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
                 <div class="title-home">
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
      </div>
    </section>

    <section id="product">
      <!-- Inicio de la maquetación para el componente accordion -->
      <div class="container-fluid"> 
        <?php
          /* Script SQL para recuperar los registro y listar los valores para alimentar dinámicamente a los accordion */
          $sqljp  = mysqli_query($con, "SELECT * FROM pagesettings WHERE pagesettings_id = 4 and active = 1");

          foreach($sqljp as $jp)
          {
              $jp_name    = $jp['pagesettings_name'];
              $jp_details = $jp['pagesettings_details'];

              echo '
                <div class="title-home">
                  <div class="text-center p-5">
                      <h2>'.$jp_name.'</h2>
                      <p>'.$jp_details.'</p>
                  </div>
                </div>';

              $sqlh =  mysqli_query($con, "SELECT  a.pagesettings_name, a.pagesettings_id, b.websection_id, b.websection_name, b.websection_title, b.websection_subtitle,
                                                  b.websection_image_url, b.websection_button_url, b.websection_button_text
                                          FROM pagesettings a INNER JOIN websection b ON a.pagesettings_id = b.pagesettings_id WHERE a.active = 1 
                                          and a.pagesettings_id = 4 and b.websection_id = 15 ORDER BY b.websection_id");
              echo '
                <div class="row align-items-md-stretch">
                  <div class="col-md-6">
                    <div class="h-100 p-5 bg-light border rounded-3">
                      <div class="row accordion-price">';
              foreach($sqlh as $jph)
              {
                echo '
                        <div class="col-sm-4">                      
                          <img src='.$jph['websection_image_url'].' class="d-block w-100" alt="accordion bootstrap">
                        </div>

                        <div class="col-sm-8">
                          <h1>'.$jph['websection_title'].'</h1>
                          <p>'.$jph['websection_subtitle'].'</p>
                          <p><a class="btn btn btn-primary" href='.$jph['websection_button_url'].'>'.$jph['websection_button_text'].'</a></p>
                        </div>                         
                    ';
              }

                echo '</div> 
                    </div>
                  </div>';

                $sqlhy =  mysqli_query($con, "SELECT  a.pagesettings_name, a.pagesettings_id, b.websection_id, b.websection_name, b.websection_title, b.websection_subtitle,
                                                  b.websection_text_one, b.websection_text_two
                                          FROM pagesettings a INNER JOIN websection b ON a.pagesettings_id = b.pagesettings_id WHERE a.active = 1 
                                          and a.pagesettings_id = 4 and b.websection_id != 15 ORDER BY b.websection_id");

                echo '       
                  <div class="col-md-6 accordion-faq">
                    <div class="h-100 rounded-3">
                      <div class="accordion" id="accordionEcommerce">
                        <div class="accordion-item">';

                      foreach($sqlhy as $jphy)
                      {                        
                      echo '                                                                    
                          <h2 class="accordion-header" id='.$jphy['websection_text_one'].'>
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target=#'.$jphy['websection_text_two'].' aria-expanded="true" aria-controls='.$jphy['websection_text_two'].'>
                              '.$jphy['websection_title'].'
                            </button>
                          </h2>';

                        if($jphy['websection_text_two'] == 'collapseOne'){
                          echo '<div id='.$jphy['websection_text_two'].' class="accordion-collapse collapse show" aria-labelledby='.$jphy['websection_text_one'].' data-bs-parent="#accordionEcommerce">';
                        }elseif($jphy['websection_text_two'] != 'collapseOne'){
                          echo '<div id='.$jphy['websection_text_two'].' class="accordion-collapse collapse" aria-labelledby='.$jphy['websection_text_one'].' data-bs-parent="#accordionEcommerce">';
                        }

                          echo '                          
                            <div class="accordion-body">
                              <p>'.$jphy['websection_subtitle'].'</p>
                            </div>
                          </div>';
                      }
                echo '
                        </div>      
                      </div>
                    </div>
                  </div>
                </div>';
          }
        ?>                
      </div>
      <!-- Fin de la maquetación para el componente accordion -->
    </section>

    <section id="courses">
      <!-- Inicio de la maquetación para el componente list-group" -->
      <div class="container">
      <?php

        $sqllg = mysqli_query($con, "SELECT * FROM pagesettings WHERE pagesettings_id = 5 AND active = 1");

        foreach($sqllg as $lg)
        {

          $lg_name    = $lg['pagesettings_name'];
          $lg_details = $lg['pagesettings_details'];

        echo '
        <div class="title-home">
          <div class="text-center p-5">
            <h2>'.$lg_name.'</h2>
            <p>'.$lg_details.'</p>
          </div>
        </div>';

          $sqllgy = mysqli_query($con, "SELECT weblistgroup_name, weblistgroup_link, weblistgroup_title FROM weblistgroup WHERE pagesettings_id = 5");

        echo '
        <div class="row">
          <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">';

          foreach ($sqllgy as $lgy)
          { 
            
          
              if($lgy['weblistgroup_name'] == 'list-home-list'){
                echo '<a class="list-group-item list-group-item-action active" id='.$lgy['weblistgroup_name'].' data-bs-toggle="list" href=#'.$lgy['weblistgroup_link'].' role="tab" aria-controls="list-home">'.$lgy['weblistgroup_title'].'</a>';
              }else{
                echo '<a class="list-group-item list-group-item-action" id='.$lgy['weblistgroup_name'].' data-bs-toggle="list" href=#'.$lgy['weblistgroup_link'].' role="tab" aria-controls="list-home">'.$lgy['weblistgroup_title'].'</a>';
              }
          }
        echo '
            </div>
          </div>
          <div class="col-8">
            <div class="tab-content" id="nav-tabContent">';  

            $sqllgz = mysqli_query($con, "SELECT  a.weblistgroup_name, a.weblistgroup_link, a.pagesettings_id,
                                                  b.weblistgroupdetails_id, b.weblistgroup_id, b.websection_id,
                                                  c.websection_name, c.websection_title, c.websection_subtitle,
                                                  c.websection_image_url, c.websection_button_url, c.websection_button_text
                                          FROM weblistgroup a 
                                          INNER JOIN weblistgroupdetails b ON a.weblistgroup_id = b.weblistgroup_id 
                                          INNER JOIN websection c ON b.websection_id = c.websection_id
                                          WHERE b.active = 1 and a.pagesettings_id = 5");

            foreach($sqllgz as $lgz){

              if($lgz['weblistgroup_name'] == 'list-home-list'){
                echo '<div class="tab-pane fade show active" id='.$lgz['weblistgroup_link'].' role="tabpanel" aria-labelledby='.$lgz['weblistgroup_name'].'>';
              }else{
                echo '<div class="tab-pane fade" id='.$lgz['weblistgroup_link'].' role="tabpanel" aria-labelledby='.$lgz['weblistgroup_name'].'>';
              }
              echo '
                <h3>'.$lgz['websection_title'].'</h3>
                <p>'.$lgz['websection_subtitle'].'</p>
                <div class="text-button">
                  <a href='.$lgz['websection_button_url'].'>'.$lgz['websection_button_text'].'</a>
                </div>                
              </div>';

            }

        echo '
            </div>
          </div>
        </div>';

        }
      ?>  
      </div>
      <!-- Fin de la maquetación para el componente list-group" -->
    </section>
    
    <div class="newsletter">        
      <!--  Bloque donde se incluye el footer de la página web o sitio web-->
      <?php include 'shared/footer.php'; ?>        
    </div>    
    <!-- </main>-->
    
  </body>
</html>