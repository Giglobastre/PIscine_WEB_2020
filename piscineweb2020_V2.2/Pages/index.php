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
  <link rel="stylesheet" type="text/css" href="../Style/Style_index.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
</head>
<body>
  
  <div id="header">
    <img src="../Images/logo%20Ebay%20ECE.JPG" height="40" width="160"> 
  </div>
  
  <div class="topnav">
    <div style="float:left">
      <a class="active" href="index.php">Home</a>
      <a href="news.php">News</a>
      <a href="Produit.php">Produit</a>
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
          <a href="Profil_Admin.php"><p>Ma page</p><img height="27" src="../Images/ImgAcoountConnexion.jpg" alt="" hspace="0"></a>
          <?php
      }if(!isset($_SESSION['ID'])){
        ?>
          <a href="connexion.php"><p> Se connecter </p><img height="27" src="../Images/ImgAcoountConnexion.jpg" alt="" hspace="0"></a>
        <?php
      }
      ?>
    </div>
      
        
  </div>       
  <br />
  <div style="padding-left:30px">
    <div id="searchbar">                
      <form action="" class="formulaire">
       <input class="champ" type="text" placeholder="ECEbay Search.."/>
       <input class="bouton" type="button" value="Rechercher" />         
     </form>
   </div>
 </div>
 <div>
  <marquee align="center" height="250" scrolldelay="15" scrollamount="15" onmouseout="this.start()" onmouseover="this.stop()"> 
    <p>  
      <a href="ProduitFerraille.php"><img src="../Images/pub2.JPG" height=250 width=800></a>
      <a href="ProduitVIP.php"><img src="../Images/pub1.JPG" height=250 width=800></a>
      <a href="ProduitMus%C3%A9e.php"><img src="../Images/pub3.JPG" height=250 width=800></a>
      <a href="ProduitFerraille.php"><img src="../Images/pub2.JPG" height=250 width=800></a>
      <a href="ProduitVIP.php"><img src="../Images/pub1.JPG" height=250 width=800></a>
      <a href="ProduitMus%C3%A9e.php"><img src="../Images/pub3.JPG" height=250 width=800></a>      
      <a href="ProduitFerraille.php"><img src="../Images/pub2.JPG" height=250 width=800></a>
      <a href="ProduitVIP.php"><img src="../Images/pub1.JPG" height=250 width=800></a>
      <a href="ProduitMus%C3%A9e.php"><img src="../Images/pub3.JPG" height=250 width=800></a>      
      <a href="ProduitFerraille.php"><img src="../Images/pub2.JPG" height=250 width=800></a>
      <a href="ProduitVIP.php"><img src="../Images/pub1.JPG" height=250 width=800></a>
      <a href="ProduitMus%C3%A9e.php"><img src="../Images/pub3.JPG" height=250 width=800></a>      
      <a href="ProduitFerraille.php"><img src="../Images/pub2.JPG" height=250 width=800></a>
      <a href="ProduitVIP.php"><img src="../Images/pub1.JPG" height=250 width=800></a>
      <a href="ProduitMus%C3%A9e.php"><img src="../Images/pub3.JPG" height=250 width=800></a>     
      <a href="ProduitFerraille.php"><img src="../Images/pub2.JPG" height=250 width=800></a>
      <a href="ProduitVIP.php"><img src="../Images/pub1.JPG" height=250 width=800></a>
      <a href="ProduitMus%C3%A9e.php"><img src="../Images/pub3.JPG" height=250 width=800></a>      
      <a href="ProduitFerraille.php"><img src="../Images/pub2.JPG" height=250 width=800></a>
      <a href="ProduitVIP.php"><img src="../Images/pub1.JPG" height=250 width=800></a>
      <a href="ProduitMus%C3%A9e.php"><img src="../Images/pub3.JPG" height=250 width=800></a>
    </p>
  </marquee>
</div>
    
<div style="padding-left:30px">
  <h2>Objets récements consultés</h2>
  
  <?php
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
  }
  catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
  $req = $bdd->prepare('SELECT ID,Nom, Photo1_nom, Photo1_extension, Prix, Description FROM objets'); //ajouter LIMIT poour en prendre qu'un certain nombre & order bypour que ce soit les dernieres
  $req->execute();
  ?><div id="derniersobj"><?php
  while ($data = $req->fetch()){
    echo '<div id="objet">
            <center>
              <h3>'.$data['Nom'].'</h3>
              <form method="post" action="objet.php">
                <input type="hidden" name="ID_obj" value="'.$data['ID'].'"/>
                <input type="image" height=350 src="../Objets/'.$data['Photo1_nom'].'.'.$data['Photo1_extension'].'"/>
              </form>
              <p id="Description">'.$data['Description'].'</p>
              <h3>'.$data['Prix'].'</h3>
            </center>
          </div>';
  }
  ?></div><?php
  $req->closeCursor();
  ?>

</div>

<div id="footer">
  Copyright &copy; 2020; 
  Clément Viéville - Hugo Teinturier - Kenny Huber
</div>
</body>
</html>