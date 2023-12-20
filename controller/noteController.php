<?php
//--- CONTROLADOR QUE MANEJA LOS DATOS DEL MODELO ---


//incluye el fichero model/note.php 
require_once 'model/note.php';

class noteController
{
    public $page_title;
    public $view;
    public $noteObj;



    /*
    -CONSTRUCTOR
    Vista: list_note (Muestra los productos).
    Página sin título.
    Crea un objeto new Note().
    */
    public function __construct()
    {
        $this->view = 'home';
        $this->page_title = '';
        $this->noteObj = new Note();
    }


    /*
    -FUNCIÓN HOME
    Título de página: RAULMARKET - PRODUCTOS
    Devuelve un new Note() con la función "getNotes()" que muestra todos los productos.
    */
    public function home()
    {
        session_start();
        $this->view = 'home';
        $this->page_title = 'RAULMARKET - HOME';
    }



    /*
    -FUNCIÓN LISTA
    Título de página: RAULMARKET - PRODUCTOS
    Devuelve un new Note() con la función "getNotes()" que muestra todos los productos.
    */
    public function list()
    {
        session_start();
        $this->page_title = 'RAULMARKET - HOME';
        return $this->noteObj->getNotes();
    }





    /*
    -FUNCIÓN LISTSECCION
    Título de página: RAULMARKET + el tipo de seccion.
    Devuelve un new Note() con la función "getSeccion()" que muestra todos los productos con esa sección.
    */
    public function listSeccion($seccion = null)
    {
        if (isset($_GET["seccion"])) $seccion = $_GET["seccion"];

        if ($seccion == 1) {
            $tipo = "ALIMENTACIÓN";
        } else if ($seccion == 2) {
            $tipo = "MODA";
        } else if ($seccion == 3) {
            $tipo = "FERRETERÍA";
        } else if ($seccion == 4) {
            $tipo = "VEHÍCULOS";
        }

        $this->page_title = 'RAULMARKET - ' . $tipo;
        $this->view = 'list_note';
        session_start();
        return $this->noteObj->getSeccion($seccion);
    }




    /*
    - FUNCIÓN NUEVO
    Envía los datos necesarios para crear el producto a la función "agregar" de "note.php".
    Devuelve la lista de productos.
    */
    public function nuevo()
    {
        session_start();
        $this->noteObj->agregar($_POST["nombre"], $_POST["seccion"], $_POST["precio"], $_POST["descripcion"]);
        return $this->noteObj->getNotes();
    }



    /*
    -FUNCIÓN EDITAR
    Título de página: Editar producto.
    Muestra la vista "edit_note", formulario para editar productos.
    Obtiene el id_articulo y lo envía a "getNoteById()" en el objeto "new Note()".
    */
    public function edit($id_articulo = null)
    {
        session_start();
        $this->page_title = 'Editar producto';
        $this->view = 'edit_note';
        if (isset($_GET["id_articulo"])) $id_articulo = $_GET["id_articulo"];
        return $this->noteObj->getNoteById($id_articulo);
    }



    /*
    -FUNCION GUARDAR
    Muestra la vista "edit_note".
    Título de la página: Editar producto.
    $id_articulo recoge el $_POST de la función save() en el objeto "new Note()".
    $result obtiene los datos de ese id_articulo.
    El "response" del GET será true;
    Devuelve $result
    */
    public function save()
    {
        session_start();
        $this->view = 'edit_note';
        $this->page_title = 'Producto guardado';
        $id_articulo = $this->noteObj->save($_POST);
        $result = $this->noteObj->getNoteById($id_articulo);
        $_GET["response"] = true;
        return $result;
    }


    /*
    -FUNCIÓN BORRAR 
    */
    public function delete()
    {
        session_start();
        return $this->noteObj->deleteNoteById($_POST["id"]);
    }




    public function pagar($total = null)
    {
        session_start();
        $this->page_title = 'RAULMARKET - PAGO';
        $this->view = 'pagar';
    }






    //----- FUNCIONES ANTIGUAS -----


    /*
    -FUNCIÓN CREAR PÁGINA
    Título de la página: Añadir producto.
    Devuelve la vista a "create_note".

    public function createPage()
    {
        $this->page_title = "Añadir producto";
        return $this->view = "create_note";
    }



    
    -FUNCIÓN CREAR
    Muestra la vista "create_note".
    Título de la página: Añadir producto.
    Almacena en $result el resultado de "createNote" al que hemos enviado los datos necesarios.
    El "response" del GET será true;
    Devuelve $result
    
    public function create()
    {
        $this->view = 'create_note';
        $this->page_title = "Añadir producto";
        $result = $this->noteObj->createNote($_POST["nombrearticulo"], $_POST["seccion"], $_POST["precio"], $_POST["descripcion"]);
        $_GET["response"] = true;
        return $result;
    }


    public function create2()
    {
        $this->view = 'list_note';
        $result = $this->noteObj->createNote($_POST["nombrearticulo"], $_POST["seccion"], $_POST["precio"], $_POST["descripcion"]);
        $this->page_title = 'RAULMARKET - PRODUCTOS';
        $this->noteObj = new Note();
        $this->view = 'list_note';
        return $this->noteObj->getNotes();
    }*/

    /*
    -FUNCIÓN BORRAR 
    Título de la página: RAULMARKET - PRODUCTOS
    Muestra la vista "delete_note".
    Envía el id_articulo a deleteNoteById del objeto "new Note()".
    *//*
    public function delete()
    {
        $this->page_title = 'RAULMARKET - PRODUCTOS';
        $this->view = 'delete_note';
        return $this->noteObj->deleteNoteById($_GET["id_articulo"]);
    }*/
}
