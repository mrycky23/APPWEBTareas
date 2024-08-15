<?php

require_once('../config/config.php');
class Productos{
//TODO: Agregar los metodos de la clase
    //TODO: Mostrar todos los productos
    public function todos(){
        $con = new ClassConnection();
        $con = $con->ProcedureConnnecting();
        $cadena = "SELECT * FROM `productos`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    //TODO: Mostrar un producto
    public function uno($id_producto){
        $con = new ClassConnection();
        $con = $con->ProcedureConnnecting();
        $cadena = "SELECT * FROM `productos` WHERE `producto_id` = $id_producto";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    //TODO: Insertar un producto
    public function insertar($nombre, $talla, $color, $precio){
        try {
            $con =new ClassConnection();
            $con = $con->ProcedureConnnecting();
            $cadena = "INSERT INTO `productos` (`producto_id`, `nombre`, `talla`, `color`, `precio`) VALUES (NULL, '$nombre', '$talla', '$color', '$precio')";
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
    public function actualizar($producto_id, $nombre, $talla, $color, $precio){
        try{
            $con =new ClassConnection();
            $con = $con->ProcedureConnnecting();
            $cadena = "UPDATE `productos` SET `nombre` = '$nombre', `talla` = '$talla', `color` = '$color', `precio` = '$precio' WHERE `productos`.`producto_id` = $producto_id";
            if(mysqli_query($con, $cadena)){
                return $producto_id;
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
    public function eliminar($producto_id){
        try{
            $con =new ClassConnection();
            $con = $con->ProcedureConnnecting();
            $cadena = "DELETE FROM `productos` WHERE `productos_id`= $producto_id";
            if(mysqli_query($con, $cadena)){
                return $producto_id;
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