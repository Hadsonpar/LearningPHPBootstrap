<?php   
    /*Datos de conexion a la base de datos*/
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "bootstrap_demo";

    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    $gerror = '';

    if(mysqli_connect_errno()){
        $gerror = 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
    }else{
        $gerror = '';
    }
?>