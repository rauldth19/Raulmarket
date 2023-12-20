
<?php






if (isset($_SESSION['Usuario'])) {

    $carrito_mio = $_SESSION['Usuario'];
}






//Calcula la cantidad final del carrito.
if (isset($_SESSION['Usuario'])) {

    $total = 0;

    for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {

        if (isset($carrito_mio[$i])) {

            if ($carrito_mio[$i] != NULL) {



                $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);



                $cantidad_final += $carrito_mio[$i]['cantidad'];
            }
        }
    }
}




if (!isset($total)) {
    $total = '0';
} else {
    $total = $total;
}

//echo $cantidad_final;

?>