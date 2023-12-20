<?php

//--- FICHERO QUE CREA LOS PRODUCTOS DE LA TIENDA ---



/*
- NOTIFICACIÓN
Alerta que sólo se muestra cuando al obtener "response" sea "true" indicando que todo ha salido correctamente.
Muestra también un enlace para volver al listado principal.
*/
if (isset($_GET["response"]) and $_GET["response"] === true) {
?>
    <div class="alert alert-success">
        Operación realizada correctamente. <a href="index.php?controller=noteController&action=list">Volver al listado</a>
    </div>
<?php
}
?>
<div class="row d-flex align-items-center">



    <!--
    - FORMULARIO
    Muestra un formulario con los espacios a insertar.
    Envía los datos modificados a "create" ubicado en "noteController".
    Obteniendo también un botón oculto con el "id_articulo".
    -->
    <form class="card-body text-white text-center bg-dark border border-secondary rounded" action="index.php?controller=noteController&action=create" method="POST">

        <input type="hidden" name="id_articulo" value="<?php echo $id_articulo; ?>" />

        <div class="form-group mb-3">
            <label>Nombre del producto: </label>
            <input class="form-control text-white bg-secondary" type="text" name="nombrearticulo" value="<?php echo $nombre; ?>" />
        </div>

        <div class="form-group mb-3">
            <label>Sección: </label>
            <input class="form-control text-white bg-secondary" type="number" name="seccion" value="<?php echo $seccion; ?>" />
        </div>

        <div class="form-group mb-3">
            <label>Precio: </label>
            <input class="form-control text-white bg-secondary" type="number" name="precio" value="<?php echo $precio; ?>" />
        </div>

        <div class="form-group mb-3">
            <label>País : </label>
            <input class="form-control text-white bg-secondary" type="text" name="descripcion" value="<?php echo $descripcion; ?>" />
        </div>
        <input type="submit" value="Guardar" class="btn btn-outline-primary" />

        <!-- Enlace que cancela y nos dirige a "list" ubicado en "noteController" -->
        <a class="btn btn-outline-danger" href="index.php?controller=noteController&action=list">Cancelar</a>
    </form>
</div>