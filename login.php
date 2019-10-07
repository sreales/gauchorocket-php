<!DOCTYPE html>
<html>
    <head>
         <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
    </head>
    <body>
        <header>
        </header>
        <nav></nav>
        <article>
            <?php
            session_start(); 
            if(isset($_SESSION["login"])){
                header("Location: index.php");
                    exit;
                }
            ?>
            <form method="post" action="login.php" enctype="application/x-www-form-urlencoded">
                <div class="form-group">
                    <label> Usuario:</label>
                    <input type="text" name="usuario" class="third" placeholder="Usuario" required>
                </div>
                
                <div class="form-group" >
                <label> Contraseña:</label>
                <input type="password" name="upassword" class="third" placeholder="Contraseña" required>
                </div>
                <input type="submit" name="login" class="btn btn-default" >
                <br>
                <a href="registrar.php" class="stretched-link" >Registrar</a>
            </form>
            <?php
                
                //session_start();
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
    </body>
</html>