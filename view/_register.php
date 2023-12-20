<!-- FORMULARIO DE REGISTRO -->
<!DOCTYPE html>
<html>

<!-- ABRE LAS ETIQUETAS NECESARIAS HTML -->

<head>
    <meta charset="utf-8">
    <title>RAULMARKET</title>
    <link rel="icon" type="image/x-icon" href="template/img/faviconRM.ico">
    <link rel="stylesheet" href="template/css/styles.css">


    <!-- Librería ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Librería Bootstrap #030333-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>



    <style>
        body {
            background-color: #030333;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 800 400'%3E%3Cdefs%3E%3CradialGradient id='a' cx='396' cy='281' r='514' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%233C415E'/%3E%3Cstop offset='1' stop-color='%23030333'/%3E%3C/radialGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='400' y1='148' x2='400' y2='333'%3E%3Cstop offset='0' stop-color='%235E040F' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%235E040F' stop-opacity='0.5'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect fill='url(%23a)' width='800' height='400'/%3E%3Cg fill-opacity='0.4'%3E%3Ccircle fill='url(%23b)' cx='267.5' cy='61' r='300'/%3E%3Ccircle fill='url(%23b)' cx='532.5' cy='61' r='300'/%3E%3Ccircle fill='url(%23b)' cx='400' cy='30' r='300'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
        }
    </style>

</head>

<body>


    <div id="secciones">
        <?php
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
        <section class="vh-100">
            <div class="container py-9 h-30 mt-3">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card-light mask-custom shadow-0" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="template/img/img-register.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body text-white">

                                        <div class="ms-3">

                                            <form action="../index.php?controller=loginController&action=crearUsuario" method="POST">
                                                <div class="w-75 ms-3">

                                                    <div class="d-flex align-items-center mb-3 pb-1">
                                                        <i class="fas fa-cubes fa-2x" style="color: #ff6219;"></i>
                                                        <div class="col-lg-2 ms-5 me-5 mb-4">
                                                            <img src="template/img/android-chrome-192x192-negro.png" width="100" height="100">
                                                        </div>
                                                        <span class="h1 fw-bold mb-0">RAULMARKET</span>

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

                                                    <p class="text-danger">¿Tienes cuenta? <a href="../index.php" class="text-white">Accede aquí</a></p>
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
        </section>

    </div>
</body>

</html>