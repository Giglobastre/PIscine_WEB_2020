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
      <a class="active" href="index.php">Menu</a>
      <a href="Produit.php">Produit</a>
      <a href="commentaires.php">comm</a>
      <a href="negociations.php">Négociation</a>
      <a href="Contact.php">Contact</a>
      <a href="about.php">A propos d'ECEbay</a>
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
  <br />

  <div>
    <marquee align="center" height="250" scrolldelay="15" scrollamount="15" onmouseout="this.start()" onmouseover="this.stop()"> 
      <p>
            <a href="ProduitFerraille.php"><img src="../Images/pub2.JPG" height=250 width=800></a>
            <a href="ProduitVIP.php"><img src="../Images/pub1.JPG" height=250 width=800></a>
            <a href="ProduitMus%C3%A9e.php"><img src="../Images/pub3.JPG" height=250 width=800></a>        
      </p>
    </marquee>
  </div>

  <div  style="padding-left:430px">
    <meta charset="utf-8">

    <div id="derniersobj">
      <div  style="padding-left:200px">

        <form method="GET">
          <br/>
          <input type="search" name="q" placeholder="ECEbay Search.." />
          <input type="submit" value="Rechercher" />
        </form>
      </div>

      <?php 
      $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
      $objets = $bdd->query('SELECT Nom FROM objets ORDER BY ID DESC');
        if(!empty($_GET['q'])) {
          ?>
          <br/>
          <h3><b>Résultat de votre recherche</b></h3>
          <br/>
          <?php 
          $q = htmlspecialchars($_GET['q']);
          $objets = $bdd->query('SELECT ID,Nom, Photo1_nom, Photo1_extension, Prix, Description FROM objets WHERE Nom LIKE "%'.$q.'%" ORDER BY ID DESC');
          while ($data = $objets->fetch()){
            echo '<div id="objet">
            <center>
            <h3><b>'.$data['Nom'].'</b></h3>
            <form method="post" action="objet.php">
            <input type="hidden" name="ID_obj" value="'.$data['ID'].'"/>
            <input type="image" height=200 src="../Objets/'.$data['Photo1_nom'].'.'.$data['Photo1_extension'].'"/>
            </form>
            <p><span style="border: 1px solid grey;" id="Description">'.$data['Description'].'</span></span></p>
            <h3><b>'.$data['Prix'].' €</b><a href="Favoris.php"><img src="../Images/coeur.png" height=35 width=65></a></h3>            
            </center>
            </div>
            <br/>
            ';
          }
        }else if(isset($_GET['q']) && !empty($_GET['q'])){ ?>
          <p style="color:#FF0000";>Aucun résultat pour votre recherche comprenant : <?= $q ?>..</p>    
        <?php } ?>
    </div>
  </div>

  <div style="padding-left:430px">
    <div style="padding-left:130px">
      <h2><b>Objets récements consultés</b></h2>
    </div>

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
    <h3><b>'.$data['Nom'].'</b></h3>
    <form method="post" action="objet.php">
    <input type="hidden" name="ID_obj" value="'.$data['ID'].'"/>
    <input type="image" height=200 src="../Objets/'.$data['Photo1_nom'].'.'.$data['Photo1_extension'].'"/>
    </form>
    <p><span style="border: 1px solid grey;" id="Description">'.$data['Description'].'</span></span></p>
    <h3><b>'.$data['Prix'].' €</b><a href="Favoris.php"><img src="../Images/coeur.png" height=35 width=65></a></h3>            
    </center>
    </div>
    <br/>
    ';
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