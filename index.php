<!DOCTYPE html>
<html>
    <head>
    </head>
    <bod>
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
    </bod>
</html>