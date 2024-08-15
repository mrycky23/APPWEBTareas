<?php

require_once('../config/config.php');
class Clientes{
//TODO: Agregar los metodos de la clase
    //TODO: Mostrar todos los productos
    public function todos(){
        $con = new ClassConnection();
        $con = $con->ProcedureConnnecting();
        $cadena = "SELECT * FROM `clientes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    //TODO: Mostrar un producto
    public function uno($cliente_id){
        $con = new ClassConnection();
        $con = $con->ProcedureConnnecting();
        $cadena = "SELECT * FROM `clientes` WHERE `cliente_id` = $cliente_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    //TODO: Insertar un producto
    public function insertar($nombre, $apellido, $email, $telefono){
        try {
            $con =new ClassConnection();
            $con = $con->ProcedureConnnecting();
            $cadena = "INSERT INTO `clientes` (`cliente_id`, `nombre`, `apellido`, `email`, `telefono`) VALUES (NULL, '$nombre', '$apellido', '$email', '$telefono')";
            if(mysqli_query($con, $cadena)) {
                return $con->insert_id;
            }else{
                return $con->error;
            }
        } catch (Exception $th){
            return $th->getMessage();
        }finally{
            $con->close();
        }
    }
    
    //TODO:Actualizar un producto
    public function actualizar($cliente_id, $nombre, $apellido, $email, $telefono){
        try{
            $con =new ClassConnection();
            $con = $con->ProcedureConnnecting();
            $cadena = "UPDATE `clientes` SET `nombre` = '$nombre', `apellido` = '$apellido', `email` = '$email', `telefono` = '$telefono' WHERE `clientes`.`cliente_id` = $cliente_id";
            if(mysqli_query($con, $cadena)){
                return $cliente_id;
            }else{
                return $con->error;
            }
        }catch (Exception $th){
            return $th->getMessage();
        }finally {
            $con->close();
        }
        
    }

    //TODO: Eliminar un producto
    public function eliminar($cliente_id){
        try{
            $con =new ClassConnection();
            $con = $con->ProcedureConnnecting();
            $cadena = "DELETE FROM `clientes` WHERE `cliente_id`= $cliente_id";
            if(mysqli_query($con, $cadena)){
                return $cliente_id;
            }else{
                return $con->error;
            }
        }catch (Exception $th){
            return $th->getMessage();
        }finally {
            $con->close();
        }
        
    }

}