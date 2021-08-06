<?php

    include "../../clases/Gastos.php";
    $Gastos = new Gastos();

    $idGasto = $_POST['idGasto'];
    $idCategoria = $_POST['idCategoriau'];
    $descripcion = $_POST['descripcionu'];
    $monto = $_POST['montou'];
    $fecha = $_POST['fechau'];

    echo $Gastos->actualizarGasto($idGasto, $idCategoria, $descripcion, $monto, $fecha);

?>