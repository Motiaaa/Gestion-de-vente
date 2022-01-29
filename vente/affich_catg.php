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
                    <a href="add_catg.php" class="btn">Nouveau categorie</a>
                </div>
                    <?php
                        include ("connection.php");
                        $requet="SELECT * from  categories";
                        $res = mysqli_query($con,$requet) or die("Requete non valide");
                        if(mysqli_num_rows($res)>0){
                    ?>           
               <div>
                  <table class="table" >
                        <thead>
                            <th>Id_categorie</th>
                            <th>Libelle</th>
                            <th>Modifier</th>   
                        </thead>
                        <tbody>
                            <?php 
                                while($row=mysqli_fetch_assoc($res)) {
                            ?>
                         <tr>
                                <td><?php echo $row["id_catg"]; ?></td>
                                <td><?php echo $row["libelle"]; ?></td>
                            
                                <td>
                                <a href="modif_catg.php?id=<?php echo $row["id_catg"]; ?>"><button class="b2">modif</button></a>
                                <a href="sup_catg.php?id=<?php echo $row["id_catg"]; ?>"><button class="b1">supp</button></a> 
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