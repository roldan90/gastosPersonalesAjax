<?php
    $sql = "SELECT id_categoria, nombre FROM t_cat_categorias ORDER BY nombre";
    $respuesta = mysqli_query($conexion, $sql);
?>
<form id="frmActualizarGasto" method="POST" onsubmit="return actualizarGasto()">
    <div class="modal fade" id="modalActualizarGasto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gasto nuevo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="idGasto" id="idGasto" hidden>
                    <label for="idCategoriau">Categoria</label>
                    <select name="idCategoriau" id="idCategoriau" class="form-control" required>
                        <option value=""></option>
                    <?php while($mostrar = mysqli_fetch_array($respuesta)): ?>
                        <option value="<?php echo $mostrar['id_categoria'] ?>"><?php echo $mostrar['nombre'] ?></option>
                    <?php endwhile; ?>
                    </select>
                    <label for="montou">Monto</label>
                    <input type="number" name="montou" id="montou" class="form-control" required>
                    <label for="descripcionu">Descripción</label>
                    <input type="text" name="descripcionu" id="descripcionu" class="form-control" required>
                    <label for="fechau">Fecha</label>
                    <input type="date" name="fechau" id="fechau" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
                    <button class="btn btn-warning">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>