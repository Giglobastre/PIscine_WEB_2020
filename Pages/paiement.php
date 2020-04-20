<?php 
session_start();
$_SESSION['Test']=0;

try{
  $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
}
catch (Exception $e){
  die('Erreur : ' . $e->getMessage());
}

if(isset($_SESSION['ID'])){
  $req15=$bdd->prepare('SELECT Photo_nom, Photo_extension, Background_nom, Background_extension FROM utilisateurs WHERE ID="'.$_SESSION['ID'].'"');
  $req15->execute();
  while ($data = $req15->fetch()){
    if(isset($data['Photo_nom']) && isset($data['Photo_extension'])){
      $PP="../Profil/".$data['Photo_nom'].".".$data['Photo_extension'];
    }
    if(isset($data['Background_nom']) && isset($data['Background_extension'])){
      $BG="../Profil/".$data['Background_nom'].".".$data['Background_extension'];
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="icon" type="image/jpg" href="../Images/logo%20Ebay%20ECE.JPG" />
  <link rel="stylesheet" type="text/css" href="../Style/Style_process.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
</head>
<body>

  <style type="text/css">
    <?php if(isset($BG)){ 
      ?>body{background-image: url("<?php echo $BG; ?>");}<?php
    } ?>
  </style>

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
      <?php if(isset($_SESSION['type']) && $_SESSION['type']==1){ ?>
        <a href="nv_obj.php">Mettre en vente un objet</a>
        <?php } ?>
      </div>
      <div style="float:right" id="boutons">
        <?php
        if(isset($_SESSION['ID'])){
          ?>
          <form method="post" action="../Traitement/Traitement_deco.php">
            <input type="submit" name="submit_ach" value="Deconnexion">
          </form>
          <?php
        }
        ?>
        <?php
      if(isset($_SESSION['ID']) && $_SESSION['type']==0 && $_SESSION['admin']==0){//ach
        ?>
        <?php if(isset($PP)) { ?>
          <a href="Profil_Acheteur.php"><p>Mon compte</p><img height="27" src="<?php echo $PP; ?>" alt="" hspace="0"></a>
        <?php } else { ?>
          <a href="Profil_Acheteur.php"><p>Mon compte</p><img height="27" src="ImgAcoountSeConnecter.jpg" alt="" hspace="0"></a>
        <?php } ?>
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

      $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
      $req6 = $bdd->prepare("SELECT ID_client FROM cb_client "); 
      $req6->execute();

      while ($data = $req6->fetch()){
        if($data['ID_client']==$_SESSION['ID'])
        {
          $condition=1;

          $req6 = $bdd->prepare("SELECT ID_Objet FROM panier WHERE Acquereur=3 AND ID_Client='".$_SESSION['ID']."'"); 
          $req6->execute();
          while ($data = $req6->fetch()){
            $req15 = $bdd->query('DELETE FROM objets WHERE ID="'.$data['ID_Objet'].'"');
            $req15->closeCursor();
          }

          $req5 = $bdd->prepare("UPDATE panier SET Acquereur= 4 WHERE Acquereur=3 AND ID_Client='".$_SESSION['ID']."'" );
          $req5->execute();
          $req5->closeCursor();;
          header('location: ../Pages/MailConfirmation.php');
        }
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

      <div class="g-recaptcha" data-sitekey="6LdydOsUAAAAADa_QNiVVPb4uM81sl3WRViey2rr"></div>
    </form>
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