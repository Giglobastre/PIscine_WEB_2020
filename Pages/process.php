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
  <link rel="stylesheet" type="text/css" href="../Style/Style_index.css">
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

<h1> Recapitulatif</h1>
<table class="table table-bordered table-striped table-dark">

	<tr class="panier">
		<td class="espace">Nom produit</td>
		<td class="espace">reference</td>
		<td class="espace">Type achat</td>
		<td class="espace">Prix</td>
	</tr>
	
	<?php 

	$total=0;
	$condition=0;
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');

		$req = $bdd->prepare("SELECT ID_Client ,ID_Objet,Acquereur,ID_transac FROM panier"); 
		$req->execute();

		while ($data = $req->fetch()){
			?><tr><?php
			if(($data['ID_Client']==$_SESSION['ID'])&&($data['Acquereur']==3))
			{
				$condition=1;

				$req2 = $bdd->prepare("SELECT ID,Prix,Nom,Methode_vente FROM objets WHERE ID='".$data['ID_Objet']."'"); 
				$req2->execute();

				while ($data = $req2->fetch())
				{
					$total=(($data['Prix'])*3)+$total;?>
					<tr>
						<td><?php echo $data['Nom'];?></td>
						<td><?php echo $data['ID'];?></td>


						<td>Achat immediat</td><?php
						?>
						<td><?php echo ($data['Prix']*3);?></td>
						</tr><?php
					}
					$req2->closeCursor();;
				}
			}

			?>
			<tr>
				<td></td>
				<td></td>
				<td class="grey">Total</td>
				<td class="grey"><?php echo $total;?></td>
			</tr>
		</table>
		<center>
			<table>
				<form action="../Traitement/Traitement_adresse.php"method="post">
				<fieldset>
					<tr>
					<td><legend> <b>Votre adresse de livraison</b> </legend></td>
				</tr>
				<tr>
					<td><input type="text" name="adresse" placeholder="Adresse "></td>
				</tr>
				<tr>
					<td><input type="text" name="ville" placeholder="Ville "></td>
				</tr>
				<tr>
					<td><input type="text" name="code" placeholder="Code postal "></td>
				</tr>
				<tr>
					<td><input type="text" name="pays" placeholder="Pays "></td>
				</tr>
				<tr>
					<td><input type="text" name="tel" placeholder="tel "></td>
				</tr>
				<tr>
					<td><input type="submit" name="Valider" ></td>
				</tr>
					
				<?php
				if($_SESSION['Test']==1)
				{?>
					<tr>
						<td>Veuillez remplir tous les champs</td>
						</tr><?php
				}?>
				</fieldset>
</form>
				<?php
				$_SESSION['Test']=0;


			}
			catch (Exception $e){
				die('Erreur : ' . $e->getMessage());
			}
			
			?>
		</tr>
	</table></center>
	<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
	<div id="footer">
		Copyright &copy; 2020; 
		Clément Viéville - Hugo Teinturier - Kenny Huber
	</div>
</body>
</html>