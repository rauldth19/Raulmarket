<?php
//--- FICHERO QUE RECIBE LAS PETICIONES DEL CONTROLADOR Y OTROS ---


//Incluye config.php(datos de la db) y db.php(conexión de la db)
require_once 'config/config.php';
require_once 'model/db.php';


//Si NO ha obtenidos datos del controller o del action, se ejecutan los de por defecto (loginController, comprobar (Ubicado en config.php)).
if (!isset($_GET["controller"])) $_GET["controller"] = constant("DEFAULT_CONTROLLER");
if (!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");


//Variable que almacena la ruta personalizada de la carpeta controller añadiendo el archivo + ".php" (loginController.php)
$controller_path = 'controller/' . $_GET["controller"] . '.php';


//Si no existe, crea una ruta por defecto (controller/ + "note" + ·php)
if (!file_exists($controller_path)) $controller_path = 'controller/' . constant("DEFAULT_CONTROLLER") . '.php';


//incluye ese fichero.
require_once $controller_path;


//Variable que almacena el nombre del controlador ("loginController") que es el mismo que la clase que vamos a instanciar.
$controllerName = $_GET["controller"];


//Instancia la clase.
$controller = new $controllerName();


//Creo un array asociativo = palabra clave ("data").
$dataToView["data"] = array();


//Si el método existe ($controller -> clase instanciada y recibe el action) hará que $dataToView["data"] (que es un array) almacena $controller que obtiene la acción.
//Ejemplo: $controller = "new note" y acción "save".
if (method_exists($controller, $_GET["action"])) $dataToView["data"] = $controller->{$_GET["action"]}();







//Carga la vistas
require_once 'view/template/header.php';

//Controlamos que sea un usuario del sistema, de lo contrario lo enviamos al login.
if (isset($_SESSION["session"])) {
    require_once 'view/' . $controller->view . '.php'; //Carga el view (pagina) del $controller + .php
} else {
    require_once 'view/login.php'; //Carga el view (pagina) del $controller + .php
}
require_once 'view/template/footer.php';
