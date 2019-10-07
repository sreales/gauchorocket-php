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
            
            <form method="post" action="registrar.php" enctype="application/x-www-form-urlencoded">
                <div class="form-group">
                    <label> Usuario:</label>
                    <input type="text" name="usuario" class="third" placeholder="Usuario" required>
                </div>
                
                <div class="form-group" >
                <label> Contraseña:</label>
                <input type="password" name="upassword" class="third" placeholder="Contraseña" required>
                </div>
                <div class="form-group" >
                <label> Repetir contraseña:</label>
                <input type="password" name="upassword2" class="third" placeholder="Contraseña" required>
                </div>
                <div class="form-group" >
                <label> Nombre:</label>
                <input type="text" name="nombre" class="third" placeholder="Nombre" required>
                </div>
                <input type="submit" name="registrar" class="btn btn-default" >
                <br>
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
                    $sql = "INSERT INTO login (Username,UPassword) VALUES ('".$_POST["usuario"]."', '".sha1($_POST["upassword"]). "');";
                     if(!$resultado = mysqli_query($conexion, $sql) ){
                        echo "error";
                    }
                    $sql = "select ID from login where Username like \"".$_POST["usuario"]."\";";
                    if(!$resultado = mysqli_query($conexion, $sql) ){
                        echo "error";
                    }
                    $fila = mysqli_fetch_assoc($resultado);
                    $userID = $fila["ID"];
                     $sql = "INSERT INTO usuario (loginID, nombre) VALUES (\"".$userID."\", \"".$_POST["nombre"]."\");";        
                    if(!$resultado = mysqli_query($conexion, $sql) ){
                        echo "error";
                    }

                    $sql = "INSERT INTO loginTipoUsuario (loginID, tipoID) VALUES (".$userID.",2);";        
                    if(!$resultado = mysqli_query($conexion, $sql) ){
                        echo "error";
                    }
                    
                    mysqli_close($conexion);
                    session_destroy();
                    header("Location: login.php");
                    exit;
                }
            ?>       
            
        </article>
    </body>
</html>
