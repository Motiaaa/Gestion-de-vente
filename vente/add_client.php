<?php
include("connection.php");
if(isset($_POST["insert"])){

    $nom=strtoupper(htmlspecialchars(trim($_POST['nom'])));
    $prenom=strtoupper(htmlspecialchars(trim($_POST['prenom'])));
    $adresse=strtoupper(htmlspecialchars(trim($_POST['adresse'])));
    $email=strtolower(htmlspecialchars(trim($_POST['email'])));
    $tel=htmlspecialchars(trim($_POST['tel']));
    $salaire=htmlspecialchars(trim($_POST['salaire']));
    $sexe=strtoupper(htmlspecialchars(trim($_POST['sexe'])));

    if(empty($nom)){
        echo "Entrez vtre Nom";
    }elseif(empty($prenom)){
        echo "Entrez vtre Prenom";
    }elseif(!is_numeric($tel)){
        echo "Tele doit etre numiric ";
    }

    $requet= "INSERT into clients(nom,prenom,adresse,email,tel,salaire,sexe) 
    values('$nom','$prenom','$adresse','$email','$tel',$salaire,'$sexe')";

    mysqli_query($con,$requet) or die("Requete non valide");

    header("location:affich_client.php");
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
          <h3>Ajouter un client</h3>        
             <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST"> 
                <div class="form">
                    <label >Nom</label>
                    <input type="text" name="nom" required autofocus>
                </div>     
                <div class="form">
                    <label >Prenom</label>
                    <input type="text" name="prenom" required>
                </div>     
                <div class="form">
                    <label >Adresse</label>
                    <input type="text" name="adresse" >
                </div>     
                <div class="form">
                    <label >Email</label>
                    <input type="email" name="email" >
                </div>     
                <div class="form">
                    <label >Tele</label>
                    <input type="text" maxlength="10" name="tel" required>
                </div>     
                <div class="form">
                    <label >Salaire</label>
                    <input type="number" name="salaire"  required>
                </div>     
                <div class="form">
                    Sexe
                    <select name="sexe"  required>
                        <option value="H">Homme</option>
                        <option value="F">Femme</option>
                     </select>
                </div>     
                <button type="submit" name="insert" class="btn">Ajouter</button>
                
            
            </form>
      </div>
</section>

<footer>
   <?php include("footer.php"); ?> 
</footer>

</body>
</html>