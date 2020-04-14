<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../Style/Style_nv_obj.css">
<head>
	<title></title>
</head>
<body>
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