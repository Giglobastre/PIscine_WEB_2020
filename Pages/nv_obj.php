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
  <link rel="stylesheet" type="text/css" href="../Style/Style_nv_obj.css">
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
      <a href="index.php">Menu</a>
      <a href="Produit.php">Produit</a>
      <a href="negociations.php">Négociation</a>
      <a href="Contact.php">Contact</a>
      <a href="about.php">A propos d'ECEbay</a>
      <?php if(isset($_SESSION['type']) && $_SESSION['type']==1){ ?>
        <a class="active" href="nv_obj.php">Mettre en vente un objet</a>
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
<center>
	<form method="post" action="../Traitement/Traitement_nv_obj.php" enctype="multipart/form-data">
		<div class="cadre">
			<h3>Informations</h3>
			<label for="Nom">Nom : </label><input type="text" name="Nom"> <br/>
			<label for="Description">Description : </label><input type="text" name="Description"> <br/>
			<label for="Prix">Prix : </label><input type="number" name="Prix"> <br/>
		</div>
		<div class="cadre">
			<h3>Catégorie de l'objet</h3>
			<input type="radio" name="catégorie" id="féraille & trésor" value="1" checked>
			<label for="féraille & trésor">Féraille & Trésor</label><br/>
			<input type="radio" name="catégorie" id="bon pour le musée" value="2">
			<label for="bon pour le musée">Bon pour le musée</label><br/>
			<input type="radio" name="catégorie" id="Accessoire VIP" value="3">
			<label for="Accessoire VIP">Accessoire VIP</label><br/>
		</div>
		<div class="cadre">
			<h3>Type de vente</h3>
			<input type="radio" name="type_vente" id="enchere" value="0" checked>
			<label for="enchere">En vente aux enchères</label><br/>
			<input type="radio" name="type_vente" id="meilleur_prix" value="1">
			<label for="meilleur_prix">En vente à la negociation</label><br/>
		</div>
		<div class="cadre">
			<h3>Importer vos photos</h3>
			<p>Limité a 8Mo, format ".png, .jpg, .jpeg, .gif</p>
			<input type="file" name="photo1" accept=".png, .jpg, .jpeg, .gif" /><br />
			<input type="file" name="photo2" accept=".png, .jpg, .jpeg, .gif" /><br />
			<input type="file" name="photo3" accept=".png, .jpg, .jpeg, .gif" /><br />
			<h3>Importer une vidéo</h3>
			<input type="file" name="video" accept=".mp4, .ogg, .webm, .gif" /><br />
		</div>
		<input type="submit" value="Publier">
	</form>
</center>
</body>
</html>