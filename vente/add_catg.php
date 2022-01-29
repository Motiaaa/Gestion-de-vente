<?php
include("connection.php");
if(isset($_POST["insert"])){
    $libelle=strtoupper(htmlspecialchars(trim($_POST['libelle'])));

    $sql= "INSERT categories (libelle) values('$libelle')";
    mysqli_query($con,$sql) or die("Requete non valide");
    header("location:affich_catg.php");

    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylee.css">
    <title>Document</title>
</head>
<body>
    <?php include ("menu.php");  ?>  
<section class="sec2">    
      <div>
         <h3>Ajouter Categories</h3>   
               <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">              
               <div class="form">
                    <label >libelle</label>
                    <input type="text" name="libelle"  required autofocus><br><br>
                </div> 
                <button type="submit" name="insert" class="btn">Ajouter</button>   
              </form>
      </div>
</section>

<footer>
  <p><strong><?php include("footer.php"); ?></strong></p>  
</footer>

</body>
</html>