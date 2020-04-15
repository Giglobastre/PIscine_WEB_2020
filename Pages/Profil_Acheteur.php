<?php 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" type="image/jpg" href="logo%20Ebay%20ECE.JPG" />
	<link rel="stylesheet" type="text/css" href="../Style/Style_profil_acheteur.css">
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
      if(isset($_SESSION['ID'])){
      	?>
      	<a href="Client.php"><p>Ma page</p><img height="27" src="../Images/ImgAcoountConnexion.jpg" alt="" hspace="0"></a>
      	<a href="Panier.php"><img height="27" src="../Images/Panier.png" alt="" hspace="0"></a>
      	<?php
      }else{
      	?>
      	<a href="connexion.php"><p> Se connecter </p><img height="27" src="../Images/ImgAcoountConnexion.jpg" alt="" hspace="0"></a>
      	<?php
      }
      ?>
  </div>     
</div>     
<div style="padding-left:30px">
	<div id="searchbar">                
		<h2>Que voulez-vous rechercher ?</h2>
		<form action="" class="formulaire">
			<input class="champ" type="text" placeholder="ECEbay Search.."/>
			<input class="bouton" type="button" value="Rechercher" />         
		</form>
	</div>
</div>
<center><h2>Votre compte</h2></center>
<center><button id="bouton1">Mes informations</button>|<button id="bouton2">Informations de paiement</button></center>
<div id="Mes_infos">
      <form id="Mon_profil" action="">
            <label for="Pseudo">Pseudo : </label><input type="text" name="Pseudo">
            <label for="adresse">Adresse : </label><input type="text" name="adresse">
      </form>
</div>
<div>
      <form id="paiement" action="">
            <label for="N_carte">Numero : </label><input type="text" name="N_carte">
            <label for="Cryptogramme">Cryptogramme : </label><input type="text" name="Cryptogramme">
      </form>
</div>
</body>
</html>

<script type="text/javascript">
      //source : https://openclassrooms.com/forum/sujet/afficher-cacher-une-div-article-sectio-par-un-clic  : philiga
      //caché de base
      document.querySelector("#Mon_profil").style.display="none";
      document.querySelector("#paiement").style.display="none";
      document.querySelector("#bouton1").onclick = function() {
      if (window.getComputedStyle(document.querySelector('#Mon_profil')).display=='none'){
            document.querySelector("#Mon_profil").style.display="block";
            document.querySelector("#paiement").style.display="none";
      }else{
            document.querySelector("#Mon_profil").style.display="none";
      }
      }
      document.querySelector("#bouton2").onclick = function() {
      if (window.getComputedStyle(document.querySelector('#paiement')).display=='none'){
            document.querySelector("#paiement").style.display="block";
            document.querySelector("#Mon_profil").style.display="none";
      }else{
            document.querySelector("#paiement").style.display="none";
      }
      }
</script>