<!-- FICHERO QUE MUESTRA TODOS LOS PRODUCTOS -->

<?php
//Obtiene el rol del usuario.
$rol = $_SESSION["session"];


//Obtiene el menú.
include_once("menu.php");

?>
<section class="vh-100" style="z-index: 1;">
    <div class="container mt-5 pt-3">
        <div class="row m-2" data-masonry="{&quot;percentPosition&quot;: true }">
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card-light mask-custom shadow-0 rounded border-bottom border-danger" style=" width: 18rem;">
                    <img class="card-img-top rounded-top" src="view/template/img/alimentos.jpg" alt="Card image cap">
                    <div class="card-body m-3 text-white">
                        <h3 class="card-title mb-2 text-center mb-3">ALIMENTOS</h3>
                        <p class="card-text">Sección de alimentos con los que podrás llenar tu nevera de la forma más saludable.</p>
                        <div class="container">
                            <div class="row align-items-end mt-4">
                                <div class="col text-center">
                                    <div class="me-5 ms-5 mb-3">
                                        <a href="index.php?controller=noteController&action=listSeccion&seccion=1" class="btn btn-danger"><img src="view/template/img/ir.png" width="25" height="25"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card-light mask-custom shadow-0 rounded border-bottom border-danger" style="width: 18rem;">
                    <img class="card-img-top rounded-top" src="view/template/img/moda.jpg" alt="Card image cap">
                    <div class="card-body m-3 text-white">
                        <h3 class="card-title mb-3 text-center">MODA</h3>
                        <p class="card-text">Disfruta de la mejor colección de ropa deportiva, informal y formal de tus marcas preferidas.</p>
                        <div class="container">
                            <div class="row align-items-end mt-4">
                                <div class="col text-center">
                                    <div class="me-5 ms-5 mb-3">
                                        <a href="index.php?controller=noteController&action=listSeccion&seccion=2" class="btn btn-danger"><img src="view/template/img/ir.png" width="25" height="25"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card-light mask-custom shadow-0 rounded border-bottom border-danger" style="width: 18rem;">
                    <img class="card-img-top rounded-top" src="view/template/img/ferreteria.jpg" alt="Card image cap">
                    <div class="card-body m-3 text-white">
                        <h3 class="card-title text-center mb-3">FERRETERÍA</h3>
                        <p class="card-text">Distribuimos los mejores materiales del sector sirviendo a particulares y profesionales.</p>
                        <div class="container">
                            <div class="row align-items-end mt-4">
                                <div class="col text-center">
                                    <div class="me-5 ms-5 mb-3">
                                        <a href="index.php?controller=noteController&action=listSeccion&seccion=3" class="btn btn-danger"><img src="view/template/img/ir.png" width="25" height="25"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card-light mask-custom shadow-0 rounded border-bottom border-danger" style="width: 18rem;">
                    <img class="card-img-top rounded-top" src="view/template/img/vehiculos.jpg" alt="Card image cap">
                    <div class="card-body m-3 text-white">
                        <h3 class="card-title text-center mb-3">VEHÍCULOS</h3>
                        <p class="card-text">Encuentra todo lo que necesites, coches, motos, bicicletas... todo listo para satisfacerte. </p>
                        <div class="container">
                            <div class="row align-items-end mt-4">
                                <div class="col text-center">
                                    <div class="me-5 ms-5 mb-3">
                                        <a href="index.php?controller=noteController&action=listSeccion&seccion=4" class="btn btn-danger"><img src="view/template/img/ir.png" width="25" height="25"></a>
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