<!DOCTYPE html>
<html>
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
	$req = $bdd->query('SELECT ID,Date_obj,Photo1_nom,Photo1_extension,Photo2_nom,Photo2_extension,Photo3_nom,Photo3_extension,Methode_vente FROM objets');
	while ($data = $req->fetch()){
		if($data['Methode_vente']==0){//enchere
			$heureobj=substr($data['Date_obj'],11,2);//heure
			$jourobj=substr($data['Date_obj'],8,2);//jour
			$heureact=date('H');
			$jouract=date('j');
			if($heureobj==$heureact && $jouract==$jourobj+3){//3j d'enchere = fin
				$req2 = $bdd->query('SELECT ID_transac FROM panier WHERE ID_objet="'.$data['ID'].'" AND Acquereur=1');
				while ($data2 = $req->fetch()){
					//envvoyer le mail en mettant +x jours pour la livraison
					$req3 = $bdd->query('DELETE FROM objets WHERE ID_objet="'.$data2['ID'].'" AND Acquereur=1');
					$req3->closeCursor();
				}
				$req2->closeCursor();
			}
		}
	}
	$req->closeCursor();
	$req4 = $bdd->query('SELECT ID_nego,ID_client,ID_objet,ID_vendeur FROM negociations WHERE Acquereur=1');
	while ($data4 = $req->fetch()){
		//envvoyer le mail en mettant +x jours pour la livraison
		$req5 = $bdd->query('DELETE FROM objets WHERE ID="'.$data4['ID_objet'].'"');
		$req5->closeCursor();
	}
	$req4->closeCursor();
	header('location: index.php')
	?>
</body>
</html>