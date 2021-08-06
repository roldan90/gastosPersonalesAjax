<?php
    session_start();
    $idGasto = $_POST['idGasto'];
    include "../../clases/Gastos.php";
    $Gastos = new Gastos();

    echo json_encode($Gastos->datosGasto($idGasto));
?>