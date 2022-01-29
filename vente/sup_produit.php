<?php
    include ("connection.php");

    $idc= $_GET['id_produit'];
    $sql= "DELETE from produits where id_produit = $idc";
    mysqli_query($con,$sql) or die("Requete non valide");
    header ("location:affich_produit.php");

    mysqli_close($con);
 ?>