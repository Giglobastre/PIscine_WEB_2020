<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php session_start();
	$mail=0;
	$header="MIME-Version: 1.0\r\n";
	$header.='From: "ECEbay confirmation de votre commande"<support@gmail.com>'."\n";
	$header.='Content-Type:text/html; charset="uft-8"'."\n";
	$header.='Content-Transfer-Encoding: 8bit';
	$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
	$req6= $bdd->prepare("SELECT ID,Mail, FROM utilisateurs WHERE ID='".$_SESSION['ID']."'"); 
	$req6->execute();
	while ($data = $req6->fetch()){
		$mail=$data['Mail'];
	}
	$req6->closeCursor();;
	$req5= $bdd->prepare("SELECT ID_Client,ID_Objet,Acquereur,ID_transac,Prix_max,Nom FROM panier"); 
	$req5->execute();
	while ($data = $req5->fetch()){
		if(($data['ID_Client']==$_SESSION['ID'])&&($data['Acquereur']==4))
		{
			$message='
			<html>
			<body>
			<div align="center">
			<br />
			<a>Voici votre bon de commande d\'un montant de :</a>
			<td>'.$data['Prix_max'].'€.</td>
			<td>'.$data['Nom'].'</td>
			<br />
			</div>
			</body>
			</html>
			';			
		}   
	}
	mail($mail, "ECEbay confirmation de votre commande", $message, $header);
	$msg="Votre message a bien été envoyé !";

	?>
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

				$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
				$req6= $bdd->prepare("SELECT ID,Mail, FROM utilisateurs WHERE ID='".$_SESSION['ID']."'"); 
				$req6->execute();
				while ($data = $req6->fetch()){
					$mail=$data['Mail'];
				}
				$req6->closeCursor();;
				$req5= $bdd->prepare("SELECT ID_Client,ID_Objet,Acquereur,ID_transac,Prix_max,Nom FROM panier"); 
				$req5->execute();
				while ($data = $req5->fetch()){
					if(($data['ID_Client']==$_SESSION['ID'])&&($data['Acquereur']==4))
					{
						$message='
						<p> vous avez gagner une enchère !</p>
						';			
					}   
				}
				mail($mail, "ECEbay confirmation de votre commande", $message, $header);
				$msg="Votre message a bien été envoyé !";

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