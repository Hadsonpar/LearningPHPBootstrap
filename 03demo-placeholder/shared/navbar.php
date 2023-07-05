<!-- Adicionar la pagina php que contiene la conexión a la base de datos bootstrap_demo -->
<?php require 'config/dbconfig.php'; ?>

<!--
    Inicio del desarrollo del componente navbar de tipo fixed-top
-->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <!--
      Texto que puede ser remplaza por el logo de la página o sitio web
      -->
      <a class="navbar-brand" href=".">03 demo placeholder</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php

            /*  Script SQL para recuperar los registro y listar las opciones para 
                alimentar dinámicamente al nav-item
            */
            $sqlwo  = mysqli_query($con, "SELECT * FROM weboption WHERE active = 1");

            foreach($sqlwo as $nav)
            {
              $wo_id    = $nav['weboption_id'];
              $wo_link  = $nav['weboption_link'];
              $wo_name  = $nav['weboption_name'];

              /*  Script SQL para recuperar los registro y listar las sub opciones para
                  alimentar dinámicamente al nav-item dropdown
              */
              $sqlwso = mysqli_query($con, "SELECT  b.websuboption_id, a.weboption_id, a.weboption_name,
                                                    b.websuboption_name, b.websuboption_link
                                            FROM weboption a INNER JOIN websuboption b ON b.weboption_id = a.weboption_id
                                            WHERE b.weboption_id = '$wo_id' AND b.active = 1 ORDER BY a.weboption_id");

              if(mysqli_num_rows($sqlwso) == 0){
                echo '             
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href='.$wo_link.'>'.$wo_name.'</a>
                  </li>                  
                  ';     
              }else{
                echo '
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      '.$wo_name.'
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  ';
                foreach($sqlwso as $dropdown)
                  {
                    $wso_link  = $dropdown['websuboption_link'];
                    $wso_name  = $dropdown['websuboption_name'];

                    echo '                     
                        <li><a class="dropdown-item" href='.$wso_link.'>'.$wso_name.'</a></li>                                                    
                        ';
                  }
                    echo '
                      </ul>
                    </li>';
                }
            }          
        ?>
      </ul>

        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>

</nav>