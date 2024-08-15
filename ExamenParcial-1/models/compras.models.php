<?php

require_once('../config/config.php');
class Compras{
//TODO: Agregar los metodos de la clase
    //TODO: Mostrar todos los productos
    public function todos(){
        $con = new ClassConnection();
        $con = $con->ProcedureConnnecting();
        $cadena = "SELECT * FROM `compras`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    //TODO: Mostrar un producto
    public function uno($compra_id){
        $con = new ClassConnection();
        $con = $con->ProcedureConnnecting();
        $cadena = "SELECT * FROM `compras` WHERE `compra_id` = $compra_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    //TODO: Insertar un producto
    public function insertar($cliente, $producto, $cantidad){
        try {
            $con =new ClassConnection();
            $con = $con->ProcedureConnnecting();
            $cadena = "INSERT INTO `compras` (`compra_id`, `cliente_id`, `producto_id`, `cantidad`) VALUES (NULL, '$cliente', '$producto', '$cantidad')";
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
    public function actualizar($compra_id, $cliente, $producto, $cantidad){
        try{
            $con =new ClassConnection();
            $con = $con->ProcedureConnnecting();
            $cadena = "UPDATE `compras` SET `cliente_id` = '$cliente', `producto_id` = '$producto', `cantidad` = '$cantidad' WHERE `compras`.`compra_id` = $compra_id";
            if(mysqli_query($con, $cadena)){
                return $compra_id;
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
    public function eliminar($compra_id){
        try{
            $con =new ClassConnection();
            $con = $con->ProcedureConnnecting();
            $cadena = "DELETE FROM `compras` WHERE `compras_id`= $compra_id";
            if(mysqli_query($con, $cadena)){
                return $compra_id;
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