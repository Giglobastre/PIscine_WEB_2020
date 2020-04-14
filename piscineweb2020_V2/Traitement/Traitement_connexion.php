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
			$_SESSION['admin']=$data['Admin'];
			echo $_SESSION['ID'];
			echo $_SESSION['type'];
			if($data['Admin']==true)
			{
				echo ("authentification reussie ");
				header('Location: ../Pages/index.php');
			}
			if($data['Admin']==false)
			{
				if($data['Type']==false)
				{
					echo ("authentification acheteur reussie ");
					header('Location: ../Pages/index.php');
				}
				else{
					echo ("authentification vendeur reussie");
					header('Location: ../Pages/index.php');
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