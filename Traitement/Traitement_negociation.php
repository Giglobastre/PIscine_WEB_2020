<html>
<?php 
session_start();
$objet=$_POST['ID_obj'];
$_SESSION['ID'];
$prixdonne=$_POST['prixdonne'];
$accept=$_POST['type'];

$ID_Client=2;
$cond=0;
$condition=0;
if((empty($prixdonne)==true)&&($accept==0))
{
	header('Location: ../Pages/negociations.php');
}
else
{
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');

		$req = $bdd->prepare("SELECT CPT,ID_Client,ID_Vendeur,Coffre,Offre FROM negociations WHERE ID_Objet='".$objet."'"); 
		$req->execute();

		$req10 = $bdd->prepare("SELECT ID_V FROM objets WHERE ID='".$objet."'"); 
		$req10->execute();
		while ($data = $req10->fetch()){


			$ID_Vendeur=$data['ID_V'];


		}
		$req10->closeCursor();

		
		while ($data = $req->fetch()){


			$condition=$data['CPT'];
			$ID_Client=$data['ID_Client'];
			

		}

		
		if($condition<10)

			if($condition==0)
			{
				
				$req2 = $bdd->prepare('INSERT INTO negociations(ID_Objet,ID_Client,Offre,ID_Vendeur) VALUES(?,?,?,?)');
				$req2->execute(array($objet,$_SESSION['ID'],$prixdonne,$ID_Vendeur));
				$req2->closeCursor();
				
			}
			else
			{

				if($condition%2==1)
				{
					
					if($accept==1 )
					{
						
					$req15 = $bdd->query('DELETE FROM objets WHERE ID="'.$objet.'"');
					$req15->closeCursor();
					
					$req5 = $bdd->prepare("UPDATE negociations SET CPT= 10,Acquereur=TRUE,Prix_final=Offre WHERE ID_Objet='".$objet."'");
					$req5->execute();
					$req5->closeCursor();;
					$cond=10;
					

				}
				if($accept==0)
				{
					
					$req6 = $bdd->prepare("UPDATE negociations SET Coffre= '".$prixdonne."' WHERE ID_Objet='".$objet."'");
					$req6->execute();
					$req6->closeCursor();;

				}
			}
			echo("test1");
			if($condition%2==0)
			{
				echo("paire");
				if($accept==1)
				{
					

					$req15 = $bdd->query('DELETE FROM objets WHERE ID="'.$objet.'"');
					$req15->closeCursor();
					$req5 = $bdd->prepare("UPDATE negociations SET CPT= 10,Acquereur= TRUE,Prix_final=Coffre WHERE ID_Objet='".$objet."'");
					$req5->execute();
					$req5->closeCursor();;
					$cond=10;
					echo("test12");
					

				}
				if($accept==0)
				{	
					echo("condition");
					echo $condition;
					
					$req6 = $bdd->prepare("UPDATE negociations SET Offre= '".$prixdonne."' WHERE ID_Objet='".$objet."'");
					$req6->execute();
					$req6->closeCursor();;

				}
			}
		}
		if($cond<10)
		{



			$condition=$condition+1;
			$req7 = $bdd->prepare("UPDATE negociations SET CPT= '".$condition."' WHERE ID_Objet='".$objet."'");
			$req7->execute();
			$req7->closeCursor();;
		}

	////else acquereur =3
		header('Location: ../Pages/negociations.php');
	}

	
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
}
?> 
</html>