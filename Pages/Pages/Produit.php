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
  <link rel="stylesheet" type="text/css" href="../Style/Style_produit.css">
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
      <a href="news.php">News</a>
      <a class="active" href="Produit.php">Produit</a>
      <a href="Contact.php">Contact</a>
      <a href="about.php">About</a>
    </div>
    <div style="float:right">
        
      <?php
      if(isset($_SESSION['ID'])){
        ?>
          <form method="post" action="../Traitement/Traitement_deco.php">
            <input type="submit" value="Deconnexion">
          </form>
        <?php
      }
      //RELIER LES FORM // remplacer par des <a> ??//////////////////////////////////////////////////////////////////////////////
      if(isset($_SESSION['type']) && $_SESSION['type']==0){//acheteur
        ?>
          <form method="post" action="">
            <input type="submit" name="submit_ach" value="Mes achats">
          </form>
        <?php
      }
      if(isset($_SESSION['type']) && $_SESSION['type']==1){//vendeur
        ?>
          <form method="post" action="">
            <input type="submit" name="submit_ach" value="Mes ventes">
          </form>
        <?php
      }
      if(isset($_SESSION['admin']) && $_SESSION['admin']==1){//admin
        ?>
          <form method="post" action="">
            <input type="submit" name="submit_ach" value="Administration">
          </form>
        <?php
      }
      ?>
      <?php
      if(isset($_SESSION['ID']) && $_SESSION['type']==0 && $_SESSION['admin']==0){//ach
        ?>
          <a href="Profil_Acheteur.php"><p>Ma page</p><img height="27" src="../Images/ImgAcoountConnexion.jpg" alt="" hspace="0"></a>
          <a href="Panier.php"><img height="27" src="../Images/Panier.png" alt="" hspace="0"></a>
        <?php
      }else if(isset($_SESSION['ID']) && $_SESSION['type']==1&& $_SESSION['admin']==0){//Vendeur
        ?>
          <a href="Profil_Acheteur.php"><p>Ma page</p><img height="27" src="../Images/ImgAcoountConnexion.jpg" alt="" hspace="0"></a>
          <?php
      }if(isset($_SESSION['ID']) && $_SESSION['admin']==1){//admin
        ?>
          <a href="Profil_Admin.php"><img height="27" src="../Images/ImgAcoountConnexionAdmin.jpg" alt="" hspace="0"></a>
          <?php
      }if(!isset($_SESSION['ID'])){
        ?>
          <a href="connexion.php"><img height="27" src="../Images/ImgAcoountSeConnecter.jpg" alt="" hspace="0"></a>
        <?php
      }
      ?>      
        
    </div>     
  </div>       
  
  <div style="padding-left:30px">

    <div id="searchbar">                
      <h1>Que voulez-vous rechercher ?</h1>
      <form action="" class="formulaire">
       <input class="champ" type="text" placeholder="ECEbay Search.."/>
       <input class="bouton" type="button" value="Rechercher" />         
     </form>
   </div> 
   
      <center>
   <h2>Catégories de produits</h2>
   <div style="width: 150px; height: 50px; overflow-y: scroll;">
    <a href="ProduitFerraille.php">Ferraille ou trésors<br /></a>
    <a href="ProduitMus%C3%A9e.php">Bon pour le musée<br /></a>
    <a href="ProduitVIP.php">Accessoire VIP<br /></a>
  </div>
          </center>
  <h2>Objets récements consultés</h2>
</div>
<div id="footer">
  Copiright &copy; 2020; 
  Clément Viéville - Hugo Teinturier - Kenny Huber
</div>
</body>
</html>