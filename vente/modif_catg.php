
<?php         
       include ("connection.php");
       if(isset($_POST["modif"])){
           $idc=htmlspecialchars(trim($_POST['id_catg']));
           $libelle=strtoupper(htmlspecialchars(trim($_POST['libelle'])));
           
           $sql="UPDATE categories set libelle ='$libelle' where id_catg=$idc";
           mysqli_query($con,$sql) or die("Requete non valide");
           
           header ("location:affich_catg.php");
        }
        $idc= $_GET["id"];
        $requet="SELECT * from categories where id_catg = $idc";
        $res = mysqli_query($con,$requet) or die("Requete non valide");
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){     
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
            <div >
                <h3>Modifier categorie</h3> 
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST"> 
                    <!-- pour acceder id_cat -->
                    <input type="HIDDEN" name="id_catg"  value="<?php echo $row["id_catg"]; ?>" ><br> 
                    <div class="form">
                        <label >Id categorie</label>
                        <!-- afichage -->
                        <input disabled name="id_catg"  value="<?php echo $row["id_catg"]; ?>" ><br>                   
                    </div> 
                    <div class="form">
                        <label >libelle</label>
                        <input type="text" name="libelle"  value="<?php echo $row["libelle"]; ?>" required autofocus><br><br>
                    </div> 
                    <button type="submit" name="modif" class="btn">Modifier</button>   
                </form>
                <?php 
                } 
            }else{
                echo "Aucun Ligne";
            }
            mysqli_close($con);
            ?>
    </div>
</div>
</body>
</html>