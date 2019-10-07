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
                if($_SESSION["tipo"] == 1){
                    $usuario = "admin";
                }else{
                    $usuario = "usuario";
                }
                        
                echo "soy usuario del tipo: ".$usuario ;
                echo "<br><a href=\"logout.php\">Logout </a>";
            }else{
                echo"<a href=\"login.php\">Login</a>";
            }
            
            ?>
            
        </article>
    </body>
</html>