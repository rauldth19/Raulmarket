<?php

//--- FICHERO QUE EDITA  LOS PRODUCTOS DE LA TIENDA ---

//Obtiene el rol del usuario.
$rol = $_SESSION["session"];

//Obtiene el menú.
include_once("menu.php");


$id_articulo = $nombre = $precio = $seccion = $descipcion = $imagen = "";

//Almacena en el array los productos obtenidos para mostrarlos posteriormente.
if (isset($dataToView["data"]["id_articulo"])) $id_articulo = $dataToView["data"]["id_articulo"];
if (isset($dataToView["data"]["nombrearticulo"])) $nombre = $dataToView["data"]["nombrearticulo"];
if (isset($dataToView["data"]["seccion"])) $seccion = $dataToView["data"]["seccion"];
if (isset($dataToView["data"]["precio"])) $precio = $dataToView["data"]["precio"];
if (isset($dataToView["data"]["descripcion"])) $descripcion = $dataToView["data"]["descripcion"];
if (isset($dataToView["data"]["imagen"])) $imagen = $dataToView["data"]["imagen"];
?>



<?php
/*
- NOTIFICACIÓN
Alerta que sólo se muestra cuando al obtener "response" sea "true" indicando que todo ha salido correctamente.
Muestra también un enlace para volver al listado principal.
*/
if (isset($_GET["response"]) and $_GET["response"] === true) {
?>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col col-md-10">
                <div class="alert alert-success">
                    Operación realizada correctamente. <a href="index.php?controller=noteController&action=listSeccion&seccion=<?php echo $seccion; ?>">Volver al listado</a>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>


<!--
- FORMULARIO
Muestra un formulario con los datos a modificar.
Envía los datos modificados a "create" ubicado en "noteController".
Obteniendo también el id del articulo en un botón oculto.
-->
<section class="vh-100">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col col-md-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="index.php?controller=noteController&action=save" method="POST" enctype="multipart/form-data">

                                    <input type="hidden" name="id_articulo" value="<?php echo $id_articulo; ?>" />

                                    <div class="form-outline mb-4">
                                        <input type="text" name="nombrearticulo" value="<?php echo $nombre; ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example17">Nombre del producto</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="seccion" value="<?php echo $seccion; ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example27">Sección</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="precio" value="<?php echo $precio; ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example27">Precio</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="descripcion" value="<?php echo $descripcion; ?>" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example27">Descripcion </label>
                                    </div>


                                    <div class="form-outline mb-4">
                                        <input type="file" class="form-control" id="foto" name="foto">
                                        <label class="form-label" for="form2Example27">Imagen</label>
                                    </div>




                                    <input type="submit" value="Guardar" class="btn btn-primary mb-3" />

                                    <!-- Enlace que cancela y nos dirige a "list" ubicado en "noteController" -->
                                    <a class="btn btn-danger mb-3" href="index.php?controller=noteController&action=listSeccion&seccion=<?php echo $seccion; ?>">Cancelar</a>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>