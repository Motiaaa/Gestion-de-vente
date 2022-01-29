<?php
    include ("../vente/connection.php");
    if(isset($_POST["insert"])){
    $name=htmlspecialchars(trim($_POST["nom"]));
    $email=htmlspecialchars(trim($_POST["email"]));
    $pass=sha1($_POST["password"]);
    $data = $name and $email and $pass ;
    if(empty($data)){
        echo"pas identique";
    }else{
        $sql="INSERT into register (name,email,password) values
                            ('$name','$email','$pass')";
        if(mysqli_query($con,$sql)){
            echo "data saved ";
        }else{
            echo "data non saved"; 
           }
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
        <h1>Inscription </h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <label class="olive">Name</label>
            <input type="text" name="nom"  placeholder="..." required autofocus><br>
            <label class="olive">Mail</label>
            <input type="email" name="email" placeholder="..." required> <br>
            <label class="olive">Password</label>
            <input type="password" name="password" placeholder="..." required><br>
            
            <input class="btn" type="submit" name="insert" value="Ajouter"> <br>
     
                     <p class="olive">Ou</p><br>

              <a class="btn btn-a" href="login.php">Se connecter</a>
    </form>
  </section>
</body>
</html>