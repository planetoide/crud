<?php
    //inclusión del archivo contendera de la clase para la conexión a la base de datos y sus distintos métodos
    include 'conexion.php';
    //recuperar los datos enviados por ajax
    $datos = json_decode(file_get_contents('php://input'), true);
    $id = $datos["id"];
    $nombre = $datos["nombre"];
    $apellido = $datos["apellido"];
    $email = $datos["email"];
    //crear un objeto de tipo conexión
    $update = new conexion();
    //función para establecer la conexión con la base de datos
    $update->get_connection();
    //llamada a la función para realizar la actualización de los datos
    $update->actualizar($id, $nombre, $apellido, $email);
    //llamada a al método para seleccionar todos los registros
    $nuevos = $update->get_seleccion();
    //decodificar los elementos de la base de datos a un objeto json
    echo json_encode($nuevos); 
    //cerrar la conexión con la base de datos
    $update->get_close();
   
?>