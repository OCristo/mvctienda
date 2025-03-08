<?php
class Usuarios_model{
    private $db; //conexion con la BBDD
    private $datos; //array de datos de la bbdd
    public function __construct(){
        require_once("model/conectar.php");
        $this->db = Conectar::conexion();
        $this->datos = [];
    }
     //TODO: DECLARAR METODOS DE ACCESO A LOS DATOS...
     public function get_datos(){
        $sql="SELECT * FROM usuarios";
        $consulta= $this->db->query($sql);
        while ($registro=$consulta->fetch_assoc()) {
            $this->datos[]=$registro; 
        }
        return $this->datos;
    }
    public function login($user,$contra){
        $sql="SELECT * FROM usuarios WHERE nombre='$user' and passwd='$contra'";
        $consulta= $this->db->query($sql);
        return (mysqli_num_rows($consulta)>0);
    }
    public function borrar($user){
            $sql="DELETE FROM usuarios WHERE nombre='$user'";
            return ($this->db->query($sql));
    }
    public function insertar($user,$pswd){
        $sql="INSERT INTO usuarios (nombre,passwd) VALUES ('$user','$pswd')";
        return ($this->db->query($sql));
        }
    public function modificar($user,$pswd){
        $sql="UPDATE usuarios SET passwd = '$pswd' where nombre='$user'";
        return ($this->db->query($sql));
        }
    }



?>