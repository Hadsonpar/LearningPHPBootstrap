<div class="container">
  <footer class="py-5">    

        <?php

          $sql  = mysqli_query($con, "SELECT b.webfooter_id, b.webfooter_title, b.webfooter_name
                                      FROM pagesettings a INNER JOIN webfooter b ON a.pagesettings_id = b.pagesettings_id 
                                      WHERE a.pagesettings_id = 6 and a.active = 1 ORDER BY b.webfooter_id ASC");

          echo '
            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
              <div class="row">';

          foreach($sql as $jp)
            {
                $jp_id        = $jp['webfooter_id'];                
                $jp_title     = $jp['webfooter_title'];              
                $jp_footername= $jp['webfooter_name'];

                if($jp_id == 4){
                  echo '
                  <div class="col-lg-4">
                    <h5>'.$jp_title.'</h5>
                    <p>'.$jp_footername.'</p>            
                  </div>
                  ';
                }
            }
        ?>

       <?php
          
          $sql  = mysqli_query($con, "SELECT a.pagesettings_name, b.webfooter_id, b.webfooter_title, b.webfooter_details, 
                                             b.webfooter_name, b.webfooter_icon, b.webfooter_link
                                      FROM pagesettings a INNER JOIN webfooter b ON a.pagesettings_id = b.pagesettings_id 
                                      WHERE a.pagesettings_id = 6 and a.active = 1 ORDER BY b.webfooter_id ASC");

          echo '<div class="col-lg-2">            
                      <h5>Contacto</h5>';
          foreach($sql as $jp)
            {             
                $jp_title     = $jp['webfooter_title'];
                $jp_icon      = $jp['webfooter_icon'];
                $jp_footername= $jp['webfooter_name'];

                if($jp_title == 'Contacto'){
                  echo '                    
                      <ul class="nav flex-column">
                        <li class="nav-item mb-2"><svg class="bi" width="16" height="16">'.$jp_icon.'</svg> '.$jp_footername.'</li>
                      </ul>';
                }
            }
          echo '  
                </div>';

          echo '<div style="color: white;" class="col-lg-2">            
                      <h5>Servicios</h5>';
          foreach($sql as $jp)
            {             
                $jp_title     = $jp['webfooter_title'];
                $jp_icon      = $jp['webfooter_icon'];
                $jp_footername= $jp['webfooter_name'];
                $jp_link      = $jp['webfooter_link'];

                if($jp_title == 'Servicios'){
                  echo '                    
                      <ul class="nav flex-column">                        
                        <li class="nav-item mb-2"><a href='.$jp_link.' class="footer-services">'.$jp_footername.'</a></li>
                      </ul>';
                }
            }
          echo '  
                </div>';
          
          echo '
            <div class="col-lg-4">            
              <form>';
          foreach($sql as $jp)
            {             
                $jp_title     = $jp['webfooter_title'];
                $jp_footername= $jp['webfooter_name'];
                $jp_details   = $jp['webfooter_details'];

                if($jp_title == 'subscribe'){
                  echo '                    
                    <h5>'.$jp_details.'</h5>
                    <p>'.$jp_footername.'</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                      <label for="newsletter1" class="visually-hidden">Email address</label>
                      <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                      <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>';
                }
            }
          echo '  
              </form>
            </div>
          </div>
        </div>';
        ?>
  
    <?php echo '
    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
      <p>&copy; 2022 Hadsonpar, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex">';

        $sql = mysqli_query($con, "SELECT webfooter_link, webfooter_icon FROM `webfooter` WHERE webfooter_title = 'socialnetworks' AND pagesettings_id = 6");

        /*$row = mysqli_fetch_assoc($sql);*/

       foreach($sql as $row)
        {  
          echo '
            <li class="ms-3"><a href='.$row['webfooter_link'].'><svg class="bi" width="24" height="24">'.$row['webfooter_icon'].'</svg></a></li>
          ';
        }  
    echo '
      </ul>
    </div>';
    ?>   
  </footer>
</div>

<!--js bootstrap en general, es decir lo usamos para todo los demos realizados-->
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<!--archivos js para el typewriter, se puede agregar otros typewriter (hasta hora se creo typewriterbootstrap)-->
<script src="assets/plugins/typewriterjs/core.js"></script> 
<script src="assets/js/typewriter-custom.js"></script> 