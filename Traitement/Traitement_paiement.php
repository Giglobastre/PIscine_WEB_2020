<html>
<?php 
session_start();
$cvv=$_POST['cvv'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$numero=$_POST['numero'];
$date=$_POST['date'];
$type=$_POST['type'];

$condition=0;
$re=0;

try{

	if((empty($nom)==false)&&(empty($prenom)==false)&&(empty($cvv)==false)&&(empty($numero)==false)&&(empty($date)==false))
	{

		

		$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');

		$req = $bdd->prepare("SELECT Nom,Prenom,Numero,Date_exp,CVV,Type FROM cb"); 
		$req->execute();


		while ($data = $req->fetch()){

			if(($data['Date_exp']==$date)&&($data['CVV']==$cvv)&&($data['Prenom']==$prenom)&&($data['Numero']==$numero)&&($data['Nom']==$nom)&&($data['Type']==$type))
			{
				$condition=1;

				$req6 = $bdd->prepare("SELECT ID_Objet FROM panier WHERE Acquereur=3 AND ID_Client='".$_SESSION['ID']."'"); 
				$req6->execute();
				while ($data = $req6->fetch()){
					$req15 = $bdd->query('DELETE FROM objets WHERE ID="'.$data['ID_Objet'].'"');
					$req15->closeCursor();
				}

				$req5 = $bdd->prepare("UPDATE panier SET Acquereur= 4 WHERE Acquereur=3 AND ID_Client='".$_SESSION['ID']."'" );
				$req5->execute();
				$req5->closeCursor();;
                header('location: ../Pages/MailConfirmation.php');
			}
			

		}

		if($condition==0)
		{
			echo("La carte n'existe pas");
			$_SESSION['Test']=2;
			header('location: ../Pages/paiement.php');
		}
		$req->closeCursor();;
	}


	else
	{

		
		$_SESSION['Test']=1;
		header('location: ../Pages/paiement.php');
		/*header('Location: http://localhost/site/Piscine/');*/
		/*exit();*/
	}



	
}


catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}

?> 
</html>
