<?php
    include 'conexion.php';
    //para recuperar los datos enviados desde el archivo angular
    $datos = json_decode(file_get_contents('php://input'), true);
    //crea una instancioa de conexión
   
    $miConn = new conexion();
    //llamar al métod para conectar
    $miConn->get_connection();
    //asignación de los datos para los campos de la base de datos
    $nombre = $datos["nombre"];
    $apellido = $datos["apellido"];
    $email = $datos["email"];
    //insertar datos a la base de datos
    $miConn->insertar($nombre, $apellido, $email);
    $mis_datos = $miConn->get_seleccion(); 
    echo json_encode($mis_datos);
   
    //$resultados = array('nombre'=>$datos["nombre"], 'apellido'=>$datos["apellido"], 'email'=>$datos["email"]);
    //convertir los datos de la sesión en un json
    //echo json_encode($resultados);
    //echo "se ha ingresado una nueva persona";
    $miConn->get_close();

?>