<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/stylee.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include ("menu.php");  ?>    
<section>
      <div>
        <div>
                <a href="add_produit.php" class="btn">Nouveau Produit</a>
        </div>
                <?php
                    include ("connection.php");
                    $requet="SELECT * from produits";
                    $res = mysqli_query($con,$requet) or die("Requete non valide");
                    if(mysqli_num_rows($res)>0){
                ?>                      
               <div  >
                  <table class="table">
                        <thead>
                            <th>References</th>
                            <th>Libelle</th>
                            <th>Prix_unitaire</th>
                            <th>Id_catg</th>                           
                            <th>Modifier</th>
                        </thead>
                        <tbody>
                            <?php 
                                while($row=mysqli_fetch_assoc($res)) {
                            ?>
                         <tr>
                            <td><?php echo $row["id_produit"]; ?></td>
                            <td><?php echo $row["libelle"]; ?></td>
                            <td><?php echo $row["prix_unit"]; ?></td>
                            <td><?php echo $row["id_catg"]; ?></td>                   
                            <td>
                            <a href="modif_produit.php?id_produit=<?php echo $row["id_produit"]; ?>"><button class="b2">modif</button></a>
                            <a href="sup_produit.php?id_produit=<?php echo $row["id_produit"]; ?>"><button class="b1">supp</button></a> 
                            </td>
                         </tr>
                             <?php } ?>
                            </tbody>
                    </table>
                </div>
                        <?php }else{
                            echo "<h3>Aucun Entrée</h3>";
                            }
                            mysqli_close($con);
                        ?>
       </div>
</section>

<footer>
  <?php include("footer.php"); ?> 
</footer>

</body>
</html>