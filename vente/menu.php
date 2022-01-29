
  <?php
  session_start();
  if(!isset($_SESSION["name"])){
       header ("location: admin/login.php");
  }
  ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="../css/menu.css">
        <title>Document</title>
    </head>
    <body>
      <nav>
        <ul>
          <li><a href="affich_client.php"><h3>Clients</h3></a></li>
          <li><a href="affich_catg.php"><h3>Catg</h3></a></li>
          <li><a href="affich_produit.php"><h3>Produits</h3></a></li>
          <li><a href="affich_cmd.php"><h3>Commandes</h3></a></li>
          <li><a href="logout.php"><h3>logout</h3></a></li>
        </ul>
      </nav>
      <h1>Gestion des Ventes</h1>  
    </body>
    </html>