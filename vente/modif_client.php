<?php         
include ("connection.php");
if(isset($_POST["modif"])){
    $idc=htmlspecialchars(trim($_POST['id_client']));
    $nom=strtoupper(htmlspecialchars(trim($_POST['nom'])));
    $prenom=strtoupper(htmlspecialchars(trim($_POST['prenom'])));
    $adresse=strtoupper(htmlspecialchars(trim($_POST['adresse'])));
    $email=strtolower(htmlspecialchars(trim($_POST['email'])));
    $tel=htmlspecialchars(trim($_POST['tel']));
    $salaire=htmlspecialchars(trim($_POST['salaire']));
    $sexe=strtoupper(htmlspecialchars(trim($_POST['sexe'])));
    if(!is_numeric($tel)){
        echo 'tele doit etre Numeric';
    }else{

        $requet="UPDATE clients set nom ='$nom',prenom='$prenom',adresse='$adresse',
                                email='$email',tel=$tel,salaire=$salaire
                                where id_client=$idc ";
        mysqli_query($con,$requet) or die("Requete non valide");
    
        header ("location:affich_client.php");
    }

}
    
    $idc= $_GET["id"];
    $requet="SELECT * from clients where id_client = $idc";
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
    <?php include ("menu.php");  ?>  
    <section class="sec2">
        <div>
            <h3>Modifier un client</h3>  
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST"> 
                <!-- pour acceder id_client -->                   
                <input type="hidden" name="id_client"  value="<?php echo $row["id_client"]; ?>"  >
                <div class="form">
                    <label >id client</label>
                    <!-- pour affichage -->
                    <input disabled  name="id_client"  value="<?php echo $row["id_client"]; ?>"><br>
                </div>   
                <div class="form">
                    <label >nom</label>
                    <input type="text" name="nom"  value="<?php echo $row["nom"]; ?>"  required autofocus><br>
                </div>   
                <div class="form">
                    <label >prenom</label>
                    <input type="text" name="prenom"  value="<?php echo $row["prenom"]; ?>" >
                </div>   
                <div class="form">
                    <label >adresse</label>
                    <input type="text" name="adresse"   value="<?php echo $row["adresse"]; ?>" >
                </div>   
                <div class="form">
                    <label >email</label>
                    <input type="email" name="email"  value="<?php echo $row["email"]; ?>" >
                </div>   
                <div class="form">
                    <label >tele</label>
                    <input type="text" name="tel" maxlength="10" value="<?php echo $row["tel"]; ?>" >
                </div>   
                <div class="form">
                    <label >salaire</label>
                    <input type="number" name="salaire"  value="<?php echo $row["salaire"]; ?>" >
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
</section>
</body>
</html>
<body>