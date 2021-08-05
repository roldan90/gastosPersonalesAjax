<?php
    include "Conexion.php";

    class Gastos extends Conexion {
        public function agregarNuevoGasto($idUsuario, $idCategoria, $monto, $descripcion, $fecha) {
            $conexion = Conexion::conectar();

            $sql = "INSERT INTO t_gastos (id_categoria,
                                            id_usuario,
                                            monto,
                                            descripcion,
                                            fecha) 
                    VALUES ('$idCategoria',
                            '$idUsuario',
                            '$monto',
                            '$descripcion',
                            '$fecha')";
            $respuesta = mysqli_query($conexion, $sql);
            mysqli_close($conexion);

            return $respuesta;
        }
    }