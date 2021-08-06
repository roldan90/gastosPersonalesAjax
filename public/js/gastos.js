function agregarNuevoGasto(){
    $.ajax({
        type:"POST",
        data:$('#frmAgregarGasto').serialize(),
        url:"../procesos/gastos/agregarNuevoGasto.php",
        success:function(resultado) {
            resultado = resultado.trim();

            if (resultado == 1) {
                $('#frmAgregarGasto')[0].reset();
                Swal.fire(":D","Agregado con exito!","success");
                $('#tablaGastosLoad').load("gastos/tablaGastos.php");
            } else {
                Swal.fire(":(","Error al agregar" + resultado,"error");
            }
        }
    });

    return false;
}

function obtenerDatosGasto(idGasto) {
    $.ajax({
        type:"POST",
        data:"idGasto=" + idGasto,
        url:"../procesos/gastos/obtenerDatosGasto.php",
        success:function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#idGasto').val(respuesta['id_gasto']);
            $('#idCategoriau').val(respuesta['id_categoria']);
            $('#montou').val(respuesta['monto']);
            $('#descripcionu').val(respuesta['descripcion']);
            $('#fechau').val(respuesta['fecha']);
        }
    });
}

function actualizarGasto() {
    $.ajax({
        type:"POST",
        data:$('#frmActualizarGasto').serialize(),
        url:"../procesos/gastos/actualizarGasto.php",
        success:function(resultado) {
            resultado = resultado.trim();

            if (resultado == 1) {
                Swal.fire(":D","Actualizado con exito!","success");
                $('#tablaGastosLoad').load("gastos/tablaGastos.php");
                $('#modalActualizarGasto').modal('hide');
            } else {
                Swal.fire(":(","Error al actualizar" + resultado,"error");
            }
        }
    });

    return false;
}

function eliminarGasto(idGasto) {

    Swal.fire({ 
        title: 'Estas seguro de eliminar este registro?', 
        text: "Una vez eliminado no podra recuperarse!", 
        icon: 'warning', 
        showCancelButton: true, 
        confirmButtonColor: '#3085d6', 
        cancelButtonColor: '#d33', 
        confirmButtonText: 'Borrar' }).then((result) => { 
            if (result.isConfirmed) { 
                $.ajax({
                    type:"POST",
                    data:"idGasto=" + idGasto,
                    url:"../procesos/gastos/eliminarGasto.php",
                    success:function(resultado) {
                        resultado = resultado.trim();
    
                        if (resultado == 1) {
                            Swal.fire(":D","Eliminado con exito!","info");
                            $('#tablaGastosLoad').load("gastos/tablaGastos.php");
                        } else {
                            Swal.fire(":(","Error al eliminar" + resultado,"error");
                        }
                    }
                });
            } 
    })
}