<!DOCTYPE html>
<html>
    <head>
    </head>
    <bod>
        <header>
        </header>
        <nav></nav>
        <article>
            <form method="post" action="login.php" enctype="application/x-www-form-urlencoded">
                <label> Usuario:</label>
                <input type="text" name="usuario" required>
                <br>
                <label> Contraseña:</label>
                <input type="password" name="upassword" required>
                <br>
                <input type="submit" name="login" >
                <br>
                <a href="registrar.php">Registrar</a>
            </form>
            <?php
                session_start();
                if(isset($_POST["usuario"])){
                    /* connectar a la base de datos */
                    $host = "localhost";
                    $us = "root";
                    $password = "";
                    $bd = "gr";

                    $conexion = new mysqli($host, $us, $password, $bd);
                    //2 Ejecutar la consulta
                    $sql = "select login.Username as usuario, login.UPassword as password, loginTipoUsuario.TipoID as TipoID from login inner join loginTipoUsuario on login.ID = loginTipoUsuario.loginID where login.Username like \"".$_POST["usuario"]."\";";
                    //echo "$sql";
                    //echo var_dump($conexion);
                    if(!$resultado = mysqli_query($conexion, $sql) ){//or die("error al conectar la base de datos") ) {
                        echo "error";
                    }
        
                    /* comprobar si existe el usuario */
                    $fila = mysqli_fetch_assoc($resultado);
                    if($fila["password"] == sha1($_POST["upassword"]) ){
                        $_SESSION["login"] = true;
                        $_SESSION["tipo"] = $fila["TipoID"];
                    }
                    mysqli_close($conexion);
                    header("Location: index.php");
                    exit;
                }
                    

                
                /* redirigir */
            ?>
        </article>
    </bod>
</html>