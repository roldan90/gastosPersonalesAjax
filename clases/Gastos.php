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
        
        public function actualizarGasto($idGasto, $idCategoria, $descripcion, $monto, $fecha) {
            $conexion = Conexion::conectar();
            $sql = "UPDATE t_gastos 
                    SET id_categoria = '$idCategoria', 
                        descripcion = '$descripcion',
                        monto = '$monto',
                        fecha = '$fecha' 
                    WHERE id_gasto = '$idGasto'";
            $respuesta = mysqli_query($conexion, $sql);
            mysqli_close($conexion);
            return $respuesta;
        }
        
        public function datosGasto($idGasto) {
            $conexion = Conexion::conectar();

            $sql = "SELECT id_categoria,
                            id_gasto,
                            monto,
                            descripcion,
                            fecha 
                    FROM t_gastos 
                    WHERE id_gasto = '$idGasto'";
            $respuesta = mysqli_query($conexion, $sql);

            $gasto = mysqli_fetch_array($respuesta);

            $datos = array(
                "id_categoria" => $gasto['id_categoria'],
                "monto" => $gasto['monto'],
                "descripcion" => $gasto['descripcion'],
                "fecha" => $gasto['fecha'],
                "id_gasto" => $gasto['id_gasto']
            );
            mysqli_close($conexion);
            return $datos;
        }

        public function eliminarGasto($idGasto) {
            $conexion = Conexion::conectar();

            $sql = "DELETE FROM t_gastos 
                    WHERE id_gasto = '$idGasto'";
            $respuesta = mysqli_query($conexion, $sql);
            mysqli_close($conexion);

            return $respuesta;
        }
    }