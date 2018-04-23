<?php
    include 'conexion.php';
    $inicio = new conexion();
    $inicio->get_connection();
    $recibidos = $inicio->get_seleccion();
    echo json_encode($recibidos); 
    $inicio->get_close();

?>