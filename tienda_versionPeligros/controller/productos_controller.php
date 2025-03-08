<?php
session_start();
if (isset($_POST["accion"])) {
    //estamos ante una llamada de ajax
    echo '<form action="" method="post">
            <div class="container">
                <input type="hidden" name="id" value="'.$_POST["id"].'">
                <label for="uname"><b>Nombre Producto:</b></label>
                <input type="text" placeholder="Nombre Producto..." name="nombre" value="'.$_POST["nombre"].'" required>
                <label for="uage"><b>Precio:</b></label>
                <input type="text" placeholder="Precio..." name="precio" value="'.$_POST["precio"].'" required>
                <label for="umail"><b>Stock:</b></label>
                <input type="text" placeholder="Stock..." name="stock" value="'.$_POST["stock"].'" required>
                <input type="submit" name="modificar" value="Modificar">
            </div>
        </form>
        <input type="submit" id="cancelar" value="Cancelar" onclick="cancelar()">';
}

function home(){
    require_once("model/productos_model.php");
    $datos = new Productos_model();
    if (isset($_POST["borrar"])) {
        $id = isset($_POST["id"])?$_POST["id"]:'';
        if($datos->borrar($id)){
            $message = "Borrado correctamente";
        }else{
            $message = "Error al borrar";
        }
    }
    if (isset($_POST["insertar"])) {
        $nombre = isset($_POST["nombre"])?$_POST["nombre"]:'';
        $precio = isset($_POST["precio"])?$_POST["precio"]:'';
        $stock = isset($_POST["stock"])?$_POST["stock"]:'';
        if($datos->insertar($nombre,$precio,$stock)){
            $message = "Insertado correctamente";
        }else{
            $message = "Error al insertar";
        }
    }
    if (isset($_POST["modificar"])) {
        $id = isset($_POST["id"])?$_POST["id"]:'';
        $nombre = isset($_POST["nombre"])?$_POST["nombre"]:'';
        $precio = isset($_POST["precio"])?$_POST["precio"]:'';
        $stock = isset($_POST["stock"])?$_POST["stock"]:'';
        if($datos->modificar($id,$nombre,$precio,$stock)){
            $message = "modificado correctamente";
        }else{
            $message = "Error al modificar";
        }
    }
    $array = $datos->get_productos();
    require_once("view/productos_view.php");
    }
?>