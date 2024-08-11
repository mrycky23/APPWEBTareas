<?php
//TODO: Clase de Productos
require_once('../config/config.php');
class Clientes
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from productos
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `clientes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idClientes) //select * from productos where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `clientes` WHERE `idClientes`=$idClientes";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombres, $direccion, $telefono, $cedula, $correo) //insert into productos (codigo, nombre_producto, graba_iva) values ($codigo, $nombre_producto, $graba_iva)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `clientes` ( `nombres`, `direccion`, `telefono`, `cedula`, `correo` ) VALUES ('$nombres, $direccion, $telefono, $cedula, $correo')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($idClientes, $nombres, $direccion, $telefono, $cedula, $correo) //update productos set codigo =codigo, nombre_producto=nombre_producto, graba_iva=graba_iva where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `clientes` SET `nombres`='$nombres',`direccion`='$direccion',`telefono`='$telefono', `telefono`='$telefono', `cedula`='$cedula', `correo`='$correo' WHERE `idClientes` = $idClientes";
            if (mysqli_query($con, $cadena)) {
                return $idClientes;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idClientes) //delete from productos where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `clientes` WHERE `idClientes`= $idClientes";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
