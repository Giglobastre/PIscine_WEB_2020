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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="icon" type="image/jpg" href="../Images/logo%20Ebay%20ECE.JPG" />
  <link rel="stylesheet" type="text/css" href="../Style/Style_profil_acheteur.css">
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
      ?>
    </div>
  </div>       
  <br /> 
<center><h2>Votre compte</h2></center>
<center><button id="bouton1">Mes informations</button> <button id="bouton2">Informations de paiement</button> <button id="bouton3">Personalisation du site</button></center>
<center>
      <form id="Mes_infos" action="../Traitement/Traitement_profil_acheteur.php" method="post">
            <div class="form-row">
                  <div class="form-group col-md-4">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" placeholder="Pseudo" name="pseudo">
                  </div>
                  <div class="form-group col-md-8">
                        <label for="adresse1">Adresse 1</label>
                        <input type="text" class="form-control" id="adresse1" placeholder="11 rue sextius michel" name="adresse1">
                  </div> 
            </div>
            <div class="form-row">
                  <div class="form-group col-md-4">
                        <label for="mdp">Nouveau mot de passe</label>
                        <input type="text" class="form-control" id="mdp" placeholder="Nouveau mot de passe" name="mdp">
                  </div>
                  <div class="form-group col-md-8">
                        <label for="adresse2">Adresse 2</label>
                        <input type="text" class="form-control" id="adresse2" placeholder="Adresse 2" name="adresse2">
                  </div>
            </div>
            <div class="form-row">
                  <div class="form-group col-md-4">
                        <label for="mdpc">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="mdpc" placeholder="Confirmation" name="mdpc">
                  </div>
                  <div class="form-group col-md-8">
                        <label for="tel">Téléphone</label>
                        <input type="text" class="form-control" id="tel" placeholder="+33 x xx xx xx xx" name="tel">
                  </div>
            </div>
            <div class="form-row">
                  <div class="form-group col-md-4">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" id="ville" placeholder="Paris" name="ville">
                  </div>
                  <div class="form-group col-md-4">
                        <label for="pays">Pays</label>
                        <input type="text" class="form-control" id="pays" placeholder="France" name="pays">
                  </div>
                  <div class="form-group col-md-4">
                        <label for="cp">Code postal</label>
                        <input type="text" class="form-control" id="cp" placeholder="75015" name="cp">
                  </div>
            </div>
            <button type="submit" class="btn btn-secondary btn-lg btn-block">Mettre à jour les données</button>
      </form>
</center>
<center>
      <form id="paiement" action="../Traitement/Traitement_profil_acheteur.php" method="post">
            <div class="form-group">
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="type" id="mastercard" value="3" checked>
                      <label class="form-check-label" for="mastercard">Mastercard</label> 
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="type" id="amex" value="0">
                      <label class="form-check-label" for="amex">Amex</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="type" id="visa" value="1">
                      <label class="form-check-label" for="visa">Visa</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="type" id="paypal" value="4">
                      <label class="form-check-label" for="paypal">Paypal</label>
                  </div>
            </div>
            <div class="form-group">
                  <label for="cb_prenom">Prenom</label>
                  <input type="text" class="form-control" id="cb_prenom" placeholder="prenom" name="cb_prenom">
            </div>
            <div class="form-group">
                  <label for="cb_nom">Nom</label>
                  <input type="text" class="form-control" id="cb_nom" placeholder="Nom" name="cb_nom">
            </div>
            <div class="form-group">
                  <label for="cb_date">Date</label>
                  <input type="date" class="form-control" id="cb_date" placeholder="Date" name="cb_date">
            </div>
            <div class="form-group">
                  <label for="cb_cvv">CVV</label>
                  <input type="number" class="form-control" id="cb_cvv" placeholder="CVV" name="cb_cvv">
            </div>
            <div class="form-group">
                  <label for="cb_n">Numero</label>
                  <input type="number" class="form-control" id="cb_n" placeholder="Numero de carte" name="cb_n">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>
</center>
<center>
      <div id="Personalisation">
            <form action="../Traitement/Traitement_profil_acheteur.php" method="post" enctype="multipart/form-data">
                  <br/>
                  <p>Limité a 8Mo, format ".png, .jpg, .jpeg, .gif</p>
                  <h3>Photo de profil</h3>
                  <input type="file" name="profil" id="profil" accept=".png, .jpg, .jpeg, .gif" /><br />
                  <input type="submit" value="Upload">
            </form>
            <form action="../Traitement/Traitement_profil_acheteur.php" method="post" enctype="multipart/form-data">
                  <br/>
                  <p>Limité a 8Mo, format ".png, .jpg, .jpeg, .gif</p>
                  <h3>Photo de couverture</h3>
                  <input type="file" name="couverture" id="couverture" accept=".png, .jpg, .jpeg, .gif" /><br />
                  <input type="submit" value="Upload">
            </form>
      </div>
</center>
</body>
</html>


<script type="text/javascript">
      //source : https://openclassrooms.com/forum/sujet/afficher-cacher-une-div-article-sectio-par-un-clic  : philiga
      //caché de base
      document.querySelector("#Mes_infos").style.display="none";
      document.querySelector("#paiement").style.display="none";
      document.querySelector("#Personalisation").style.display="none";
      document.querySelector("#bouton1").onclick = function() {
            if (window.getComputedStyle(document.querySelector('#Mes_infos')).display=='none'){
                  document.querySelector("#Mes_infos").style.display="block";
                  document.querySelector("#paiement").style.display="none";
                  document.querySelector("#Personalisation").style.display="none";
            }else{
                  document.querySelector("#Mes_infos").style.display="none";
            }
      }
      document.querySelector("#bouton2").onclick = function() {
            if (window.getComputedStyle(document.querySelector('#paiement')).display=='none'){
                  document.querySelector("#paiement").style.display="block";
                  document.querySelector("#Mes_infos").style.display="none";
                  document.querySelector("#Personalisation").style.display="none";
            }else{
                  document.querySelector("#paiement").style.display="none";
            }
      }
      document.querySelector("#bouton3").onclick = function() {
            if (window.getComputedStyle(document.querySelector('#Personalisation')).display=='none'){
                  document.querySelector("#paiement").style.display="none";
                  document.querySelector("#Mes_infos").style.display="none";
                  document.querySelector("#Personalisation").style.display="block";
            }else{
                  document.querySelector("#Personalisation").style.display="none";
            }
      }
</script>