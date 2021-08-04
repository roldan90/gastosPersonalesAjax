<?php 
    class Conexion {
        public function conectar() {
            $servidor = "localhost";
            $usuario = "root";
            $password = "autodidacta";
            $db = "gastos";

            $conexion =  mysqli_connect($servidor, 
                                        $usuario, 
                                        $password, 
                                        $db);

            return $conexion;
        }
    }
?>