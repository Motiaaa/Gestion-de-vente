<?php
    include ("connection.php");
    
    $idc= $_GET['id_client'];
    $sql= "DELETE from commandes where id_client = $idc";
    mysqli_query($con,$sql) or die("Requete non valide");
    header ("location:affich_cmd.php");

    mysqli_close($con);
 ?>