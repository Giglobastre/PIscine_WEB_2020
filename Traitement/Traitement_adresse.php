<html>
<?php 
session_start();
$adresse=$_POST['adresse'];
$code=$_POST['code'];
$ville=$_POST['ville'];
$pays=$_POST['pays'];
$tel=$_POST['tel'];


$condition=0;

try{

	if((empty($adresse)==false)&&(empty($code)==false)&&(empty($ville)==false)&&(empty($tel)==false)&&(empty($pays)==false))
	{

		
		echo $_POST['tel'];
		echo $_POST['adresse'];
		echo $_POST['code'];
		echo $_POST['ville'];
		echo $_POST['pays'];
		echo $_SESSION['ID'];


		$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');

		$req5 = $bdd->prepare("UPDATE utilisateurs SET Adresse1='".$_POST['adresse']."',  Ville='".$_POST['ville']."', Pays='".$_POST['pays']."', Code_postal='".$_POST['code']."', Tel='".$_POST['tel']."' WHERE ID=".$_SESSION['ID']."");  
		$req5->execute();
		$req5->closeCursor();;
		header('location: ../Pages/Paiement.php');
	}


	else
	{
		$_SESSION['Test']=1;
		header('location: ../Pages/process.php');
		/*header('Location: http://localhost/site/Piscine/');*/
		/*exit();*/
	}



	
}


catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}

?> 
</html>