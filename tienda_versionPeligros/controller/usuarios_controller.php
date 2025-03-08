<?php
session_start();
if (isset($_POST["accion"])) {
    //estamos ante una llamada de ajax
    echo '<form action="" method="post">
            <div class="container">
                <label for="uname"><b>Usuario:</b></label>
                <input type="text" placeholder="Usuario..." name="nombre" value="'.$_POST["nombre"].'" readonly>
                <label for="psw"><b>Contraseña:</b></label>
                <input type="password" placeholder="Contraseña..." name="pswd" value="'.$_POST["passwd"].'" required>
                <input type="submit" name="modificar" value="Modificar">
            </div>
        </form>
        <input type="submit" id="cancelar" value="Cancelar" onclick="cancelar()">';
}
function home(){
    require_once("model/usuarios_model.php");
    $datos = new Usuarios_model();
    $message="";
    if (isset($_POST["borrar"])) {
        $nombre = isset($_POST["nombre"])?$_POST["nombre"]:'';
        if($datos->borrar($nombre)){
            $message = "Borrado correctamente";
        }else{
            $message = "Error al borrar";
        }
    }
    if (isset($_POST["insertar"])) {
        $nombre = isset($_POST["nombre"])?$_POST["nombre"]:'';
        $paswd = isset($_POST["pswd"])?$_POST["pswd"]:'';
        if($datos->insertar($nombre,$paswd)){
            $message = "Insertado correctamente";
        }else{
            $message = "Error al insertar";
        }
    }
    if (isset($_POST["modificar"])) {
        $nombre = isset($_POST["nombre"])?$_POST["nombre"]:'';
        $paswd = isset($_POST["pswd"])?$_POST["pswd"]:'';
        if($datos->modificar($nombre,$paswd)){
            $message = "modificado correctamente";
        }else{
            $message = "Error al modificar";
        }
    }
    $array = $datos->get_datos();
    require_once("view/usuarios_view.php");
    }
function desconectar(){
    session_destroy();
    header("Location: index.php");
}

function login(){
    require_once("model/usuarios_model.php");
    $datos = new Usuarios_model();
    $message="";
    if (!isset($_SESSION["nombre"])) {
        if(isset($_POST["submit"])){
         $usuario = isset($_POST["nombre"])?$_POST["nombre"]:'';
         $paswd = isset($_POST["pswd"])?$_POST["pswd"]:'';
         if ($datos->login($usuario,$paswd)){
             $_SESSION["nombre"] = $usuario;
             header("Location: index.php");
         }else{
             $message = "Usuario o contraseña incorrectos";
         }    
        }
     }
    require_once("view/login_view.php");
}
?>