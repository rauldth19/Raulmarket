<!-- FORMULARIO DE LOGIN -->
<script src="view/template/js/app.js"></script>
<?php
/*
- NOTIFICACIÓN
Alerta que sólo se muestra cuando al obtener "response" sea "false" indicando que algo ha salido mal.
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
            echo "Cuenta creada correctamente.";
            ?>
        </div>
    </div>
<?php
}
?>

<!--
    - FORMULARIO
    Muestra un formulario con el usuario a insertar.
    Envía los datos del usuario a "comprobar" ubicado en "loginController".
-->
<div id="divPC">
    <section class="vh-100 ">
        <div class="container py-9 h-30 mt-3">

            <!-- INICIO DE SESIÓN -->
            <div id="myDIV">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card-light mask-custom shadow-0" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="view/template/img/img-login.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body text-white">

                                        <div class="ms-3">
                                            <div class="w-75 ms-3">


                                                <form action="index.php?controller=loginController&action=comprobar" method="POST">

                                                    <div class="d-flex align-items-center mb-3 pb-1">
                                                        <i class="fas fa-cubes fa-2x" style="color: #ff6219;"></i>
                                                        <div class="col-lg-2 ms-5 me-5 mb-4">
                                                            <img src="view/template/img/favicon-RM.png" width="100" height="100">
                                                        </div>
                                                        <span class="titulo-app h1 fw-bold mb-0">RAULMARKET</span>

                                                    </div>

                                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Entra en tu cuenta</h5>

                                                    <div class="form-outline mb-4">
                                                        <label class="form-label" for="form2Example17">Usuario</label>
                                                        <input type="text" id="usu" name="usu" class="form-control form-control-lg" />
                                                    </div>

                                                    <div class="form-outline mb-4">
                                                        <label class="form-label" for="form2Example27">Contraseña</label>
                                                        <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                                                    </div>

                                                    <div class="pt-1 mb-4">
                                                        <button class="btn btn-danger btn-lg btn-block" type="submit">Acceder</button>
                                                    </div>

                                                </form>

                                                <p class="mt-5 text-danger">¿No tienes cuenta? <a style="cursor: pointer" class="text-white text-decoration-none" onclick="ocultar()">Regístrate aquí</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- REGISTRO -->
            <div class="container py-9 h-30 mt-3" id="myDIV2" style="display: none">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card-light mask-custom shadow-0" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="view/template/img/img-register.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body text-white">

                                        <div class="ms-3">
                                            <div class="w-75 ms-3">

                                                <form action="index.php?controller=loginController&action=crearUsuario" method="POST">


                                                    <div class="d-flex align-items-center mb-2 pb-1 mt-3">
                                                        <i class="fas fa-cubes fa-2x" style="color: #ff6219;"></i>
                                                        <div class="col-lg-2 ms-5 me-5 mb-4">
                                                            <img src="view/template/img/favicon-RM.png" width="100" height="100">
                                                        </div>
                                                        <span class="titulo-app h1 fw-bold mb-0">RAULMARKET</span>

                                                    </div>

                                                    <h5 class="fw-normal mb-1 pb-3" style="letter-spacing: 1px;">Registra tu cuenta</h5>

                                                    <div class="form-outline mb-3">
                                                        <label class="form-label" for="form2Example27">Nombre</label>
                                                        <input type="text" id="nom" name="nom" name="pass" class="form-control form-control-lg" />
                                                    </div>

                                                    <div class="form-outline mb-3">
                                                        <label class="form-label" for="form2Example17">Usuario</label>
                                                        <input type="text" id="usu" name="usu" class="form-control form-control-lg" />
                                                    </div>

                                                    <div class="form-outline mb-3">
                                                        <label class="form-label" for="form2Example27">Contraseña</label>
                                                        <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                                                    </div>

                                                    <div class="pt-1 mb-5">
                                                        <button class="btn btn-danger btn-lg btn-block" type="submit">Registrarme</button>
                                                    </div>

                                                    </p>

                                                </form>
                                                <p class="text-danger">¿Tienes cuenta? <a style="cursor: pointer" class="text-white text-decoration-none" onclick="ocultar()">Accede aquí</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>


<!-- FORMULARIO VERSIÓN MOVIL -->

<!-- LOGIN -->
<div id="divMovil">
    <div id="myDIVMOVIL" style="display: block">
        <form class="text-white m-3 mt-5" action="index.php?controller=loginController&action=comprobar" method="POST">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-lg-2 mb-3 me-3">
                    <img src="view/template/img/favicon-RM.png" width="100" height="100">
                </div>
                <span class="titulo-app h1 fw-bold me-2">RAULMARKET</span>

            </div>
            <div class="form-group mb-4 mt-4">
                <label for="exampleInputEmail1">Usuario</label>
                <input type="text" class="form-control" id="usu" name="usu" placeholder="Introduzca usuario">
            </div>
            <div class="form-group mb-4">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Introduzca contraseña">
            </div>

            <div class="form-group mb-4"">
            <button class=" btn btn-danger w-100" type="submit">Acceder</button>
            </div>
            <div class="fixed-bottom w-100 d-flex justify-content-center align-items-center">
                <p class="mt-5 text-danger">¿No tienes cuenta? <a style="cursor: pointer" class="text-white text-decoration-none" onclick="ocultar2()">Regístrate aquí</a>
            </div>
        </form>
    </div>



    <!-- REGISTRO -->
    <div id="myDIV2MOVIL" style="display: none">
        <form class="text-white m-3 mt-5" action="index.php?controller=loginController&action=crearUsuario" method="POST">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-lg-2 mb-3 me-3">
                    <img src="view/template/img/favicon-RM.png" width="100" height="100">
                </div>
                <span class="titulo-app h1 fw-bold me-2">RAULMARKET</span>

            </div>
            <div class="form-group mb-4 mt-4">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Introduzca nombre">
            </div>
            <div class="form-group mb-4 mt-4">
                <label for="exampleInputEmail1">Usuario</label>
                <input type="text" class="form-control" id="usu" name="usu" placeholder="Introduzca usuario">
            </div>
            <div class="form-group mb-4">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Introduzca contraseña">
            </div>

            <div class="form-group mb-4"">
            <button class=" btn btn-danger w-100" type="submit">Registrarse</button>
            </div>
            <div class="fixed-bottom w-100 d-flex justify-content-center align-items-center">
                <p class="text-danger">¿Tienes cuenta? <a style="cursor: pointer" class="text-white text-decoration-none" onclick="ocultar2()">Accede aquí</a>
            </div>
        </form>
    </div>
</div>