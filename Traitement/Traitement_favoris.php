<?php 
session_start();
$_SESSION['ID'];
$ID_Objet=$_POST['ID_obj'];
?>
<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="icon" type="image/jpg" href="../Images/logo%20Ebay%20ECE.JPG"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
  <link rel="stylesheet" type="text/css" href="../Style/Style_negociations.css" />

</head>

<body class="col">

  <div id="header">
    <img src="../Images/logo%20Ebay%20ECE.JPG" height="40" width="160"> 
  </div>    

  <div class="topnav">
    <div style="float:left">
      <a href="index.php">Home</a>
      <a href="AchatsPrécedents.php">Achats Précedents</a>
      <a href="Favoris.php">Favoris</a>
      <a href="Contact.php">Contact</a>
      <a href="about.php">About</a>
      <a href="Paramètres.php">Paramètres</a>
    </div>
    <div style="float:right">
      <a class="active" href="connexion.php"><img height="27" src="../Images/imgAccountVerte.JPG" alt="" hspace="0"></a>
      <a href="../Pages/Panier.php"><img height="27" src="../Images/Panier.png" alt="" hspace="0"></a>
    </div>     
  </div>
  

  <br>


  <form action="../Traitement/Traitement_negociation.php" method="POST">   


    <table class="table-bordered  table-striped" >

      <?php
      if((isset($_SESSION['ID'])))
      {


      $condition=0;
      $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
      $req = $bdd->prepare("SELECT ID FROM objets WHERE ID='".$ID_Objet."'");

      $req->execute();
      while ($data = $req->fetch()){

        $req2 = $bdd->prepare("SELECT ID_Client,ID_Objet FROM panier");
        $req2->execute();
        while ($data = $req2->fetch()){
          if(($data['ID_Client']==$_SESSION['ID'])&&($data['ID_Objet']==$ID_Objet))
          {
            $condition=1;
          }
        }
         $req2->closeCursor();;



        if($condition==0)
        {

          echo("jijij");
          $req4 = $bdd->prepare('INSERT INTO panier (ID_Client,ID_Objet) VALUES(?,?)');
          $req4->execute(array($_SESSION['ID'],$ID_Objet));
          $req4->closeCursor();
        }
      }
 header('location: ../Pages/index.php');
      $req->closeCursor();;

}
else
{
  header('location: ../Pages/connexion.php');
}
?>


    </table>

  </form>
</body>
</html>