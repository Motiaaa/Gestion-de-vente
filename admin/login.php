
 <?php
        include ("../vente/connection.php");
        if(isset($_POST["login"])){
            $name=htmlspecialchars(trim($_POST["name"]));
            $pass=sha1($_POST["password"]);
            $sql="SELECT * from register where name='$name' and password='$pass'";
            $result=mysqli_query($con,$sql) or die("invalid query");
            if(mysqli_num_rows($result)>0){
                session_start();
                $_SESSION["name"]=$name;
                header ("location:../vente/affich_client.php");
            }else{
                echo "username and password incorrect";
            }
        }
       ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>
<body>
    <section class="sec1">
            <h1>Se connecter</h1>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <label>Name</label>
                        <input type="text" name="name" id="name" placeholder="..." required autofocus><br>
                        <label>Password</label>
                        <input type="password" name="password" placeholder="...">  <br>          

                    <input class="btn" type="submit" name="login" value="Connecter"><br>
                    <p class="olive ml-2"> Ou</p><br>
                    <a class="btn btn-a" href="register.php">S'inscrire</a>
            </form>
    </section>
</body>
</html>