<?php
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {
    die();
}

//TODO: controlador de proveedores

require_once('../models/clientes.model.php');
//error_reporting(0);
$clientes = new Clientes;

switch ($_GET["op"]) {
        //TODO: operaciones de proveedores

    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los proveedores
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase proveedores.model.php
        $datos = $clientes->todos(); // Llamo al metodo todos de la clase proveedores.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $idClientes = $_POST["idClientes"];

        $datos = array();
        $datos = $clientes->uno($idClientes);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para encontrar un proveedor en la base de datos
    case 'insertar':
        $nombres = $_POST["nombres"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $cedula = $_POST["cedula"];
        $correo = $_POST["correo"];

        $datos = array();
        $datos = $clientes->insertar($nombres, $direccion, $telefono, $cedula, $correo);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualizar un proveedor en la base de datos
    case 'actualizar':
        $idClientes = $_POST["idClientes"];
        $nombres = $_POST["nombres"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $cedula = $_POST["cedula"];
        $correo = $_POST["correo"];
        $datos = array();
        $datos = $clientes->actualizar($idClientes, $nombres, $direccion, $telefono, $cedula, $correo);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un proveedor en la base de datos
    case 'eliminar':
        $idProductos = $_POST["idClientes"];
        $datos = array();
        $datos = $clientes->eliminar($idProductos);
        echo json_encode($datos);
        break;
}
