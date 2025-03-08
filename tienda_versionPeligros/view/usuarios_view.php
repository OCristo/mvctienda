<?php
if (isset($_SESSION["nombre"])) {
    require_once("view/menu.php");
    ?>
    <div id="nuevo">
        <form action="" method="post">
            <div class="container">
                <label for="uname"><b>Usuario:</b></label>
                <input type="text" placeholder="Usuario..." name="nombre" required>
                <label for="psw"><b>Contraseña:</b></label>
                <input type="password" placeholder="Contraseña..." name="pswd" required>
                <input type="submit" name="insertar" value="Insertar">
            </div>
        </form>
    </div>
    <div id="contenido"></div>
    <?php
    if (isset($array)) {
        echo "<table border><tr><th>Nombre</th><th>Clave</th><th></th><th></th></tr>";
        foreach ($array as $registro) {
            if (is_array($registro)) {
                echo "<tr>";
                foreach ($registro as $key => $campo) {
                    echo "<td>$campo</td>";
                }
                echo '<td>
                 <form action="" method="post">
                    <input type="hidden" name="nombre" value="'.$registro["nombre"].'">
                    <input type="submit" name="borrar" value="Eliminar">
                 </form>
                </td>';
                
                echo '<td>
                    <input type="hidden" id="nombre'.$registro["nombre"].'" value="'.$registro["nombre"].'">
                    <input type="hidden" id="passwd'.$registro["nombre"].'" value="'.$registro["passwd"].'">
                    <input type="submit" id="modificar" value="Modificar" onclick=modificarUsuario(`'.$registro["nombre"].'`)>
                </td>';
                
            }
        }
        echo "</table>";
    }
}else{
 ?>   
    <form action="" method="post">
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Usuario..." name="nombre" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Contraseña..." name="pswd" required>
            <input type="submit" name="submit" value="Login">
        </div>
    </form>
<?php
}
echo "<p>$message</p>";
?>