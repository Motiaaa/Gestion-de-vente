<?php
include("connection.php");
if(isset($_POST["insert"])){
    $id_client=htmlspecialchars(trim($_POST['id_client']));
    $id_produit=htmlspecialchars(trim($_POST['id_produit']));
    $Qte=htmlspecialchars(trim($_POST['Qte']));
    $datev=htmlspecialchars(trim($_POST['datev']));
 
    $requet= "INSERT into commandes values($id_client,$id_produit,$Qte,'$datev')";
    mysqli_query($con,$requet) or die("Requete non valide");

    header("location:affich_cmd.php");   
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
         <h3>Ajouter un commande</h3>          
           <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST"> 
             <div class="form">
               Clients  
                <select name="id_client">
                        <?php
                        $requet="SELECT * from clients order by id_client desc";
                        $res = mysqli_query($con,$requet) or die("Requete non valide");                                 
                            while($row=mysqli_fetch_assoc($res)) {
                        ?>
                    <option value="<?php echo $row["id_client"]; ?>"><?php echo $row["nom"]; ?></option>  
                            <?php           
                                    }
                            ?>
                    </select>
                </div>
              <div class="form">
               Produits 
                <select name="id_produit"  >
                        <?php
                        $requet="SELECT  * from produits order by id_produit desc";
                        $res = mysqli_query($con,$requet) or die("Requete non valide");
                            while($row=mysqli_fetch_assoc($res)) {
                        ?>
                    <option value="<?php echo $row["id_produit"]; ?>"><?php echo $row["libelle"]; ?></option>  
                            <?php
                                        } 
                                mysqli_close($con);
                            ?>
                    </select>
                </div>
                <div class="form">
                    <label >quantité</label>
                    <input type="number" name="Qte"    required autofocus>
                </div>
                <div class="form">
                    <label >date de vente</label>
                    <input type="datetime-local" name="datev"  required>
                </div>
                <button type="submit" name="insert" class="btn">Ajouter</button>      
          </form>
      </div>
</section>
<footer align="center">
  <p><strong><?php include("footer.php"); ?></strong></p>  
</footer>

</body>
</html>