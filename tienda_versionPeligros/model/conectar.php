<?php
class Conectar{
    public static function conexion(){
        try {
            $conexion=new mysqli("127.0.0.1","root","","tienda");
        } catch (Exception $e) {
            die('Error:'.$e->get_message());
        }
        return $conexion;
    }
}
?>