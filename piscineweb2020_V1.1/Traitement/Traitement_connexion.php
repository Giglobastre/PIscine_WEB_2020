<html>
<?php 
session_start();
$mail=$_POST['mail'];
$mdp=$_POST['mdp'];

$condition=0;
try{
	$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');

	$req = $bdd->prepare("SELECT MDP,Mail,ID, Admin,Type FROM utilisateurs"); 
	$req->execute();
	
	while ($data = $req->fetch()){
		if(($data['MDP']==$mdp) && ($data['Mail']==$mail))
		{
			$condition=1;
			$_SESSION['ID']=$data['ID'];
			$_SESSION['type']=$data['Type'];
			echo $_SESSION['ID'];
			echo $_SESSION['type'];
			if($data['Admin']==true)
			{
				echo ("authentification reussi ");
			}
			if($data['Admin']==false)
			{
				if($data['Type']==false)
				{
					echo ("authentification acheteur reussi ");
				}
				else{
					echo ("authentification vendeur reussis");
				}
				
			}

		}
	}
	if($condition==0)
	{
		
		header('Location: ../Pages/connexionFALSE.php');
	}




	$req->closeCursor();;
}
catch (Exception $e){
	header('Location: ../Pages/connexion.php');
	die('Erreur : ' . $e->getMessage());
}

?> 
</html>