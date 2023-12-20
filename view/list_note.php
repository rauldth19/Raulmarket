<!-- FICHERO QUE MUESTRA TODOS LOS PRODUCTOS -->


<?php
//Obtiene el rol del usuario.
$rol = $_SESSION["session"];


//Obtiene el menú.

include_once("menu.php");

?>




<div class="container mt-5">

    <div class="row">

        <?php

        /*
    - BUCLE QUE COMPRUEBA LOS USUARIOS
    */
        if (count($dataToView["data"]) > 0) {
            foreach ($dataToView["data"] as $note) {

                //Obtiene el número de seccion.
                $seccion = $note['seccion'];


        ?>

                <!-- Div que muestra cada producto con la opción de editar y eliminar, reutilizando las acciones correspondientes -->
                <div class="col-md-3 mt-4">
                    <div class="card-light mask-custom shadow-0 rounded">
                        <div class="bg-white rounded-top">
                            <div class="text-center">
                                <img class="rounded mt-4" src="<?php echo $note['imagen'] ?>" width="150">
                            </div>
                            <h4 class="card-title text-center mt-3"><?php echo $note['nombrearticulo']; ?></h4>
                            <br>
                        </div>
                        <div class="container text-white mt-4">
                            <div class="row">
                                <div class="col text-center">
                                    <?php echo  nl2br($note['descripcion']); ?>
                                </div>
                            </div>
                            <div class="row align-items-end mt-4">
                                <div class="col text-center">
                                    <div class="border-top border-dark me-5 ms-5">
                                        <br>
                                        <?php echo "<h3> " . nl2br($note['precio']) . "€ </h3>"; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        //Botón que se muestra SOLO si el usuario es administrador.
                        if ($rol == "Administrador") {
                        ?>
                            <div class="card-text d-flex align-items-center justify-content-between m-3">
                                <!-- Ejecuta "edit" ubicado en "noteController" enviándole el id del producto para identificarlo posteriormente -->
                                <a href="index.php?controller=noteController&action=edit&id_articulo=<?php echo $note['id_articulo']; ?>" class="btn btn-info mb-2">Editar</a>

                                <!-- Ejecuta la función "borrarDatos" enviándole también el id del artículo para identificarlo y la sección para enviárselo a "actualizar()" y mantener al usuario en la sección -->
                                <a class="btn btn-danger mb-2" onclick="borrarDatos('<?php echo $note['id_articulo'] ?>','<?php echo $note['seccion'] ?>')">Borrar</a>
                            </div>
                        <?php
                        }
                        if ($rol == "Usuario") {
                        ?>
                            <div class="card-text d-flex align-items-center justify-content-between m-3">

                                <!-- Botón que ejecuta el js "envia_carrito" que enviará los datos del producto en cuestion -->
                                <button id="al_carro" type="submit" class="btn btn-sm btn-success mb-3" onclick="envia_carrito(
                                    $('#ref<?php echo $note['id_articulo']; ?>').val(),
                                    $('#titulo<?php echo $note['id_articulo']; ?>').val(),
                                    $('#precio<?php echo $note['id_articulo']; ?>').val(),
                                    $('#cantidad<?php echo $note['id_articulo']; ?>').val());


                                    //Además ejecuta las siguientes funciones.
                                    setTimeout(function () {
                                    consultar_carrito();
                                    count_carrito();
                                }, 500);
                                "><img src="view/template/img/carro.png" width="30" height="30"> &nbsp;&nbsp;Añadir</button>
                                <?php

                                //Añade el numero de referencia del producto a la variable.
                                $ref = "ref" . $note['id_articulo'];

                                ?>

                                <!-- Obtiene los valores de cada producto para enviarlos en "envia_carrito" -->
                                <input name="ref" type="hidden" id="<?php echo $ref ?>" value=<?php echo $note['id_articulo']; ?> />
                                <input name="precio" type="hidden" id="precio<?php echo $note["id_articulo"]; ?>" value=<?php echo $note['precio']; ?> />
                                <input name="titulo" type="hidden" id="titulo<?php echo $note["id_articulo"]; ?>" value=<?php echo $note['nombrearticulo']; ?> />
                                <input name="cantidad" type="hidden" id="cantidad<?php echo $note["id_articulo"]; ?>" value="1" />

                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

            <?php
            }
        } else {
            ?>
            <div class="alert alert-info mt-4">
                Actualmente no existen productos.
            </div>
        <?php
        }

        ?>

    </div>