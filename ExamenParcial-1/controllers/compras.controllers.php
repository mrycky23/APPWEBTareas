<?php

require_once("../models/compras.models.php");
$compras = new Compras();
//error_reporting(0);
switch($_GET["op"]){
//TODO:Operaciones para compras
    //TODO: Mostrar todas los compras
    case 'todos':
        $datos= array();
        $datos= $compras->todos();
        while ($row = mysqli_fetch_assoc($datos)){
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    //TODO: Mostrar un solo producto
    case 'uno':
        $compra_id = $_POST["compra_id"];
        $datos= array();
        $datos= $compras->uno($compra_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    //TODO: Insertar un producto
    case 'insertar':
        $cliente = $_POST["cliente"];
        $producto = $_POST["producto"];
        $cantidad = $_POST["cantidad"];

        $datos= array();
        $datos= $productos->insertar($cliente, $producto, $cantidad);
        echo json_encode($datos);
        break;
    //TODO: Actualizar un producto
    case 'actualizar':
        $compra_id = $_POST["compra_id"];
        $cliente = $_POST["cliente"];
        $producto = $_POST["producto"];
        $cantidad = $_POST["cantidad"];

        $datos= array();
        $datos= $compras->actualizar($compra_id, $cliente, $producto, $cantidad);
        echo json_encode($datos);
        break;
    //TODO: Eliminar un producto
    case 'eliminar':
        $compra_id = $_POST["compra_id"];
        $datos= array();
        $datos= $compras->eliminar($compra_id);
        echo json_encode($datos);
        break;
}
