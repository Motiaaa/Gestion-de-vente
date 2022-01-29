<?php
    include ("connection.php");
    $idc= $_GET['id'];
    $sql= "DELETE from categories where id_catg = $idc";
    mysqli_query($con,$sql) or die("Requete non valide");
    header ("location:affich_catg.php");

    mysqli_close($con);
 ?>