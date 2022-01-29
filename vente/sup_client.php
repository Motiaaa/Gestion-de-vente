<?php
    include ("connection.php");
    $idc= $_GET['id'];
    $requet= "DELETE from clients where id_client = $idc";
    $result=mysqli_query($con,$requet) or die("Requete non valide");
    header ("location: affich_client.php");
    
    mysqli_close($con);
 ?>