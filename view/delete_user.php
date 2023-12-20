<!-- FICHERO QUE MUESTRA TODOS LOS PRODUCTOS -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<?php
//Obtiene el rol del usuario.
$rol = $_SESSION["session"];

//Obtiene el menú.
include_once("menu.php");

?>

<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-hover mask-custom2 shadow-0">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($dataToView["data"]) > 0) {
                    foreach ($dataToView["data"] as $note) { ?>
                        <tr>
                            <th><?php echo  nl2br($note['id']); ?></th>
                            <td><?php echo  nl2br($note['nombre']); ?></td>
                            <td><?php echo  nl2br($note['usuario']); ?></td>
                            <td><?php echo  nl2br($note['rol']); ?></td>
                            <td><button type="button" class="btn btn-outline-danger" onclick="borrarUsuario('<?php echo $note['id'] ?>')"> <img src="view/template/img/borrar.png" width="25" height="25"> </button></td>
                        </tr>
                <?php }
                } ?>

            </tbody>
        </table>
    </div>
</div>

</section>