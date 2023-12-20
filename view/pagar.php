<?php
//Obtiene el rol del usuario.
$rol = $_SESSION["session"];

$total = $_SESSION['precioTotal'];



//Obtiene el menú.

include_once("menu.php");
?>

<!-- Enlace que inserta el script de PayPal -->
<script src="https://www.paypal.com/sdk/js?client-id=AYJWx7jCvbBGUA4B9DShmLwhOh4NVnj1sgDTlAU8Llkfdg2rWrGdp1TPSCZzRjp2lt727CDFmLicsOLU&currency=EUR"></script>

<script src="view/template/js/app.js"></script>

<body>

    <div class="d-flex justify-content-center align-items-center text-center text-white m-5">
        <div id="aviso" class="justify-content-center align-items-center rounded w-50 p-3"></div>
    </div>

    <div class="container d-flex justify-content-center" id="container-pago">
        <div class="col-sm-6 d-flex justify-content-end">
            <img src="view/template/img/pagando.jpg" alt="pagando" class="imagen-crear border-bottom border-danger" style="border-radius: 1rem 0 0 1rem;" width="400" height="500" />
        </div>
        <div class="col-sm-6 d-flex justify-content-start">
            <div class="tarjeta-pago card-light mask-custom shadow-0 border-bottom border-danger justify-content-center align-items-center p-5">
                <div id="paypal-button-conteiner">
                    <h4 class="text-center text-white mb-5 pb-3">Seleccione el método de pago</h4>
                </div>
                <div class="mt-4">
                    <h3 class="fixed-bottom text-center text-white m-5" id="precioTotal"><?php echo 'Total: ' . $total . " €" ?></h3>
                </div>
            </div>
        </div>
    </div>





    <script>
        //Pasa el valor del precio de php a javascript
        var precioTotal = "<?php echo $total ?>";

        paypal.Buttons({
            //Estilo de los botones de paypal.
            style: {
                color: 'blue',
                label: 'pay',
                shape: 'pill'
            },


            //Función que se ejecuta para crear el pedido
            createOrder: function(dara, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            //Valor del pedido
                            value: precioTotal
                        }
                    }]
                });
            },


            //Función que se ejecuta cuando se ha realizado el pedido
            onApprove: function(data, actions) {
                actions.order.capture().then(function(detalles) {

                    var miElemento = document.getElementById('aviso');
                    miElemento.style.backgroundColor = "#5cb85c";
                    miElemento.innerHTML = '<h3>Pago Realizado con éxito</h3>';
                });
            },


            //Función que se ejecuta si se cancela el pedido
            onCancel: function(data) {

                var miElemento = document.getElementById('aviso');
                miElemento.style.backgroundColor = "#d9534f";
                miElemento.innerHTML = '<h3>Pago cancelado</h3>';
            }

        }).render('#paypal-button-conteiner');
    </script>

</body>