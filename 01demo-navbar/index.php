<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
?>

<!doctype html>
<html lang="en">
  <!--  Bloque donde se incluye los links con relacion a las css para el
        control del navbar, framework bootstrap y otras tags que son
        parte de la cabecera de la página web o sitio web -->
  <?php include 'shared/head.php'; ?>

  <body>
    <!--  Bloque donde se incluye el tag svg para los "symbolos"
          con relación a los iconos de redes sociales -->
    <?php include 'shared/iconsm.php'; ?>

    <!--  Bloque donde se incluye el script para la lista de
          opciones (menú dinámico) de la página web o sitio web -->
    <?php include 'shared/navbar.php'; ?>

    <main class="container">
      <div class="bg-light p-5 rounded">
        <h1>Navbar example</h1>
        <p class="lead">This example is a quick exercise to illustrate how the top-aligned navbar works. 
                        As you scroll, this navbar remains in its original position and moves with the rest of the page.</p>
        <a class="btn btn-lg btn-primary" href="../components/navbar/" role="button">View navbar docs &raquo;</a>
      </div>
    </main>

    <!--  Bloque donde se incluye el footer de la página web o sitio web-->
    <?php include 'shared/footer.php'; ?>
  </body>
</html>