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
<section>
    <div>
    <div>
        <a href="add_client.php" class="btn">Nouveau Client</a>
    </div>
    <?php
                    include ("connection.php");
                    $requet="SELECT * from clients";
                    $res = mysqli_query($con,$requet) or die("Requete non valide");
                    if(mysqli_num_rows($res)>0){
                        ?>                       
               <div  >
                   <table class="table" >
                       <thead>
                           <th>Id_client</th>
                           <th>Nom</th>
                           <th>Prenom</th>
                           <th>adresse</th>
                           <th>email</th>
                           <th>tele</th>
                           <th>salaire</th>
                           <th>sexe</th>
                           <th>modifier</th>
                        </thead>
                        <tbody>
                        <?php 
                                while($row=mysqli_fetch_assoc($res)) {
                                    ?>
                         <tr>
                             <td><?php echo $row["id_client"]; ?></td>
                             <td><?php echo $row["nom"]; ?></td>
                             <td><?php echo $row["prenom"]; ?></td>
                             <td><?php echo $row["adresse"]; ?></td>
                             <td><?php echo $row["email"]; ?></td>
                             <td><?php echo $row["tel"]; ?></td>
                             <td><?php echo $row["salaire"]; ?></td>
                             <td><?php echo $row["sexe"]; ?></td>
                             <td>
                                 <a href="modif_client.php?id=<?php echo $row["id_client"]; ?>"><button class="b2">modif</button></a>
                                 <a href="sup_client.php?id=<?php echo $row["id_client"]; ?>"><button class="b1">supp</button></a> 
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