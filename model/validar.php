<?php
//--- MODELO QUE VALIDA O REGISTRA LOS DATOS DEL USUARIO ---



class Validar
{

    private $conection;
    public $noteObj;
    public $page_title;
    public $view;
    private $table = 'usuarios';


    /*
    -CONSTRUCTOR VACÍO
    */
    public function __construct()
    {
    }



    /*
    -FUNCIÓN QUE OBTIENE LA CONEXIÓN
    $dbObj crea un objeto de la base de datos.
    Crea una conexión con esa base de datos.
    */
    public function getConection()
    {
        $dbObj = new Db();
        $this->conection = $dbObj->conection;
    }



    /*
    -FUNCIÓN QUE VALIDA EL USUARIO
    Obtiene el usuario y la contraseña para compararla con la base de datos.
    Si obtiene resultado nos devuelve "list_note".
    De lo contrario $result tendrá la dirección del login.
    */
    public function validarUsuario($usu, $pass)
    {

        if ($usu != "" && $pass != "") {

            // Obtiene la conexión
            $this->getConection();

            // Consulta sql en el que compara el usuario y la contraseña con todos los usuarios de la tabla usuarios
            $sql = "SELECT * FROM usuarios WHERE usuario = :USU AND pass = :PASS";

            //Prepara la ejecución (db analiza, compila y optimiza su plan para ejecutarla)
            $stmt = $this->conection->prepare($sql);

            //Encripta la contraseña
            $pass = md5($pass);

            //Ejecuta la sentencia preparada y envía a un array
            $stmt->execute(array(":USU" => $usu, ":PASS" => $pass));

            //Almacena la cantidad de resultados encontrados
            $cantidad_resultado = $stmt->rowCount();

            //Si la cantidad es 1, la sesión contiene las siguientes variables
            if ($cantidad_resultado >= 1) {







                //---- VER ROL ----------

                // Consulta sql en el que selecciona el "rol" del usuario.
                $sql2 = "SELECT rol FROM usuarios WHERE usuario = :USU";

                //Prepara la ejecución (db analiza, compila y optimiza su plan para ejecutarla)
                $stmt2 = $this->conection->prepare($sql2);

                //Ejecuta la sentencia preparada y envía a un array
                $stmt2->execute(array(":USU" => $usu));


                //Recorremos el array y almacena el rol en su variable correspondiente.
                $arrDatos = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                foreach ($arrDatos as $value) {
                    $rol =  $value['rol'];
                }


                //echo $rol;




                //session_start();
                $result = 'aprobado';
                //return $result;

                $datos = array();

                $datos[0] = $result;
                $datos[1] = $rol;

                return $datos;
            }

            //Si no, nos envía al login.
            else {
                $result = 'login.php';
            }
        }

        //Nos envía al login.
        else {
            $result = 'login.php';
        }

        return $result;
    }



    /*
    -FUNCIÓN QUE CREA EL USUARIO
    Obtiene los datos del usuario y comprueba que se han introducido.
    Los inserta en la base de datos.
    */
    public function crearUsuario($nom, $usu, $pass)
    {

        if ($nom != "" && $usu != "" && $pass != "") {

            // Obtiene la conexión
            $this->getConection();

            // Consulta sql en el que inserta el usuario en la base de datos
            $sql = "INSERT INTO usuarios (rol, nombre, usuario, pass) VALUES ('Usuario', :NOM, :USU, :PASS)";

            //Prepara la ejecución (db analiza, compila y optimiza su plan para ejecutarla)
            $stmt = $this->conection->prepare($sql);

            //Encripta la contraseña
            $pass = md5($pass);

            //Ejecuta la sentencia preparada y envía a un array
            $stmt->execute(array(":NOM" => $nom, ":USU" => $usu, ":PASS" => $pass));


            $result = T_ATTRIBUTE;
        }

        //Nos envía al login.
        else {
            $result = false;
        }

        return $result;
    }







    public function crearUsuario2($rol, $nom, $usu, $pass)
    {

        if ($rol != "" && $nom != "" && $usu != "" && $pass != "") {

            // Obtiene la conexión
            $this->getConection();

            // Consulta sql en el que inserta el usuario en la base de datos
            $sql = "INSERT INTO usuarios (rol, nombre, usuario, pass) VALUES (:ROL, :NOM, :USU, :PASS)";

            //Prepara la ejecución (db analiza, compila y optimiza su plan para ejecutarla)
            $stmt = $this->conection->prepare($sql);

            //Encripta la contraseña
            $pass = md5($pass);

            //Ejecuta la sentencia preparada y envía a un array
            $stmt->execute(array(":ROL" => $rol, ":NOM" => $nom, ":USU" => $usu, ":PASS" => $pass));


            $result = T_ATTRIBUTE;
        }

        //Nos envía al login.
        else {
            $result = false;
        }

        return $result;
    }




    /*
    -FUNCIÓN QUE OBTIENE LOS PRODUCTOS
    Ejecuta la función que conecta con la base de datos.
    Selecciona todos los productos de la tabla (articulos).
    Devuelve $stmt que contiene un array con todos los resultados.
    */
    public function getUsuarios()
    {
        $this->getConection();
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    /*
    -FUNCIÓN QUE BORRA EL PRODUCTO 
    Obtiene el id_producto y lo elimina de la base de datos.
    */
    public function deleteUserById($id)
    {
        $this->getConection();
        $sql = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$id]);
    }
}
