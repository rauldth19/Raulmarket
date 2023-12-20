<?php
//Obtiene el modal para crear productos.
include_once("modal_crear.php");

?>

<div id="divPC">
    <nav class="navbar navbar-expand-lg navbar-expand-sm navbar-light mask-custom shadow-0 d-flex" id="menu" style="z-index: 1;">
        <div class="container">
            <a class="navbar-brand" href="index.php?controller=noteController&action=home"><span style="color: #E74949;"><?php echo $controller->page_title; ?></span></a>

            <?php


            // -- Menu del usuario --
            if ($rol == "Usuario") { ?>
                <div class="home collapse navbar-collapse align-self-center d-flex justify-content-lg-end " id="navbarSupportedContent">
                    <li class="nav-item me-2">
                        <a href=" index.php?controller=noteController&action=home" class="btn btn-outline-info btn-sm btn-block"><img src="view/template/img/icono-de-inicio.png" width="30" height="30"></a>
                    </li>

                    <li class="nav-item me-2">
                        <a href="index.php?controller=loginController&action=login" class="btn btn-outline-danger btn-sm btn-block ms-2"><img src="view/template/img/cerrar-sesion.png" width="30" height="30"></a>
                    </li>


                    <li class="nav-item">
                        <button type="button" class="btn btn-outline-warning ms-2" onclick="ocultar_cart()"><img src="view/template/img/carrito-de-compras.png" width="25" height="25"></button>
                    </li>



                    <!--
                    <li class="nav-item">

                        <div class="carrito">
                            <div class="modal-content">
                                <div class="modal-header rounded" style="background-color: #17a2b8; cursor: pointer; height: 40px;" onclick="ocultar_cart()">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12" style="text-align: center;">
                                                <h5 class="modal-title text-black" style="margin-left: 20px;" id="exampleModelLabel">
                                                    Cesta&nbsp;&nbsp;
                                                    <img src="view/template/img/carrito-de-compras.png" width="25" height="25">
                                                    <span id="count_carrito" style="color: black; font-weight:bold; margin-left: 7px;"></span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="mi_cart" class="bg-white rounded mt-2" style="display: none">
                                    <div class="modal-body">
                                        <div id="mi_carrito">

                                        </div>
                                    </div>
                                    <!-- Continuación del modal --><!--
                                    <div class="modal-footer">
                                        <div class="container">
                                            <div class="row mb-2">
                                                <div class="col-6 p-0" style="text-align: center; color: #000000;">
                                                    <a type="button" class="btn btn-outline-danger" onclick="borrar_carrito(); setTimeout(function() {count_carrito(); }, 500);"><img src="view/template/img/carro-vacio.png" width="25" height="25"></a>
                                                </div>
                                                <div class="col-6 p-0" style="text-align: center; color: #000000;">
                                                    <a href="index.php?controller=noteController&action=pagar" class="btn btn-outline-info"><img src="view/template/img/pagar.png" width="25" height="25"> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> -->
                </div>
            <?php
            }
            ?>


            <?php

            // -- Menu del administrador --
            if ($rol == "Administrador") { ?>
                <div class="home collapse navbar-collapse align-self-center d-flex justify-content-lg-end" id="navbarSupportedContent">
                    <li class="nav-item me-2">
                        <a href=" index.php?controller=noteController&action=home" class="btn btn-outline-info btn-sm btn-block"><img src="view/template/img/icono-de-inicio.png" width="30" height="30"></a>
                    </li>

                    <li class="nav-item me-2">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 bd-highlight">
                                <!-- Botón 1 -->
                                <button type="button" class="btn btn-outline-dark btn-sm btn-block" data-toggle="modal" data-target="#ventana-modal"><img src="view/template/img/agregar-producto.png" width="30" height="30"></button>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item me-3">
                        <a href="index.php?controller=loginController&action=register2" class="btn btn-outline-dark btn-sm btn-block"><img src="view/template/img/agregar-usuario.png" width="30" height="30"></a>
                    </li>

                    <li class="nav-item me-3">
                        <a href="index.php?controller=loginController&action=listUsuarios" class="btn btn-outline-dark btn-sm btn-block"><img src="view/template/img/borrar-usuario.png" width="30" height="30"></a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?controller=loginController&action=login" class="btn btn-outline-danger btn-sm btn-block ms-2"><img src="view/template/img/cerrar-sesion.png" width="30" height="30"></a>
                    </li>
                </div>
            <?php
            }
            ?>

        </div>
    </nav>
</div>


<!-- MENÚ VERSIÓN MOVIL -->
<div id="divMovil">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light mask-custom shadow-0 d-flex" style="z-index: 1;">

            <div class="col-2">
                <button class="navbar-toggler ms-4 text-danger" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="col text-center ms-3">
                <img src="view/template/img/favicon-RM.png" width="30" height="30">
                <span class="text-white text-sm">RAULMARKET</span>
            </div>


            <?php

            //-- MENU DEL ADMINISTRADOR --
            if ($rol == "Administrador") { ?>

                <div class="collapse navbar-collapse mt-3" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item ms-4 mb-2">
                            <a href="index.php?controller=noteController&action=home" class="text-decoration-none text-white"><img src="view/template/img/icono-de-inicio.png" class="me-2" width="20" height="20">Home</a>
                        </li>
                        <li class="nav-item ms-4 mb-2 cursor-pointer">
                            <a data-toggle="modal" data-target="#ventana-modal" class="text-decoration-none text-white "><img src="view/template/img/agregar-producto.png" class="me-2" width="20" height="20">Agregar producto</a>
                        </li>
                        <li class="nav-item ms-4 mb-2">
                            <a href="index.php?controller=loginController&action=register2" class="text-decoration-none text-white"><img src="view/template/img/agregar-usuario.png" class="me-2" width="20" height="20">Agregar usuario</a>
                        </li>
                        <li class="nav-item ms-4 mb-2">
                            <a href="index.php?controller=loginController&action=listUsuarios" class="text-decoration-none text-white"><img src="view/template/img/borrar-usuario.png" class="me-2" width="20" height="20">Eliminar usuario</a>
                        </li>
                        <li class="nav-item ms-4 mb-2">
                            <a href="index.php?controller=loginController&action=login" class="text-decoration-none text-white"><img src="view/template/img/cerrar-sesion.png" class="me-2" width="20" height="20">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>

            <?php } ?>

            <?php

            //-- MENU DEL USUARIO --
            if ($rol == "Usuario") { ?>

                <div class="collapse navbar-collapse mt-3" id="navbarNav">


                    <ul class="navbar-nav">
                        <li class="nav-item ms-4 mb-2">
                            <a href="index.php?controller=noteController&action=home" class="text-decoration-none text-white"><img src="view/template/img/icono-de-inicio.png" class="me-2" width="20" height="20">Home</a>
                        </li>
                        <li class="nav-item ms-4 mb-2">
                            <a href="index.php?controller=loginController&action=login" class="text-decoration-none text-white"><img src="view/template/img/cerrar-sesion.png" class="me-2" width="20" height="20">Cerrar sesión</a>
                        </li>
                        <li class="nav-item ms-4 mb-2">
                            <a class="text-decoration-none text-white" onclick="ocultar_cart()"><img src="view/template/img/carrito-de-compras.png" class="me-2" width="20" height="20">Carrito</a>
                        </li>

                    </ul>
                </div>

            <?php } ?>
        </nav>

    </div>
</div>




<!-- CARRITO DE COMPRAS -->
<div class="container">
    <div class="position-absolute" id="carrito">
        <div id="mi_cart" class="bg-dark rounded mt-2 me-3" style="display: none;">
            <div class="modal-body">
                <h4 class="d-flex justify-content-center text-white p-2 bg-secondary">Mi Carrito</h4>
                <div id="mi_carrito">

                </div>
            </div>

            <div class="modal-footer">
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-6 p-0" style="text-align: center; color: #000000;">
                            <a type="button" class="btn btn-danger" onclick="borrar_carrito(); setTimeout(function() {count_carrito(); }, 500);"><img src="view/template/img/carro-vacio.png" width="25" height="25"></a>
                        </div>
                        <div class="col-6 p-0" style="text-align: center; color: #000000;">
                            <a href="index.php?controller=noteController&action=pagar" class="btn btn-info"><img src="view/template/img/pagar.png" width="25" height="25"> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>