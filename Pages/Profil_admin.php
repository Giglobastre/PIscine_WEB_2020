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
<center><button id="bouton1">Mes informations</button> <button id="bouton2">Ventes</button> <button id="bouton3">Personalisation du site</button> <button id="bouton4">Vendeurs</button></center>
<center>
      <form id="Mes_infos" action="../Traitement/Traitement_profil_admin.php" method="post">
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
      <div id="Personalisation">
            <form action="../Traitement/Traitement_profil_admin.php" method="post" enctype="multipart/form-data">
                  <br/>
                  <p>Limité a 8Mo, format ".png, .jpg, .jpeg, .gif</p>
                  <h3>Photo de profil</h3>
                  <input type="file" name="profil" id="profil" accept=".png, .jpg, .jpeg, .gif" /><br />
                  <input type="submit" value="Upload">
            </form>
            <form action="../Traitement/Traitement_profil_admin.php" method="post" enctype="multipart/form-data">
                  <br/>
                  <p>Limité a 8Mo, format ".png, .jpg, .jpeg, .gif</p>
                  <h3>Photo de couverture</h3>
                  <input type="file" name="couverture" id="couverture" accept=".png, .jpg, .jpeg, .gif" /><br />
                  <input type="submit" value="Upload">
            </form>
      </div>
</center>
<center>
	<div id="mesobj">
		<h3>En vente</h3>
		<?php
			try{
				$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
			}
			catch (Exception $e){
				die('Erreur : ' . $e->getMessage());
			}
			$req = $bdd->prepare('SELECT ID,Nom,Prix,Description,Date_obj,Methode_vente,ID_V FROM objets');
			$req->execute();
			?><table class="table table-hover">
				<thead>
				    <tr>
				      <th scope="col">Nom</th>
				      <th scope="col">Prix</th>
                              <th scope="col">ID vendeur</th>
				      <th scope="col">Description</th>
				      <th scope="col">Date</th>
				      <th scope="col">Supprimer</th>
				    </tr>
  				</thead>
  					<tbody><?php
						while ($data = $req->fetch()){
							?>
							<tr>
						      	<td><?php echo $data['Nom']?></td>
						      	<td><?php echo $data['Prix']?></td>
                                                <td><?php echo $data['ID_V']?></td>
						      	<td><?php echo $data['Description']?></td>
						      	<td><?php echo $data['Date_obj']?></td>
						      	<td>
						      		<form method="post" action="../Traitement/Traitement_profil_admin.php">
						      			<input type="hidden" name="id_sup" id="id_sup" value="<?php echo $data['ID']?>">
						      			<input type="hidden" name="mv_sup" id="mv_sup" value="<?php echo $data['Methode_vente']?>">
						      			<input type="hidden" name="date_sup" id="date_sup" value="<?php echo $data['Date_obj']?>">
						      			<input type="submit" name="Supprimer" value="Supprimer">
						      		</form>
						      	</td>
						    </tr>
						    <?php
						}
					?></tbody>
			</table><?php
			$req->closeCursor();
		?>
		<h3>Vendu</h3>
	</div>
</center>
<center>
      <div id="vendeurs">
            <h3>Vendeurs</h3>
            <?php
                  try{
                        $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
                  }
                  catch (Exception $e){
                        die('Erreur : ' . $e->getMessage());
                  }
                  $req = $bdd->prepare('SELECT ID,Nom,Prenom,Pseudo FROM utilisateurs WHERE Type=1 AND Admin=0');
                  $req->execute();
                  ?><table class="table table-hover">
                        <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Nom</th>
                              <th scope="col">Prenom</th>
                              <th scope="col">Pseudo</th>
                              <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                              <tbody><?php
                                    while ($data = $req->fetch()){
                                          ?>
                                          <tr>
                                                <td><?php echo $data['ID']?></td>
                                                <td><?php echo $data['Nom']?></td>
                                                <td><?php echo $data['Prenom']?></td>
                                                <td><?php echo $data['Pseudo']?></td>
                                                <td>
                                                      <form method="post" action="../Traitement/Traitement_profil_admin.php">
                                                            <input type="hidden" name="id_ven" id="id_ven" value="<?php echo $data['ID']?>">
                                                            <input type="submit" name="Supprimer" value="Supprimer">
                                                      </form>
                                                </td>
                                        </tr>
                                        <?php
                                    }
                              ?></tbody>
                  </table><?php
                  $req->closeCursor();
            ?>
      </div>
</center>
</body>
</html>


<script type="text/javascript">
      //source : https://openclassrooms.com/forum/sujet/afficher-cacher-une-div-article-sectio-par-un-clic  : philiga
      //caché de base
      document.querySelector("#Mes_infos").style.display="none";
      document.querySelector("#mesobj").style.display="none";
      document.querySelector("#Personalisation").style.display="none";
      document.querySelector("#vendeurs").style.display="none";
      document.querySelector("#bouton1").onclick = function() {
            if (window.getComputedStyle(document.querySelector('#Mes_infos')).display=='none'){
                  document.querySelector("#Mes_infos").style.display="block";
                  document.querySelector("#mesobj").style.display="none";
                  document.querySelector("#Personalisation").style.display="none";
                  document.querySelector("#vendeurs").style.display="none";

            }else{
                  document.querySelector("#Mes_infos").style.display="none";
            }
      }
      document.querySelector("#bouton2").onclick = function() {
            if (window.getComputedStyle(document.querySelector('#mesobj')).display=='none'){
                  document.querySelector("#mesobj").style.display="block";
                  document.querySelector("#Mes_infos").style.display="none";
                  document.querySelector("#Personalisation").style.display="none";
                  document.querySelector("#vendeurs").style.display="none";

            }else{
                  document.querySelector("#mesobj").style.display="none";
            }
      }
      document.querySelector("#bouton3").onclick = function() {
            if (window.getComputedStyle(document.querySelector('#Personalisation')).display=='none'){
                  document.querySelector("#mesobj").style.display="none";
                  document.querySelector("#Mes_infos").style.display="none";
                  document.querySelector("#Personalisation").style.display="block";
                  document.querySelector("#vendeurs").style.display="none";

            }else{
                  document.querySelector("#Personalisation").style.display="none";
            }
      }
      document.querySelector("#bouton4").onclick = function() {
            if (window.getComputedStyle(document.querySelector('#vendeurs')).display=='none'){
                  document.querySelector("#mesobj").style.display="none";
                  document.querySelector("#Mes_infos").style.display="none";
                  document.querySelector("#Personalisation").style.display="none";
                  document.querySelector("#vendeurs").style.display="block";

            }else{
                  document.querySelector("#vendeurs").style.display="none";
            }
      }
</script>