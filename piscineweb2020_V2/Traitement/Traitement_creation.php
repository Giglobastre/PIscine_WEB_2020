<html>
<?php 
session_start();
$mail=$_POST['mail'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$mdp=$_POST['mdp'];
$mdp2=$_POST['mdp2'];
$_SESSION['pseudo']=$_POST['pseudo'];
$_SESSION['type']=$_POST['type'];

$condition=0;

try{

	if((empty($nom)==false)&&(empty($prenom)==false)&&(empty($mail)==false)&&(empty($mdp)==false)&&(empty($_SESSION['pseudo'])==false)&&(empty($mdp2)==false))
	{

		

		$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');

		$req = $bdd->prepare("SELECT Mail FROM utilisateurs WHERE Mail='".$mail."'"); 
		$req->execute();


		while ($data = $req->fetch()){
			header('Location: ../Pages/creationMAIL.php');
			$condition=1;


		}

		if($condition==0 && $mdp==$mdp2)
		{
			$req = $bdd->prepare('INSERT INTO utilisateurs(Nom,Prenom,Pseudo,Mail,MDP,Type) VALUES(?,?,?,?,?,?)');
			$req->execute(array($nom,$prenom,$_SESSION['pseudo'],$mail,$mdp,$_SESSION['type']));
			$req->closeCursor();
			$req = $bdd->prepare("SELECT ID FROM utilisateurs WHERE Mail='".$mail."'"); 
			$req->execute();
			while ($data = $req->fetch()){
					$_SESSION['ID']=$data['ID'];
			}
			echo $_SESSION['type'];
			echo $_SESSION['ID'];

			/*header('Location: http://localhost/site.php');*/
		}
		elseif($condition==0)
		{

			header('Location: ../Pages/creationMDP.php');
			
			/*header('Location: http://localhost/site/Piscine/');*/
			/*exit();*/
		}



		$req->closeCursor();;
	}
	else
	{
		header('Location: ../Pages/creationVIDE.php');
	}
	
	$condition=0;
}
catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}

?> 
</html>