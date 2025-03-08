<?php
    require_once("view/menu.php");
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
        echo $message;
?>