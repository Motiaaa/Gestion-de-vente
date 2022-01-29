<?php         
       include ("connection.php");
       if(isset($_POST["modif"])){
        $id_produit=strtoupper(htmlspecialchars(trim($_POST['id_produit'])));
        $libelle=strtoupper(htmlspecialchars(trim($_POST['libelle'])));
        $prix_unit=strtolower(htmlspecialchars(trim($_POST['prix_unit'])));
        $id_catg=strtolower(htmlspecialchars(trim($_POST['id_catg'])));
          
        $sql="UPDATE produits set libelle ='$libelle',prix_unit=$prix_unit
                                  where id_produit=$id_produit ";  
        mysqli_query($con,$sql) or die("Requete non valide");
    
        header ("location:affich_produit.php");   
    }
       $idp= $_GET["id_produit"];
       $requet="SELECT * from produits where id_produit = $idp";
       $res = mysqli_query($con,$requet) or die("Requete non valide");
       if(mysqli_num_rows($res)>0){
           while($row=mysqli_fetch_assoc($res)){
            $id_produit = $row["id_produit"];
               $libelle = $row["libelle"];
             $prix_unit = $row["prix_unit"];
               $id_catg = $row["id_catg"];
                  } 
        }else{
        echo "Aucun Ligne";
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
<div class="sec2">
       
          <div>     
          <h3>Modifier un Produit</h3>     
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST"> 
                
                    <!-- pour acceder id_client -->                   
                        <input type="hidden" name="id_produit"  value="<?php echo $id_produit ?>"  >
                       
                        <div class="form">
                            <label >id produit</label>
                            <!-- pour affichage -->
                            <input disabled  name="id_produit"  value="<?php echo $id_produit ?>"><br>
                      </div> 
                        <div class="form">
                           <label >libelle</label>
                           <input type="text" name="libelle"  value="<?php echo $libelle ?>" required autofocus><br>
                        </div>  
                        <div class="form">
                           <label >Prix unitaire</label>
                           <input type="number" name="prix_unit"  value="<?php echo $prix_unit ?>" required>
                        </div>  
                        <div class="form">
                           <label >id Categorie</label>
                           <input disabled name="id_catg"   value="<?php echo $id_catg ?>" >
                        </div>  
                  
                        <button type="submit" name="modif" class="btn">Ajouter</button>  
                    
              </form>
            <?php
            mysqli_close($con);
            ?>
     </div>
</div>
</body>
</html>