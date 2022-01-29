<?php
include("connection.php");
if(isset($_POST["insert"])){
    $libelle=strtoupper(htmlspecialchars(trim($_POST['libelle'])));
    $prix_unit=htmlspecialchars(trim($_POST['prix_unit']));
    $id_catg=htmlspecialchars(trim($_POST['id_catg']));
   
    $requet= "INSERT into produits(libelle,prix_unit,id_catg) 
                          values('$libelle',$prix_unit,$id_catg)";
    mysqli_query($con,$requet) or die("Requete non valide");

    header("location:affich_produit.php");   
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
      <h3>Ajouter un Produit</h3>            
           <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">  
                <div class="form">
                    <label >libelle</label>
                    <input type="text" name="libelle" required autofocus>
                </div> 
                <div class="form">
                    <label >Prix unitaire</label>
                    <input type="number" name="prix_unit" required>
                </div> 
                <div class="form">
                    Categorie 
                    <select  name="id_catg"  >
                            <?php
                            $requet="SELECT  * from categories order by id_catg desc";
                            $res = mysqli_query($con,$requet) or die("Requete non valide");
                            if(mysqli_num_rows($res)>0){
                                while($row=mysqli_fetch_assoc($res)) {
                            ?>
                        <option value="<?php echo $row["id_catg"]; ?>"><?php echo $row["libelle"]; ?></option>  
                                <?php
                                            }
                                        }
                                    mysqli_close($con);
                                ?>
                        </select>
                </div>
                <button type="submit" name="insert" class="btn">Ajouter</button>  
            </form>
      </div>
</section>

<footer >
  <p><strong><?php include("footer.php"); ?></strong></p>  
</footer>

</body>
</html>