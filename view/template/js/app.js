//ARCHIVO QUE REALIZA LAS FUNCIONES JS UTILIZANDO AJAX

/*
- FUNCION QUE ENVÍA DATOS DEL FORMULARIO A LA DB.
Obtiene los datos por id y los almacena en sus respectivas variables.
Con ajax ejecutamoms la acción "nuevo" en "noteController" y enviamos esas variables.
Si todo ha ido bien, inicializamos esos datos en blanco y mostramos un mensaje informativo.
*/
$('#enviar').click(function () {

    var nombre = document.getElementById('nombreArticulo').value;
    var seccion = document.getElementById('seccion').value;
    var precio = document.getElementById('precio').value;
    var descripcion = document.getElementById('descripcion').value;


    $.ajax({

        url: 'index.php?controller=noteController&action=nuevo',
        type: "POST",
        data: {
            'nombre': nombre,
            'seccion': seccion,
            'precio': precio,
            'descripcion': descripcion,
        },


        success: function (res) {
            $('#nombreArticulo').val("");
            $('#seccion').val("");
            $('#precio').val("");
            $('#descripcion').val("");
            $('#respuesta').html("<div class='alert alert-success'>Producto añadido correctamente</div>");
        },

        error: function (jqXHR, textStatus, errorThrown) {
            console.log('error::' + errorThrown);
        }
    })
})





/*
/*
-FUNCIÓN QUE ACTUALIZA LOS DATOS
La url obtenida es la ejecución de la función "list" de "noteController".
Si todo ha ido bien, el div inicial (secciones) lo limpiará, añadira el nuevo contenido y ejecutaría la función que elimina el modal.
*/
function actualizarDatos() {

    $.ajax({

        url: 'index.php?controller=noteController&action=home',

        success: function (respuesta) {
            $("#secciones").html("");
            $("#secciones").html(respuesta);
            eliminarModal();
        },
        error: function (request, error) {
            alertify.success(error);
        }
    });
};




/*
/*
-FUNCIÓN QUE ACTUALIZA LOS DATOS Y MANTIENE AL USUARIOA EN LA SECCIÓN
La url obtenida es la ejecución de la función "listSeccion" de "noteController" con la sección donde está ubicada el usuario.
Si todo ha ido bien, el div inicial (secciones) lo limpiará, añadira el nuevo contenido y ejecutaría la función que elimina el modal.
*/
function actualizarDatosSeccion($seccion) {


    $.ajax({
        url: 'index.php?controller=noteController&action=listSeccion&seccion=' + $seccion,

        success: function (respuesta) {
            $("#secciones").html("");
            $("#secciones").html(respuesta);
            eliminarModal();
        },
        error: function (request, error) {
            alertify.success(error);
        }
    });
};



/*
- FUNCION QUE BORRA LOS DATOS
Ejecuta la función "delete" del controlador "noteController" enviando el "id" de ese producto.
Si todo ha ido bien, ejecutará "actualizarDatos()" que actualizara la lista de productos en tiempo real manteniendo al usuario en la sección establecida.
*/
function borrarDatos(id, $seccion) {


    $.ajax({


        url: 'index.php?controller=noteController&action=delete',
        type: "POST",
        data: { id },

        success: function () {

            //Comprueba si el usuario está ubicado en alguna sección, de ser así lo mantiene en ella ejecutando "actualizarDatosSeccion".
            if ($seccion == "1" || $seccion == "2" || $seccion == "3" || $seccion == "4") {
                actualizarDatosSeccion($seccion);
            }

            //De lo contrario ejecuta "actualizarDatos", donde nos redirige a la pantalla principal.
            else {
                actualizarDatos();
            }
        },

        error: function (request, error) {
            alertify.success(error);
        }
    });
};



/*
-FUNCION QUE ELIMINA EL MODAL
Con esto conseguimos eliminar completamente el modal.
*/
function eliminarModal() {

    $("#ventana-modal").removeClass("in");
    $(".modal-backdrop").remove();
    $("#ventana-modal").hide();
    mostrarOcultarDiv2();
}



/*
-FUNCIÓN QUE OCULTA Y MUESTRA EL MODAL DEL CARRO
*/
function ocultar_cart() {
    if (document.getElementById('mi_cart').style.display == '') {
        document.getElementById('mi_cart').style.display = 'none';
    }
    else {
        document.getElementById('mi_cart').style.display = '';
    }
}


/*
-FUNCIÓN QUE ENVÍA LOS DATOS DEL PRODUCTO AL CARRITO.
*/
function envia_carrito(ref, titulo, precio, cantidad) {

    var parametros = { "ref": ref, "titulo": titulo, "precio": precio, "cantidad": cantidad };
    $.ajax({
        data: parametros,
        url: 'view/carrito/cart.php',
        type: 'POST',

        beforeSend: function () {

        },
        success: function (response) {

        },
        error: function (response, error) {

        }

    });
}


/*
-FUNCIÓN QUE REALIZA UNA CONSULTA AL CONTENIDO DEL CARRITO Y LO MUESTRA.
*/
function consultar_carrito() {
    var parametros = {};
    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'view/carrito/contenido_carrito.php',
        success: function (data) {
            document.getElementById("mi_carrito").innerHTML = data;
        }
    });
}



/*
-FUNCIÓN QUE CUENTA EL NÚMERO DE ARTÍCULOS QUE TIENE UN CARRITO.
*/
function count_carrito() {
    var parametros = {};
    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'view/carrito/count_carrito.php',
        success: function (data) {
            document.getElementById("count_carrito").innerHTML = data;
        }
    });
}


/*
-FUNCIÓN QUE BORRA TODOS LOS ARTÍCULOS ALMACENADOS EN EL CARRITO.
*/
function borrar_carrito() {
    var parametros = {};
    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'view/carrito/borrarcarro.php',
        success: function (data) {
            consultar_carrito();
        }
    });
}


setTimeout(function () {
    consultar_carrito();
    count_carrito();
}, 500);



/*
- FUNCION QUE BORRA LOS DATOS
Ejecuta la función "delete" del controlador "noteController" enviando el "id" de ese producto.
Si todo ha ido bien, ejecutará "actualizarDatos()" que actualizara la lista de productos en tiempo real manteniendo al usuario en la sección establecida.
*/
function borrarUsuario(id) {

    $.ajax({


        url: 'index.php?controller=loginController&action=delete',
        type: "POST",
        data: { id },

        success: function () {

            actualizarDatosUsuario();
        },

        error: function (request, error) {
            alertify.success(error);
        }
    });
};

function actualizarDatosUsuario() {

    $.ajax({

        url: 'index.php?controller=loginController&action=listUsuarios',

        success: function (respuesta) {
            $("#secciones").html("");
            $("#secciones").html(respuesta);
            mostrarOcultarDiv2();
        },
        error: function (request, error) {
            alertify.success(error);
        }
    });
};


function ocultar() {
    var x = document.getElementById("myDIV");
    var y = document.getElementById("myDIV2");

    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "block";
    }
}

function ocultar2() {
    var a = document.getElementById("myDIVMOVIL");
    var b = document.getElementById("myDIV2MOVIL");

    if (a.style.display === "none") {
        a.style.display = "block";
        b.style.display = "none";
    } else {
        a.style.display = "none";
        b.style.display = "block";
    }
}



// Función para verificar la dimensión de la pantalla y mostrar u ocultar el div
function mostrarOcultarDiv2() {
    if (window.innerWidth < 1000) { // Si la dimensión de la pantalla es menor a 768px
        divPC.style.display = "none"; // Oculta el div del PC
        divMovil.style.display = "block"; // Muestra el div del Movil
    } else {
        divPC.style.display = "block"; // Muestra el div del PC
        divMovil.style.display = "none"; // Oculta el div Movil
    }
}


window.onload = function () {

    // Obtiene el div version PC
    var divPC = document.getElementById("divPC");

    //Obtiene el div version Movil
    var divMovil = document.getElementById("divMovil");


    // Función para verificar la dimensión de la pantalla y mostrar u ocultar el div
    function mostrarOcultarDiv() {
        if (window.innerWidth < 1000) { // Si la dimensión de la pantalla es menor a 768px
            divPC.style.display = "none"; // Oculta el div del PC
            divMovil.style.display = "block"; // Muestra el div del Movil
        } else {
            divPC.style.display = "block"; // Muestra el div del PC
            divMovil.style.display = "none"; // Oculta el div Movil
        }
    }

    mostrarOcultarDiv(); // Llamar a la función al cargar la página

    // Llamar a la función cada vez que se redimensione la pantalla
    window.addEventListener("resize", mostrarOcultarDiv);
};


