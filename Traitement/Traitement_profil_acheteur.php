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
			header('location: ../Pages/Profil_acheteur.php');
		}else{
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_acheteur.php');
		}
	}if(!empty($_POST['adresse1']) && !empty($_POST['ville']) && !empty($_POST['pays']) && !empty($_POST['cp']) && !empty($_POST['tel'])
		&& !empty($_POST['pseudo'])
		&& empty($_POST['mdp'])){
		if(!empty($_POST['adresse2'])){
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Adresse2=".$_POST['adresse2'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel'].", Pseudo=".$_POST['pseudo']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_acheteur.php');
		}else{
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel'].", Pseudo=".$_POST['pseudo']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_acheteur.php');
		}
	}if(!empty($_POST['adresse1']) && !empty($_POST['ville']) && !empty($_POST['pays']) && !empty($_POST['cp']) && !empty($_POST['tel'])
		&& !empty($_POST['pseudo'])
		&& !empty($_POST['mdp'] && !empty($_POST['mdpc']) && $_POST['mdp']==$_POST['mdpc'])){
		if(!empty($_POST['adresse2'])){
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Adresse2=".$_POST['adresse2'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel'].", Pseudo=".$_POST['pseudo'].", MDP=".$_POST['mdp']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_acheteur.php');
		}else{
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel'].", Pseudo=".$_POST['pseudo'].", MDP=".$_POST['mdp']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_acheteur.php');
		}
	}if(!empty($_POST['adresse1']) && !empty($_POST['ville']) && !empty($_POST['pays']) && !empty($_POST['cp']) && !empty($_POST['tel'])
		&& empty($_POST['pseudo'])
		&& !empty($_POST['mdp'] && !empty($_POST['mdpc']) && $_POST['mdp']==$_POST['mdpc'])){
		if(!empty($_POST['adresse2'])){
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Adresse2=".$_POST['adresse2'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel'].", MDP=".$_POST['mdp']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_acheteur.php');
		}else{
			$req = $bdd->prepare("UPDATE utilisateurs SET Adresse1=".$_POST['adresse1'].", Ville=".$_POST['ville'].", Pays=".$_POST['pays'].", Code_postal=".$_POST['cp'].", Tel=".$_POST['tel'].", MDP=".$_POST['mdp']." WHERE ID=".$_SESSION['ID'].""); 
			$req->execute();
			$req->closeCursor();
			header('location: ../Pages/Profil_acheteur.php');
		}
	}if(empty($_POST['adresse1']) && empty($_POST['ville']) && empty($_POST['pays']) && empty($_POST['cp']) && empty($_POST['tel'])
		&& !empty($_POST['pseudo'])
		&& !empty($_POST['mdp'] && !empty($_POST['mdpc']) && $_POST['mdp']==$_POST['mdpc'])){
		$req = $bdd->prepare("UPDATE utilisateurs SET  Pseudo=".$_POST['pseudo'].", MDP=".$_POST['mdp']." WHERE ID=".$_SESSION['ID'].""); 
		$req->execute();
		$req->closeCursor();
		header('location: ../Pages/Profil_acheteur.php');
	}if(empty($_POST['adresse1']) && empty($_POST['ville']) && empty($_POST['pays']) && empty($_POST['cp']) && empty($_POST['tel'])
		&& !empty($_POST['pseudo'])
		&& empty($_POST['mdp'])){
		$req = $bdd->prepare("UPDATE utilisateurs SET  Pseudo=".$_POST['pseudo']." WHERE ID=".$_SESSION['ID'].""); 
		$req->execute();
		$req->closeCursor();
		header('location: ../Pages/Profil_acheteur.php');
	}if(empty($_POST['adresse1']) && empty($_POST['ville']) && empty($_POST['pays']) && empty($_POST['cp']) && empty($_POST['tel'])
		&& empty($_POST['pseudo'])
		&& !empty($_POST['mdp']) && !empty($_POST['mdpc']) && $_POST['mdp']==$_POST['mdpc']){
		$req = $bdd->prepare("UPDATE utilisateurs SET MDP=".$_POST['mdp']." WHERE ID=".$_SESSION['ID'].""); 
		$req->execute();
		$req->closeCursor();
		header('location: ../Pages/Profil_acheteur.php');
	}
	//traitement sur les données cb
	if(!empty($_POST['cb_prenom']) && !empty($_POST['cb_nom']) 
		&& !empty($_POST['cb_date']) && !empty($_POST['cb_cvv']) && !empty($_POST['cb_n'])){
		$req2 = $bdd->prepare('SELECT Numero FROM cb_client WHERE Numero="'.$_POST['cb_n'].'"');
		$req2->execute();
		$flag=0;
		while ($data = $req2->fetch()){
      			$flag=1;
		}
		if($flag==0){
			$req2 = $bdd->prepare('INSERT INTO cb_client(ID_client,Prenom,Nom,Date_expi,CVV,Numero,Type) VALUES(?,?,?,?,?,?,?)');
			$req2->execute(array($_SESSION['ID'],$_POST['cb_prenom'],$_POST['cb_nom'],$_POST['cb_date'],$_POST['cb_cvv'],$_POST['cb_n'],$_POST['type']));
			$req2->closeCursor();
			header('location: ../Pages/Profil_acheteur.php');
		}else if($flag==1){
			$req2 = $bdd->prepare('UPDATE cb_client(ID_client,Prenom,Nom,Date_expi,CVV,Numero, Type) VALUES(?,?,?,?,?,?,?)');
			$req2->execute(array($_SESSION['ID'],$_POST['cb_prenom'],$_POST['cb_nom'],$_POST['cb_date'],$_POST['cb_cvv'],$_POST['cb_n'],$_POST['type']));
			$req2->closeCursor();
			header('location: ../Pages/Profil_acheteur.php');
		}
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
		header('location: ../Pages/Profil_acheteur.php');
	}if(isset($_FILES['couverture'])){
		$nom_im="couv".$_SESSION['ID'];
		$pathv = $_FILES['couverture']['name'];
		$extensioncouv = pathinfo($pathv, PATHINFO_EXTENSION);
		move_uploaded_file($_FILES['couverture']['tmp_name'], '../Profil/'.$nom_im.'.'.$extensioncouv);
		$req2 = $bdd->prepare("UPDATE utilisateurs SET Background_nom='".$nom_im."', Background_extension='".$extensioncouv."' WHERE ID='".$_SESSION['ID']."'");
		$req2->execute();
		$req2->closeCursor();
		header('location: ../Pages/Profil_acheteur.php');
	}

	?>
</body>
</html>