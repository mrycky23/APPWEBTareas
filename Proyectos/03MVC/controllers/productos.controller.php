<?php

//TODO: controlador de proveedores

require_once('../models/productos.model.php');
//error_reporting(0);
$productos = new Productos;

switch ($_GET["op"]) {
        //TODO: operaciones de proveedores

    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los proveedores
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase proveedores.model.php
        $datos = $productos->todos(); // Llamo al metodo todos de la clase proveedores.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $idProductos = $_POST["idProductos"];

        $datos = array();
        $datos = $productos->uno($idProductos);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para encontrar un proveedor en la base de datos
    case 'insertar':
        $codigo = $_POST["codigo"];
        $nombre_producto = $_POST["nombre_producto"];
        $graba_iva = $_POST["graba_iva"];

        $datos = array();
        $datos = $productos->insertar($codigo, $nombre_producto, $graba_iva);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualizar un proveedor en la base de datos
    case 'actualizar':
        $idProductos = $_POST["idProductos"];
        $codigo = $_POST["codigo"];
        $nombre_producto = $_POST["nombre_producto"];
        $graba_iva = $_POST["graba_iva"];
        $datos = array();
        $datos = $productos->actualizar($idProductos, $codigo, $nombre_producto, $graba_iva);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un proveedor en la base de datos
    case 'eliminar':
        $idProductos = $_POST["idProductos"];
        $datos = array();
        $datos = $productos->eliminar($idProductos);
        echo json_encode($datos);
        break;
}
