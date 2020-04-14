<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../Style/Style_aff_obj.css">
<head>
	<title></title>
</head>
<body>


	<?php

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	$req = $bdd->prepare('SELECT Nom, Photo1_nom, Photo1_extension, Prix, Description FROM objets'); //ajouter LIMIT poour en prendre qu'un certain nombre & order bypour que ce soit les dernieres
	$req->execute();
	?><div id="derniersobj"><?php
		while ($data = $req->fetch()){
			echo '<div id="objet"><center><h3>'.$data['Nom'].'</h3><img src="../Objets/'.$data['Photo1_nom'].'.'.$data['Photo1_extension'].'" title="'.$data['Photo1_nom'].'" alt="'.$data['Nom'].'"><p id="Description">'.$data['Description'].'</p><h3>'.$data['Prix'].'</h3></center></div>';
	    }
	?></div><?php
    $req->closeCursor();
    ?>
    </body>
    </html>
