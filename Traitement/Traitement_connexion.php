<html>
<?php 
session_start();
?>



<?php 


$_SESSION['Test']=0;
$condition=3;

if((empty($_POST['mail2'])==false)&&(empty($_POST['mdp1'])==false))
{

	$mail=$_POST['mail2'];
	$mdp=$_POST['mdp1'];
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

			$_SESSION['Test']=2;
			echo("incorect");
			header('Location: ../Pages/connexion.php');
		}




		$req->closeCursor();;
	}
	catch (Exception $e){
		header('Location: ../Pages/connexion.php');
		die('Erreur : ' . $e->getMessage());
	}

}


elseif((empty($_POST['mail'])==false)&&(empty($_POST['nom'])==false)&&(empty($_POST['prenom'])==false)&&(empty($_POST['mdp'])==false)&&(empty($_POST['mdp2'])==false)&&(empty($_POST['pseudo'])==false))
{
	$mail=$_POST['mail'];
	$mdp=$_POST['mdp'];
	$mdp2=$_POST['mdp2'];
	$pseudo=$_POST['pseudo'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$_SESSION['type']=$_POST['type'];
	
	$condition=0;

	try{
		

		$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');

		$req = $bdd->prepare("SELECT Mail FROM utilisateurs WHERE Mail='".$mail."'"); 
		$req->execute();


		while ($data = $req->fetch()){
			$_SESSION['Test']=4;
			header('Location: ../Pages/connexion.php');
			$condition=1;
			
			
		}

		if($condition==0 && $mdp==$mdp2 && strpos($mail,'@edu.ece.fr')!==false)
		{
			$req = $bdd->prepare('INSERT INTO utilisateurs(Nom,Prenom,Pseudo,Mail,MDP,Type) VALUES(?,?,?,?,?,?)');
			$req->execute(array($nom,$prenom,$pseudo,$mail,$mdp,$_SESSION['type']));
			$req->closeCursor();
			$_SESSION['admin']=0;

			$req = $bdd->prepare("SELECT ID FROM utilisateurs WHERE Mail='".$mail."'"); 
			$req->execute();
			while ($data = $req->fetch()){
				$_SESSION['ID']=$data['ID'];
			}
			echo $_SESSION['type'];
			echo $_SESSION['ID'];

			header('Location: ../Pages/');
		}
		elseif($condition==0)
		{

			$_SESSION['Test']=3;
			header('Location: ../Pages/connexion.php');
			
		}



		$req->closeCursor();;



	
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
}

if($condition==3)
{
	$_SESSION['Test']=1;
			header('Location: ../Pages/connexion.php');
	
}
?> 

</html>