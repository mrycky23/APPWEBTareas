<?php

require_once("../models/productos.models.php");
$productos = new Productos();
//error_reporting(0);
switch($_GET["op"]){
//TODO:Operaciones para productos
    //TODO: Mostrar todos los productos
    case 'todos':
        $datos= array();
        $datos= $productos->todos();
        while ($row = mysqli_fetch_assoc($datos)){
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    //TODO: Mostrar un solo producto
    case 'uno':
        $id_producto = $_POST["id_producto"];
        $datos= array();
        $datos= $productos->uno($id_producto);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    //TODO: Insertar un producto
    case 'insertar':
        $nombre = $_POST["nombre"];
        $talla = $_POST["talla"];
        $color = $_POST["color"];
        $precio = $_POST["precio"];

        $datos= array();
        $datos= $productos->insertar($nombre, $talla, $color, $precio);
        echo json_encode($datos);
        break;
    //TODO: Actualizar un producto
    case 'actualizar':
        $producto_id = $_POST["producto_id"];
        $nombre = $_POST["nombre"];
        $talla = $_POST["talla"];
        $color = $_POST["color"];
        $precio = $_POST["precio"];

        $datos= array();
        $datos= $productos->actualizar($producto_id, $nombre, $talla, $color, $precio);
        echo json_encode($datos);
        break;
    //TODO: Eliminar un producto
    case 'eliminar':
        $id_producto = $_POST["id_producto"];
        $datos= array();
        $datos= $productos->eliminar($id_producto);
        echo json_encode($datos);
        break;
}
