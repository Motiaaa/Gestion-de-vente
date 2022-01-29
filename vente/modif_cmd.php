<?php         
       include ("connection.php");
       if(isset($_POST["modif"])){
        $id_client=htmlspecialchars(trim($_POST['id_client']));
        $id_produit=htmlspecialchars(trim($_POST['id_produit']));
        $Qte=htmlspecialchars(trim($_POST['Qte']));
        $datev=htmlspecialchars(trim($_POST['datev']));
        
        $sql="UPDATE commandes set id_produit =$id_produit,Qte=$Qte,datev='$datev'
                                  where id_client=$id_client ";   
        mysqli_query($con,$sql) or die("Requete non valide");
        header ("location:affich_cmd.php");    
    }
       $idc= $_GET["id_client"];
       $requet="SELECT * from commandes where id_client = $idc";
       $res = mysqli_query($con,$requet) or die("Requete non valide");
       if(mysqli_num_rows($res)>0){
           while($row=mysqli_fetch_assoc($res)){
            $id_client = $row["id_client"];
           $id_produit = $row["id_produit"];
                  $Qte = $row["Qte"];
                $datev = $row["datev"];

                
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
<div class="sec2" >
          <div> 
          <h3>Ajouter un commande</h3>                   
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST"> 
                <!-- pour acceder id_client -->                   
                <input type="hidden" name="id_client"  value="<?php echo $id_client ?>"  >
                <div class="form">
                    <label >id client</label>
                    <!-- pour affichage -->
                    <input disabled  name="id_client"  value=" <?php echo $id_client; ?>"><br>
                </div>
                <div class="form">
                    <label >id produit</label>
                    <!-- pour affichage -->
                    <input disabled name="id_produit"  value="<?php echo $id_produit; ?>"  required autofocus><br>
                </div>
                <div class="form">
                  produits      
                            <select  name="id_produit"  >
                                    <?php
                                    $requet="SELECT * from produits order by id_produit desc";
                                    $res = mysqli_query($con,$requet) or die("Requete non valide");
                                    if(mysqli_num_rows($res)>0){
                                        while($row=mysqli_fetch_assoc($res)) {           
                                    ?>
                                <option value="<?php echo $row["id_produit"]; ?>"><?php echo $row["libelle"]; ?></option>  
                                        <?php
                                                    }
                                                } else{
                                                    echo "No rows";
                                                }                                      
                                        ?>
                             </select>
                             </div>
                 <div class="form">
                    <label >quantité</label>
                    <input type="number" name="Qte"  value="<?php echo $Qte; ?>" >
                </div>                    
                 <div class="form">
                    <label >date</label>
                    <input type="datetime-local" name="datev" value="<?php echo $datev; ?>" >
                </div> 
                <button type="submit" name="modif" class="btn">Modifier</button>    
              </form>
            <?php
            mysqli_close($con);
            ?>
     </div>
</div>
</body>
</html>