<?php

    $idGasto = $_POST['idGasto'];
    include "../../clases/Gastos.php";
    $Gastos = new Gastos();

    echo $Gastos->eliminarGasto($idGasto);
?>