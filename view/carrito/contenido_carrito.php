<?php session_start();


//Añade en $carrito_mio la sesión.
if (isset($_SESSION['Usuario'])) {

    $carrito_mio = $_SESSION['Usuario'];
}


//Lista del contenido del carrito, mostrándo también el total.
?>
<ul class="list-group mb-3">

    <?php

    if (isset($_SESSION['Usuario'])) {

        $total = 0;

        for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {

            if (isset($carrito_mio[$i])) {

                if ($carrito_mio[$i] != NULL) {

    ?>



                    <li class="justify-content-between px-4 m-2">

                        <div class="row">

                            <div class="col-8 p-0" style="text-align: left; color: white;">

                                <h6 class="my-0"><?php echo $carrito_mio[$i]['titulo']; ?> x <?php echo $carrito_mio[$i]['cantidad'] ?></h6>

                            </div>

                            <div class="col-4 p-0" style="text-align: right; color: white;">

                                <span class="text-white" style="text-align: right;"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']; ?> €</span>

                            </div>

                        </div>

                    </li>

    <?php

                    $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                }
            }
        }
    }

    ?>

    <li class="d-flex justify-content-between bg-secondary">

        <span style="text-align: left; color: white; font-size: 18px" class="p-2">Total (EUR)</span>

        <strong style="text-align: left; color: white;" class="p-2">
            <?php if (isset($_SESSION['carrito'])) {
                $total = 0;
                for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                    if (isset($carrito_mio[$i])) {
                        if ($carrito_mio[$i] != NULL) {
                            $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                        }
                    }
                }
            }
            if (!isset($total)) {
                $total = '0';
            } else {
                $total = $total;
            }

            $_SESSION['precioTotal'] = $total;


            echo $total; ?> €</strong>

    </li>

</ul>