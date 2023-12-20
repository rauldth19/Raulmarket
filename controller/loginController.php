<?php
//--- CONTROLADOR QUE MANEJA LOS DATOS DEL MODELO ---


//incluye los ficheros "model/validar.php" y model/note.php 
require_once 'model/validar.php';
require_once 'noteController.php';


class loginController
{

    public $page_title;
    public $view;
    public $noteObj;



    /*
    -CONSTRUCTOR
    Vista: login.
    Página sin título.
    Crea un objeto new Validar().
    */
    public function __construct()
    {
        $this->view = 'login';
        $this->page_title = '';
        $this->noteObj = new Validar();
    }



    /*
    -FUNCIÓN LOGIN
    Título de página: RAULMARKET - LOGIN
    Dirige a la vista "login".
    */
    public function login()
    {
        if (isset($session)) {
            session_destroy();
        }
        $this->page_title = 'LOGIN';
        return $this->view = 'login';
    }



    /*
    -FUNCIÓN COMPROBAR
    Título de página: RAULMARKET - LOGIN
    Comprueba que los datos han sido introducidos y de ser así nos dirige a la página principal que muestra los productos.
    De lo contrariom muestra un mensaje.
    */
    public function comprobar()
    {


        $this->page_title = 'LOGIN';
        $result = $this->noteObj->validarUsuario($_POST["usu"], $_POST["pass"]);

        //Obtiene si ha encontrado coincidencia con el usuario introducido ($aprobado) y el rol de ese usuario ($rol).
        $aprobado = $result[0];
        $rol = $result[1];


        if ($aprobado == "aprobado") {

            session_start();
            $_SESSION["session"] = $rol;

            $this->page_title = 'RAULMARKET - HOME';
            $this->noteObj = new Note();
            $this->view = 'home';
            return $this->noteObj->getNotes();
        } else {
            $_GET["response"] = false;
            return $aprobado;
        }
    }



    /*
    -FUNCIÓN REGISTRO
    Título de página: RAULMARKET - REGISTER
    Dirige a la vista "register".
    */
    public function register()
    {
        session_start();
        $this->page_title = 'REGISTRO';
        return $this->view = 'register';
    }


    /*
    -FUNCIÓN REGISTRO2
    Título de página: RAULMARKET - REGISTER
    Dirige a la vista "register".
    */
    public function register2()
    {
        session_start();
        $this->page_title = 'RAULMARKET - REGISTRO';
        return $this->view = 'register2';
    }



    /*
    -FUNCIÓN CREAR USUARIO
    Título de página: RAULMARKET - REGISTER
    Ejecuta la función que añade los usuarios a la base de datos.
    Si todo ha ido bien mostrará un mensaje en específico.
    De lo contrario mostrará otro.
    */
    public function crearUsuario()
    {
        $this->page_title = 'REGISTRO';
        $this->view = 'login';
        $result = $this->noteObj->crearUsuario($_POST["nom"], $_POST["usu"], $_POST["pass"]);
        if ($result == true) {
            $_GET["response"] = true;
            return $result;
        } else {
            $_GET["response"] = false;
            return $result;
        }
    }




    public function crearUsuario2()
    {

        session_start();
        $this->page_title = 'RAULMARKET - AGREGAR USUARIO';
        $this->view = 'register2';
        $result = $this->noteObj->crearUsuario2($_POST["rol"], $_POST["nom"], $_POST["usu"], $_POST["pass"]);
        if ($result == true) {
            $_GET["response"] = true;
            return $result;
        } else {
            $_GET["response"] = false;
            return $result;
        }
    }


    /*
    -FUNCIÓN LISTA
    Título de página: RAULMARKET - PRODUCTOS
    Devuelve un new Note() con la función "getNotes()" que muestra todos los productos.
    */
    public function listUsuarios()
    {
        session_start();
        $this->page_title = 'RAULMARKET - ELIMINAR USUARIO';
        $this->view = 'delete_user';
        return $this->noteObj->getUsuarios();
    }


    public function delete()
    {

        session_start();
        return $this->noteObj->deleteUserById($_POST["id"]);
    }
}
