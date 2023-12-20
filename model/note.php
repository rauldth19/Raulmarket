<?php

//--- MODELO CON MÉTODOS QUE OPERAN CON DATOS DE LA DB ---

class Note
{
    private $table = 'articulos';
    private $conection;



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
    -FUNCIÓN QUE OBTIENE LOS PRODUCTOS
    Ejecuta la función que conecta con la base de datos.
    Selecciona todos los productos de la tabla (articulos).
    Devuelve $stmt que contiene un array con todos los resultados.
    */
    public function getNotes()
    {
        $this->getConection();
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }




    /*
    - FUNCIÓN QUE OBTIENE LOS PRODUCTOS POR SECCIÓN
    Recibe la sección seleccionada.
    Ejecuta la función que conecta con la base de datos.
    Selecciona todos los productos de la tabla (articulos) que tengan esa sección.
    Prepara la sentencia y lo ejecuta.
    Devuelve $stmt que contiene un array con todos los resultados.
    */
    public function getSeccion($seccion)
    {
        $this->getConection();
        $sql = "SELECT * FROM " . $this->table . " WHERE seccion = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$seccion]);

        return $stmt->fetchAll();
    }





    /*
    -FUNCIÓN QUE OBTIENE EL PRODUCTO POR ID
    Recibe el id_articulo.
    Comprueba que no es nulo (sino devuelve false).
    Selecciona todos los datos de la tabla (articulos) que tenga ese id.
    Prepara la sentencia y lo ejecuta.
    Devuelve $stmt que contiene una fila con los resultados obtenidos.
    */
    public function getNoteById($id_articulo)
    {
        if (is_null($id_articulo)) return false;
        $this->getConection();
        $sql = "SELECT * FROM " . $this->table . " WHERE id_articulo = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id_articulo]);

        return $stmt->fetch();
    }



    /*
    -FUNCIÓN QUE GUARDA LOS PRODUCTOS
    Comprueba que se han obtenido los productos y de ser así los inserta en la base de datos.
    */
    public function save($param)
    {
        $this->getConection();

        //Establece un valor por defecto
        $nombre = $seccion = $precio = $descripcion = $ruta = "";

        $exists = false;

        //Almacena el nombre de la imagen.
        $nombre_imagen = $_FILES['foto']['name'];

        //Almacena la ruta de la imagen.
        $temporal = $_FILES['foto']['tmp_name'];

        //Ruta donde se guardarán las imágenes subidas.
        $carpeta = 'view/template/img';

        //Ruta a la que se accederá para mostrar la imagen.
        $ruta = $carpeta . '/' . $nombre_imagen;

        move_uploaded_file($temporal, $carpeta . '/' . $nombre_imagen);




        if (isset($param["id_articulo"]) and $param["id_articulo"] != '') {
            $actualNote = $this->getNoteById($param["id_articulo"]);
            if (isset($actualNote["id_articulo"])) {
                $exists = true;

                //Valores actuales
                $id_articulo = $param["id_articulo"];
                $nombre = $actualNote["nombrearticulo"];
                $seccion = $actualNote["seccion"];
                $precio = $actualNote["precio"];
                $descripcion = $actualNote["descripcion"];
            }
        }

        //Recibe valores
        if (isset($param["nombrearticulo"])) $nombre = $param["nombrearticulo"];
        if (isset($param["seccion"])) $seccion = $param["seccion"];
        if (isset($param["precio"])) $precio = $param["precio"];
        if (isset($param["descripcion"])) $descripcion = $param["descripcion"];



        //Operaciones de la base de datos
        if ($exists) {
            $sql = "UPDATE " . $this->table . " SET nombrearticulo=?, seccion=?, precio=?, descripcion=?, imagen=? WHERE id_articulo=?";
            $stmt = $this->conection->prepare($sql);
            $res = $stmt->execute([$nombre, $seccion, $precio, $descripcion, $ruta, $id_articulo]);
        } else {
            $sql = "INSERT INTO " . $this->table . " (nombrearticulo, seccion, precio, descripcion, imagen) values(?, ?, ?, ?, ?, ?)";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([$nombre, $seccion, $precio, $descripcion, $ruta]);
            $id_articulo = $this->conection->lastInsertId();
        }
        return $id_articulo;
    }



    /*
    -FUNCIÓN QUE BORRA EL PRODUCTO 
    Obtiene el id_producto y lo elimina de la base de datos.
    */
    public function deleteNoteById($id_articulo)
    {
        $this->getConection();
        $sql = "DELETE FROM " . $this->table . " WHERE id_articulo = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$id_articulo]);
    }



    /*
    -FUNCIÓN QUE CREA LA NOTA 
    Obtiene los datos de la nota introducida y los añade a la base de datos.
    */
    public function createNote($nombrearticulo, $seccion, $precio, $descripcion)
    {
        $this->getConection();
        $sql = "INSERT INTO " . $this->table . " (nombrearticulo, seccion, precio, descripcion) values(?,?,?,?)";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$nombrearticulo, $seccion, $precio, $descripcion]);
        echo "<div class='alert alert-success'>Producto añadido correctamente</div>";
    }



    /*
    - FUNCIÓN QUE AGREGA LOS DATOS DEL PRODUCTO
    Inserta en la tabla articulos los valores insertados.
    Muestra un mensaje informativo.
    */
    public function agregar($nombre, $seccion, $precio, $descripcion)
    {
        $this->getConection();
        $sql = "INSERT INTO articulos (nombrearticulo, seccion, precio, descripcion) values(?,?,?,?)";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$nombre, $seccion, $precio, $descripcion]);

        echo "<div class='alert alert-success'>Producto añadido correctamente.</div>";
    }



    //------------------------------------------------------------




    public function getNotesCarrito()
    {
        $this->getConection();
        $sql = "SELECT * FROM carrito";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }







    public function getTotal($total)
    {
        return $this->$total;
    }
}
