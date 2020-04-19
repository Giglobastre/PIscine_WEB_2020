<html>
<?php 
session_start();


$condition=0;
$re=0;
	
		$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');

		$req5 = $bdd->prepare("DELETE FROM panier  WHERE ID_Objet= '".$_POST['ID_obj']."' AND ID_Client='".$_SESSION['ID']."'" );
		$req5->execute();
		$req5->closeCursor();;
		header('location: ../Pages/panier.php');


?> 
</html>