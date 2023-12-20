<!--
- Continua la sesión 
- Si la sesión usuario y el título están declaradas, almacena en cada variable los datos enviados.
-->
<?php session_start();


if (isset($_SESSION['Usuario']) || isset($_POST['titulo'])) {

    if (isset($_SESSION['Usuario'])) {

        $carrito_mio = $_SESSION['Usuario'];

        if (isset($_POST['titulo'])) {

            $titulo = $_POST['titulo'];

            $precio = $_POST['precio'];

            $cantidad = $_POST['cantidad'];

            $ref = $_POST['ref'];




            $donde = -1;

            for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {

                //Comprueba que ref es igual a la ref de $carrito_mio y $donde almacena el numero de coincidencias.
                if ($ref == $carrito_mio[$i]['ref']) {

                    $donde = $i;
                }
            }


            //Si $donde ha encontrado coincidencias almacena la cantidad de ese producto.
            if ($donde != -1) {

                $cuanto = $carrito_mio[$donde]['cantidad'] + $cantidad;

                $carrito_mio[$donde] = array("titulo" => $titulo, "precio" => $precio, "cantidad" => $cuanto, "ref" => $ref);
            }

            //De lo contrario añade los datos predeterminados.
            else {

                $carrito_mio[] = array("titulo" => $titulo, "precio" => $precio, "cantidad" => $cantidad, "ref" => $ref);
            }
        }
    } else {

        $titulo = $_POST['titulo'];

        $precio = $_POST['precio'];

        $cantidad = $_POST['cantidad'];

        $ref = $_POST['ref'];

        $carrito_mio[] = array("titulo" => $titulo, "precio" => $precio, "cantidad" => $cantidad, "ref" => $ref);
    }



    if (isset($_POST['cantidad'])) {

        $id = $_POST['id'];

        $cuantos = $_POST['cantidad'];

        if ($cuantos < 1) {

            $carrito_mio[$id] = NULL;
        } else {

            $carrito_mio[$id]['cantidad'] = $cuantos;
        }
    }




    $_SESSION['Usuario'] = $carrito_mio;



    //todo ok



} else {



    //error

}
