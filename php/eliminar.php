<?php
    include 'conexion.php';
    $datos = json_decode(file_get_contents('php://input'), true);
    $delete = new conexion();
    $id = $datos["id"];
    $delete->get_connection();
    $delete->eliminar($id);
    $nuevos = $delete->get_seleccion();
    echo json_encode($nuevos); 
    $delete->get_close();
   
?>