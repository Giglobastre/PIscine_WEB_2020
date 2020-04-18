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

try{

	if((empty($nom)==false)&&(empty($prenom)==false)&&(empty($cvv)==false)&&(empty($numero)==false)&&(empty($date)==false))
	{

		

		$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');

		$req = $bdd->prepare("SELECT Nom,Prenom,Numero,Date_exp,CVV,Type FROM cb"); 
		$req->execute();


		while ($data = $req->fetch()){

			if(($data['Date_exp']==$date)&&($data['CVV']==$cvv)&&($data['Prenom']==$prenom)&&($data['Numero']==$numero)&&($data['Nom']==$nom)&&($data['Type']==$type))
			{
				echo '<h3>'.$data['Date_exp'].'</h3>';
				$condition=1;
			}
			

		}

		if($condition==0)
		{
			echo("La carte n'existe pas");
		}
		$req->closeCursor();;
	}


	else
	{

		
		$_SESSION['Test']=1;
		header('location: ../Pages/paiement.php');
		/*exit();*/
	}



	
}


catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}

?> 
</html>