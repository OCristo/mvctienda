<?php
class Productos_model{
    private $db; //conexion con la BBDD
    private $datos; //array de datos de la bbdd
    public function __construct(){
        require_once("model/conectar.php");
        $this->db = Conectar::conexion();
        $this->datos = [];
    }
     //TODO: DECLARAR METODOS DE ACCESO A LOS DATOS...

     public function get_productos(){
        $sql="SELECT * FROM productos";
        $consulta= $this->db->query($sql);
        while ($registro=$consulta->fetch_assoc()) {
            $this->datos[]=$registro; 
        }
        return $this->datos;
    }
    public function borrar($id){
        $sql="DELETE FROM productos WHERE id='$id'";
        return ($this->db->query($sql));
    }
    public function insertar($nombre,$precio,$stock){
        $sql="INSERT INTO productos (nombre,precio,stock) VALUES ('$nombre','$precio','$stock')";
        return $this->db->query($sql);
    }
    public function modificar($id,$nombre,$precio,$stock){
        $sql="UPDATE productos SET nombre = '$nombre', precio = '$precio', stock = '$stock' where id = '$id'";
        return $this->db->query($sql);
    }
}
?>