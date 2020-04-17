<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	//traitement formulaire sur les données perso
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	if(!empty($_POST['adresse1']) && !empty($_POST['ville']) && !empty($_POST['pays']) && !empty($_POST['cp']) && !empty($_POST['tel'])
		&& empty($_POST['pseudo'])
		&& empty($_POST['mdp'])){
		if(!empty($_POST['adresse2'])){
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Adresse2=".$_POST['adresse2'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_vendeur.php');
		}else{
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_vendeur.php');
		}
	}if(!empty($_POST['adresse1']) && !empty($_POST['ville']) && !empty($_POST['pays']) && !empty($_POST['cp']) && !empty($_POST['tel'])
		&& !empty($_POST['pseudo'])
		&& empty($_POST['mdp'])){
		if(!empty($_POST['adresse2'])){
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Adresse2=".$_POST['adresse2'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel'].", Pseudo=".$_POST['pseudo']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_vendeur.php');
		}else{
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel'].", Pseudo=".$_POST['pseudo']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_vendeur.php');
		}
	}if(!empty($_POST['adresse1']) && !empty($_POST['ville']) && !empty($_POST['pays']) && !empty($_POST['cp']) && !empty($_POST['tel'])
		&& !empty($_POST['pseudo'])
		&& !empty($_POST['mdp'] && !empty($_POST['mdpc']) && $_POST['mdp']==$_POST['mdpc'])){
		if(!empty($_POST['adresse2'])){
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Adresse2=".$_POST['adresse2'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel'].", Pseudo=".$_POST['pseudo'].", MDP=".$_POST['mdp']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_vendeur.php');
		}else{
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel'].", Pseudo=".$_POST['pseudo'].", MDP=".$_POST['mdp']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_vendeur.php');
		}
	}if(!empty($_POST['adresse1']) && !empty($_POST['ville']) && !empty($_POST['pays']) && !empty($_POST['cp']) && !empty($_POST['tel'])
		&& empty($_POST['pseudo'])
		&& !empty($_POST['mdp'] && !empty($_POST['mdpc']) && $_POST['mdp']==$_POST['mdpc'])){
		if(!empty($_POST['adresse2'])){
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Adresse2=".$_POST['adresse2'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel'].", MDP=".$_POST['mdp']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_vendeur.php');
		}else{
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel'].", MDP=".$_POST['mdp']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_vendeur.php');
		}
	}if(empty($_POST['adresse1']) && empty($_POST['ville']) && empty($_POST['pays']) && empty($_POST['cp']) && empty($_POST['tel'])
		&& !empty($_POST['pseudo'])
		&& !empty($_POST['mdp'] && !empty($_POST['mdpc']) && $_POST['mdp']==$_POST['mdpc'])){
		$req = $bdd->prepare("UPDATE utilisateurs SET  Pseudo=".$_POST['pseudo'].", MDP=".$_POST['mdp']." WHERE ID=".$_SESSION['ID'].""); 
		$req->execute();
		$req->closeCursor();
		header('location: ../Pages/Profil_vendeur.php');
	}if(empty($_POST['adresse1']) && empty($_POST['ville']) && empty($_POST['pays']) && empty($_POST['cp']) && empty($_POST['tel'])
		&& !empty($_POST['pseudo'])
		&& empty($_POST['mdp'])){
		$req = $bdd->prepare("UPDATE utilisateurs SET  Pseudo=".$_POST['pseudo']." WHERE ID=".$_SESSION['ID'].""); 
		$req->execute();
		$req->closeCursor();
		header('location: ../Pages/Profil_vendeur.php');
	}if(empty($_POST['adresse1']) && empty($_POST['ville']) && empty($_POST['pays']) && empty($_POST['cp']) && empty($_POST['tel'])
		&& empty($_POST['pseudo'])
		&& !empty($_POST['mdp']) && !empty($_POST['mdpc']) && $_POST['mdp']==$_POST['mdpc']){
		$req = $bdd->prepare("UPDATE utilisateurs SET MDP=".$_POST['mdp']." WHERE ID=".$_SESSION['ID'].""); 
		$req->execute();
		$req->closeCursor();
		header('location: ../Pages/Profil_vendeur.php');
	}
	//traitement  ajout images
	if(isset($_FILES['profil'])){
		$nom_im="pp".$_SESSION['ID'];
		$pathv = $_FILES['profil']['name'];
		$extensionpp = pathinfo($pathv, PATHINFO_EXTENSION);
		move_uploaded_file($_FILES['profil']['tmp_name'], '../Profil/'.$nom_im.'.'.$extensionpp);
		$req2 = $bdd->prepare("UPDATE utilisateurs SET Photo_nom='".$nom_im."', Photo_extension='".$extensionpp."' WHERE ID='".$_SESSION['ID']."'");
		$req2->execute();
		$req2->closeCursor();
		header('location: ../Pages/Profil_vendeur.php');
	}if(isset($_FILES['couverture'])){
		$nom_im="couv".$_SESSION['ID'];
		$pathv = $_FILES['couverture']['name'];
		$extensioncouv = pathinfo($pathv, PATHINFO_EXTENSION);
		move_uploaded_file($_FILES['couverture']['tmp_name'], '../Profil/'.$nom_im.'.'.$extensioncouv);
		$req2 = $bdd->prepare("UPDATE utilisateurs SET Background_nom='".$nom_im."', Background_extension='".$extensioncouv."' WHERE ID='".$_SESSION['ID']."'");
		$req2->execute();
		$req2->closeCursor();
		header('location: ../Pages/Profil_vendeur.php');
	}
	//traitement sup article 0 enchere 1 nego
	if(isset($_POST['id_sup']) && isset($_POST['mv_sup']) && isset($_POST['date_sup'])){
		$m = date("m");
		$mobj=substr($_POST['date_sup'],5,2);
		if($m+1==$mobj+1-1){
			$req = $bdd->prepare('DELETE FROM objets WHERE ID="'.$_POST['id_sup'].'"');
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_vendeur.php');
		}
	}
	?>
</body>
</html>