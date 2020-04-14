
<?php 
session_start();

$_SESSION['ID_Objet']=1;///a recuperer formulaire
$_SESSION['ID_Client']=3;//varibale de ssesion
$prixdonne=700; ///a recuperer par formulaire
$ID_chg=0;

$nvprix=0;
$prixmax=0;
$compteur=0;
$prixbase=0;



$condition=0;
try{
	$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');

	$req = $bdd->prepare("SELECT ID,Methode_vente,Prix_max,Prix FROM objets WHERE ID='".$_SESSION['ID_Objet']."'"); 
	$req->execute();
	echo("kkk");
	while ($data = $req->fetch()){

		if($data['ID']==$_SESSION['ID_Objet'])
		{
			echo '<h3>'.$data['Methode_vente'].'</h3>';
			$prixbase=$data['Prix'];
			if($data['Methode_vente']==false)
			{

				if($data['Prix']<$prixdonne)
				{
					$req3 = $bdd->prepare("SELECT Prix_max,ID_Client FROM panier WHERE ID_Objet='".$_SESSION['ID_Objet']."'");
					$req3->execute();
					echo ("prix donne");
					echo $prixdonne;
					
					while ($data = $req3->fetch())
					{
						$compteur=1;
						if($data['Prix_max']>$prixmax)
						{
							$ID_chg=$data['ID_Client'];
							$prixmax=$data['Prix_max'];
							echo("prixmax");
							echo $prixmax;
						}
					}
					$req3->closeCursor();;

					if($compteur==0)
					{
						$nvprix=$prixbase;
						$req7 = $bdd->prepare('INSERT INTO panier (ID_Client,ID_Objet,Prix_max,Acquereur) VALUES(?,?,?,?)');
						$req7->execute(array($_SESSION['ID_Client'],$_SESSION['ID_Objet'],$prixdonne,TRUE));
						$req7->closeCursor();
					}
					else
					{


						if($prixmax>$prixdonne)
						{
							echo("huhu");
							echo $ID_chg;
							$req5 = $bdd->prepare("UPDATE panier SET Acquereur= TRUE WHERE ID_Client='".$ID_chg."'"); 
							$req5->execute();
							$req5->closeCursor();;
							$nvprix=$prixdonne+1;
							$req4 = $bdd->prepare('INSERT INTO panier (ID_Client,ID_Objet,Prix_max) VALUES(?,?,?)');
							$req4->execute(array($_SESSION['ID_Client'],$_SESSION['ID_Objet'],$prixdonne));
							$req4->closeCursor();

						}
						else
						{
							$req5 = $bdd->prepare("UPDATE panier SET Acquereur= FALSE WHERE ID_Client='".$ID_chg."'"); 
							$req5->execute();
							$req5->closeCursor();;
							echo("mm");
							$nvprix=$prixmax+1;

							
							echo("mm");
							$req8 = $bdd->prepare('INSERT INTO panier (ID_Client,ID_Objet,Prix_max,Acquereur) VALUES(?,?,?,?)');
							$req8->execute(array($_SESSION['ID_Client'],$_SESSION['ID_Objet'],$prixdonne,TRUE));
							$req8->closeCursor();
						}
						

					}
					echo("nvprix");
					echo $nvprix;

					

					$req2 = $bdd->prepare("UPDATE objets SET Prix= $nvprix WHERE ID=".$_SESSION['ID_objet'].""); 
					$req2->execute();
					$req2->closeCursor();;
					echo("j"); 
				}
				else
				{
					echo("il ya deja une offre plus eleve");
				}

			}
			else
			{
				echo("lll");

			}


		}
	}




	$req->closeCursor();;
}
catch (Exception $e){

	die('Erreur : ' . $e->getMessage());
}

?> 
