<?php

//Obtiene el rol del usuario.
$rol = $_SESSION["session"];


//Obtiene el menú.
include_once("menu.php");



// FORMULARIO DE REGISTRO 

/*
- NOTIFICACIÓN
Alerta que sólo se muestra cuando la respuesta es:
false: Hay datos erróneos.
true: La insercción del usuario ha ido bien.
*/
if (isset($_GET["response"]) and $_GET["response"] === false) {
?>
    <div class="d-flex justify-content-center mt-3">
        <div class="alert alert-danger w-50 d-flex justify-content-center">
            <?php
            echo "Datos erróneos.";
            ?>
        </div>
    </div>
<?php
} else if (isset($_GET["response"]) and $_GET["response"] === true) {
?>
    <div class="d-flex justify-content-center mt-3">
        <div class="alert alert-success w-50 d-flex justify-content-center">
            <?php
            echo "Usuario registrado correctamente.";
            ?>
        </div>
    </div>
<?php
}
?>



<!--
    - FORMULARIO
    Muestra un formulario con el usuario a crear.
    Envía los datos del usuario a "crearUsuario" ubicado en "loginController".
-->
<div id="divPC">
    <div class="container py-9 h-30 mt-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10 ">
                <div class="card-light mask-custom shadow-0" style=" border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="view/template/img/img-register2-negro.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body text-white">

                                <div class="ms-3 w-75">

                                    <form action="index.php?controller=loginController&action=crearUsuario2" method="POST">

                                        <div class="d-flex align-items-center mb-2 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <div class="col-lg-2 me-4 mb-4 mt-3">
                                                <img src="view/template/img/android-chrome-192x192-negro.png" width="80" height="80">
                                            </div>
                                            <span class="titulo-app h1 fw-bold mb-0 text-white">RAULMARKET</span>
                                        </div>

                                        <h5 class="fw-normal mb-1 pb-3" style="letter-spacing: 1px;">Registra una nueva cuenta</h5>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="form2Example27">Nombre</label>
                                            <input type="text" id="nom" name="nom" name="pass" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="form2Example17">Usuario</label>
                                            <input type="text" id="usu" name="usu" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="form2Example17">Rol</label>
                                            <select class="form-select" id="rol" name="rol">
                                                <option selected>Seleccione el rol</option>
                                                <option value="Administrador">Administrador</option>
                                                <option value="Usuario">Usuario</option>
                                            </select>
                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="form2Example27">Contraseña</label>
                                            <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-group mb-4"">
                                            <button class=" btn btn-success w-100" type="submit">Registrar</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>