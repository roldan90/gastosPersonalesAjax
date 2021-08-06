<?php
    session_start();
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idUsuario = $_SESSION['usuario']['id'];
    $sql = "SELECT 
                gastos.id_gasto AS idGasto,
                cat.nombre AS categoria,
                gastos.monto AS monto,
                gastos.descripcion AS descripcion,
                gastos.fecha AS fecha
            FROM
                t_gastos AS gastos
                    INNER JOIN
                t_cat_categorias AS cat ON gastos.id_categoria = cat.id_categoria
                    AND gastos.id_usuario = '$idUsuario'";
    $respuesta = mysqli_query($conexion, $sql);
?>

<style>
.tabla-estilo {
    background-color:white;font-family: 'Roboto', sans-serif;
}
</style>

<table class="table table-hover table-bordered tabla-estilo table-condensed table-sm" id="datatableGastos">
    <thead>
        <tr>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($mostrar = mysqli_fetch_array($respuesta)) { 
        ?>
        <tr>
            <td><?php echo $mostrar['categoria'];?></td>
            <td><?php echo $mostrar['descripcion'];?></td>
            <td><?php echo $mostrar['monto'];?></td>
            <td><?php echo $mostrar['fecha'];?></td>
            <td class="text-center">
                <button 
                    class="btn btn-warning btn-sm" 
                    data-toggle="modal" 
                    data-target="#modalActualizarGasto" 
                    onclick='obtenerDatosGasto(<?php echo $mostrar["idGasto"] ?>)'>
                    <span class="fas fa-edit"></span>
                </button>
            </td>
            <td class="text-center">
                <button class="btn btn-danger btn-sm" onclick="eliminarGasto(<?php echo $mostrar['idGasto'] ?>)">
                    <span class="fas fa-fire-alt"></span>
                </button>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<script>



$(document).ready(function() {
    $('#datatableGastos').DataTable( {
        dom: 'Bfrtip',
        buttons: {
            buttons: [
                { extend: 'copy', className: 'btn btn-outline-info' , text : '<li class="fas fa-copy"></li> Copiar' },
                { extend: 'excel', className: 'btn btn-outline-success', text: '<li class="fas fa-file-excel"></li> Excel'},
                { extend: 'csv', className: 'btn btn-outline-secondary', text: '<li class="fas fa-file-csv"></li> CSV'},
                { extend: 'pdf', className: 'btn btn-outline-danger', text: '<li class="fas fa-file-pdf"></li> Pdf'}
            ],
            dom: {
                button: {
                    className: 'btn'
                }
            }
        },
        "language": {
                "lengthMenu": "Muestra _MENU_ registros por pagína",
                "sZeroRecords":    "No se encontraron resultados",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                "search": "Buscar:"    
        }
    });
});



</script>