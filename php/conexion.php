<?php
    //creación de una clase para la conexión con la base de datos
    class conexion{
        private $server = "mihost";
        private $user = "miuser";
        private $pass = "mipass";
        private $db = "miDB";
        public $conn;
        public $sql;
        public $resultado;
        public $data;
       
        
        //método para crear la conexión con la base de datos
        public function get_connection(){
            $this->conn = new mysqli($this->server, $this->user, $this->pass, $this->db);
            if ($this->conn->connect_error) {
                echo "Conexión fallida: " . $conn->connect_error;
                
            } 
            
        }//cierra método para la conexión con la base de datos
        //método para ingresar datos en la base de datos
        public function insertar($nombre, $apellido, $email){
            $this->sql = "INSERT INTO personas (nombre, apellido, email)
            VALUES ('$nombre', '$apellido', '$email')";
            
            if ($this->conn->query($this->sql) === TRUE) {
               // echo "New registro se creó de manera exitosa";
            } else {
                echo "Error: " . $this->sql . "<br>" . $this->conn->error;
            }
        }//termina métod para ingresar datos a la base de datos
        //método para seleccionar a todos los usuarios
        public function get_seleccion(){
            
            $this->sql = "SELECT * FROM personas";
            $this->resultado = $this->conn->query($this->sql);
            if ($this->resultado->num_rows > 0) {
                // salida de datos de cada uno de los datos
                while($row = $this->resultado->fetch_assoc()) {
                     $this->data[] = $row;
                }
            } else {
                
                $this->data[] = null;
            }
            return $this->data;
          
        } //termina método para seleccionar todos los registros con la base de datos
        //método para eliminar datos en la base de datos
        public function eliminar($id){
            $this->sql = "DELETE FROM personas WHERE id=$id";
            $this->conn->query($this->sql);
           
        } //terminar método para eliminar datos de la base de datos
        //inicia método para la actualización de datos
        public function actualizar($id, $nombre, $apellido, $email){
            $this->sql = "UPDATE personas SET nombre='$nombre', apellido='$apellido', email='$email' WHERE id=$id";
            $this->conn->query($this->sql);
        }

        

        //método para cerra la conexión con la base de datos
        public function get_close(){
            $this->conn->close();
          
        }
    }
    
?>