<?php
require_once("view/menu.php");
if (isset($_SESSION["nombre"])){
?>
    <div id="nuevo">
        <form action="" method="post">
            <div class="container">
                <label for="uname"><b>Nombre Producto:</b></label>
                <input type="text" placeholder="Nombre Producto..." name="nombre" required>
                <label for="uage"><b>Precio:</b></label>
                <input type="text" placeholder="Precio..." name="precio" required>
                <label for="umail"><b>Stock:</b></label>
                <input type="text" placeholder="Stock..." name="stock" required>
                <input type="submit" name="insertar" value="Insertar">
            </div>
        </form>
    </div>
    <div id="contenido"></div>
    <?php
    if (isset($array)) {
        echo "<table border><tr><th>Id</th><th>Nombre</th><th>Precio</th><th>Stock</th></tr>";
        foreach ($array as $registro) {
            if (is_array($registro)) {
                echo "<tr>";
                foreach ($registro as $key => $campo) {
                    echo "<td>$campo</td>";
                }
                echo '<td>
                <form action="" method="post">
                <input type="hidden" name="id" value="'.$registro["id"].'">
                <input type="submit" name="borrar" value="Eliminar">
                </form>
            </td>';
            echo '<td>
                    <input type="hidden" id="nombre'.$registro["id"].'" value="'.$registro["nombre"].'">
                    <input type="hidden" id="precio'.$registro["id"].'" value="'.$registro["precio"].'">
                    <input type="hidden" id="stock'.$registro["id"].'" value="'.$registro["stock"].'">
                    <input type="submit" id="modificar" value="Modificar" onclick=modificarProducto(`'.$registro["id"].'`)>
                </td>';
                echo "</tr>";
            }
        }
        echo "</table>";
    }
}else{
    $contador = 1;
    if (isset($array)) {
        foreach ($array as $registro) {
            if (is_array($registro)) {
                if ($contador == 1){
                    echo ' <div class="w3-row-padding w3-padding-16 w3-center">';
                }
                echo ' <div class="w3-quarter">
                        <h3>'.$registro["nombre"].'</h3>
                        <p>Precio: '.$registro["precio"].'€</p>
                        <p>Stock: '.$registro["stock"].'</p>
                        </div>' ;
                if ($contador == 4){
                    $contador = 1;
                    echo '</div>';
                }   else   $contador++;
            }
        }
    }
}
?>