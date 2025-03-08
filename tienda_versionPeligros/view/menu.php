<?php
if (isset($_SESSION["nombre"])){
  echo '<ul>
  <li><a href="index.php?controlador=usuarios&action=home">Datos</a></li>
  <li><a href="index.php?controlador=productos&action=home">Productos</a></li>
  <li><a href="index.php?controlador=usuarios&action=desconectar">Cerrar Sesión</a></li>
</ul>';
}else{
  echo '<ul>
  <li><a href="index.php?controlador=productos&action=home">Home</a></li>
  <li><a href="index.php?controlador=usuarios&action=login">Iniciar Sesión</a></li>
</ul>';
}

?>