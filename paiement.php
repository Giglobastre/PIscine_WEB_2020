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
<br> <br> <br> 
    <center >
    <form class="form" action="../Traitement/Traitement_paiement.php" method="POST">
        <table >
            <tr>
            <td >Nom sur la carte</td>
            <td> <input type="text" name="nom"></td>
        </tr>
        <tr>
            <td >Prenom sur la carte </td>
            <td> <input type="text" name="prenom"></td>
        </tr>
        <tr>
            <td >Numero de carte</td>
            <td> <input type="text" name="numero"></td>
        </tr>
        <tr>
            <td> Date expiration </td>
            <td> <input type="text" name="date"></td>
        </tr>

        <tr>
            <td >CVV </td>
            <td> <input type="password" name="cvv"></td>
        </tr>
        
        <tr>
        </tr>
        <tr>
        <p><input type="radio" name="type" value="1" checked> Visa <input type="radio" name="type" value="0" > American express<input type="radio" name="type" value="3" > Mastercard</p><input type="radio" name="type" value="4" > Paypal</p>
    </tr>
        <tr>
            <td></td>
            <td><button  type="submit" name="button1" value="submit">Valider</button></td>
        </tr>
        <?php
        if($_SESSION['Test']==1)
        {?>
          <tr>
            <td>Veuillez remplir tous les champs</td>
            </tr><?php
        }?><?php
        if($_SESSION['Test']==2)
        {?>
          <tr>
            <td>Carte inexistante</td>
            </tr><?php
        }

        $_SESSION['Test']=0;?>



    </table>
    </form>

</center>

</body>

</html>