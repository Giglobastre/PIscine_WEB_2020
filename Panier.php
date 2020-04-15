<?php 
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="icon" type="image/jpg" href="../Images/logo%20Ebay%20ECE.JPG" />
  <link rel="stylesheet" type="text/css" href="../Style/Style_panier.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
</head>
<body>

  <div id="header">
    <img src="../Images/logo%20Ebay%20ECE.JPG" height="40" width="160"> 
  </div>
  
  <div class="topnav">
    <div style="float:left">
      <a href="index.php">Home</a>
      <a href="Enchères_en_cours.php">Encherères en cours</a>
      <a href="Achats_immédiats.php">Achats immédiats</a>
      <a href="Négociation.php">Négociation</a>
      <a href="Contact.php">Contact</a>
      <a href="about.php">About</a>
    </div>
    <div style="float:right">
      <a href="connexion.php"><img height="27" src="../Images/ImgAcoountConnexion.jpg" alt="" hspace="0"></a>
      <a class="active" href="Panier.php"><img height="27" src="../Images/PanierVert.PNG" alt="" hspace="0"></a>
    </div>     
  </div>   

  <?php 
  

  $_SESSION['ID_Client'];
  $total=0;



  $condition=0;
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');

    $req = $bdd->prepare("SELECT ID_Client ,ID_Objet,Acquereur,ID_transac FROM panier"); 
    $req->execute();

    while ($data = $req->fetch()){

      if(($data['ID_Client']==$_SESSION['ID_Client'])&&($data['Acquereur']==1))
      {
        $condition=1;
        echo ("id client :");
        echo '<h3>'.$data['ID_transac'].'</h3>';
        echo ("id object :");
        echo '<h3>'.$data['ID_Objet'].'</h3>';
        $req2 = $bdd->prepare("SELECT ID,Prix FROM objets WHERE ID='".$data['ID_Objet']."'"); 
        $req2->execute();

        while ($data = $req2->fetch())
        {
          $total=$data['Prix']+$total;
          echo ("Prix :");
          echo '<h3>'.$data['Prix'].'</h3>';

        }



        $req2->closeCursor();;
      }


    }
    echo("Total panier =");
    echo $total;
    if($condition==0)
    {
      echo("panier vide");
    }


    $req->closeCursor();;
  }
  catch (Exception $e){

    die('Erreur : ' . $e->getMessage());
  }

  ?>
  <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
  <div id="footer">
    Copyright &copy; 2020; 
    Clément Viéville - Hugo Teinturier - Kenny Huber
  </div>
</body>
</html>