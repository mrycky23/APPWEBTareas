<?php

require_once("../models/clientes.models.php");
$clientes = new Clientes();
//error_reporting(0);
switch($_GET["op"]){
//TODO:Operaciones para compras
    //TODO: Mostrar todas los compras
    case 'todos':
        $datos= array();
        $datos= $clientes->todos();
        while ($row = mysqli_fetch_assoc($datos)){
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    //TODO: Mostrar un solo producto
    case 'uno':
        $cliente_id = $_POST["cliente_id"];
        $datos= array();
        $datos= $clientes->uno($cliente_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    //TODO: Insertar un producto
    case 'insertar':
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];

        $datos= array();
        $datos= $clientes->insertar($nombre, $apellido, $email, $telefono);
        echo json_encode($datos);
        break;
    //TODO: Actualizar un producto
    case 'actualizar':
        $cliente_id = $_POST["cliente_id"]; 
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];

        $datos= array();
        $datos= $compras->actualizar($cliente_id, $nombre, $apellido, $email, $telefono);
        echo json_encode($datos);
        break;
    //TODO: Eliminar un producto
    case 'eliminar':
        $cliente_id = $_POST["cliente_id"];
        $datos= array();
        $datos= $compras->eliminar($cliente_id);
        echo json_encode($datos);
        break;
}
