<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Traitement</p>
	<?php

		$photo1=0;
		$photo2=0;
		$photo3=0;
		$video=0;
		//verif que le form a été bien rempli
		if(!empty($_POST['Nom']) && !empty($_POST['Description']) && !empty($_POST['Prix'])){
			//verification photo
			if(!empty($_FILES['photo1'])){
				if( $_FILES['photo1']['error']==0 && $_FILES['photo1']['size']<8000000){
					$photo1=1;
					//recup extension
					$path1 = $_FILES['photo1']['name'];
					$extension1 = pathinfo($path1, PATHINFO_EXTENSION);
				}
			}
			if(!empty($_FILES['photo2'])){
				if($_FILES['photo2']['error']==0 && $_FILES['photo2']['size']<8000000){
					$photo2=1;
					//recup extension
					$path2 = $_FILES['photo2']['name'];
					$extension2 = pathinfo($path2, PATHINFO_EXTENSION);
				}
			}
			if(!empty($_FILES['photo3'])){
				if($_FILES['photo3']['error']==0 && $_FILES['photo3']['size']<8000000){
					$photo3=1;
					//recup extension
					$path3 = $_FILES['photo3']['name'];
					$extension3 = pathinfo($path3, PATHINFO_EXTENSION);
				}
			}
			if(!empty($_FILES['video'])){
				if($_FILES['video']['error']==0 && $_FILES['video']['size']<8000000){
					$video=1;
					//recup extension
					$pathv = $_FILES['video']['name'];
					$extensionv = pathinfo($pathv, PATHINFO_EXTENSION);
				}
			}
			//recup l'id dernier obj, renommer la photo et envoyer dans bdd et fichiers
			try{
				$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
			}
			catch (Exception $e){
				die('Erreur : ' . $e->getMessage());
			}
			$req = $bdd->query('SELECT MAX(ID) AS ID_max FROM objets');
			$ID_dernierobj=0;
	      	while ($data = $req->fetch()){
      			$ID_dernierobj=$data['ID_max'];
			}
			$req->closeCursor();
			$ID_dernierobj++;
			//if pour acceder a chaque image et les deplacer
			if($photo1==1){
				$nom_img1="obj".$ID_dernierobj."img1";
				move_uploaded_file($_FILES['photo1']['tmp_name'], '../Objets/obj'.$ID_dernierobj.'img1.'.$extension1);
			}
			if($photo2==1){
				$nom_img2="obj".$ID_dernierobj."img2";
				move_uploaded_file($_FILES['photo2']['tmp_name'], '../Objets/obj'.$ID_dernierobj.'img2.'.$extension2);
			}
			if($photo3==1){
				$nom_img3="obj".$ID_dernierobj."img3";
				move_uploaded_file($_FILES['photo3']['tmp_name'], '../Objets/obj'.$ID_dernierobj.'img3.'.$extension3);
			}
			if($video==1){
				$nom_vid="obj".$ID_dernierobj."vid";
				move_uploaded_file($_FILES['video']['tmp_name'], '../Objets/obj'.$ID_dernierobj.'vid.'.$extensionv);
			}
			//requetes:
			if($photo1==1 && $photo2==0 && $photo3==0 && $video==0){
				$req2 = $bdd->prepare('INSERT INTO objets (Nom,Photo1_nom,Photo1_extension,Description,Prix,Catégorie,Methode_vente,ID_V) VALUES(?,?,?,?,?,?,?,?)');
				$req2->execute(array($_POST['Nom'],$nom_img1,$extension1,$_POST['Description'],$_POST['Prix'],$_POST['catégorie'],$_POST['type_vente'],$_SESSION['ID']));
				$req2->closeCursor();
			}
			if($photo1==1 && $photo2==1 && $photo3==0 && $video==0){
				$req2 = $bdd->prepare('INSERT INTO objets (Nom,Photo1_nom,Photo1_extension,Photo2_nom,Photo2_extension,Description,Prix,Catégorie,Methode_vente,ID_V) VALUES(?,?,?,?,?,?,?,?,?,?)');
				$req2->execute(array($_POST['Nom'],$nom_img1,$extension1,$nom_img2,$extension2,$_POST['Description'],$_POST['Prix'],$_POST['catégorie'],$_POST['type_vente'],$_SESSION['ID']));
				$req2->closeCursor();
			}
			if($photo1==1 && $photo2==1 && $photo3==1 && $video==0){
				$req2 = $bdd->prepare('INSERT INTO objets (Nom,Photo1_nom,Photo1_extension,Photo2_nom,Photo2_extension,Photo3_nom,Photo3_extension,Description,Prix,Catégorie,Methode_vente,ID_V) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
				$req2->execute(array($_POST['Nom'],$nom_img1,$extension1,$nom_img2,$extension2,$nom_img3,$extension3,$_POST['Description'],$_POST['Prix'],$_POST['catégorie'],$_POST['type_vente'],$_SESSION['ID']));
				$req2->closeCursor();
			}
			if($photo1==1 && $photo2==0 && $photo3==0 && $video==1){
				$req2 = $bdd->prepare('INSERT INTO objets (Nom,Photo1_nom,Photo1_extension,Video_nom,Video_extension,Description,Prix,Catégorie,Methode_vente,ID_V) VALUES(?,?,?,?,?,?,?,?,?,?)');
				$req2->execute(array($_POST['Nom'],$nom_img1,$extension1,$nom_vid,$extensionv,$_POST['Description'],$_POST['Prix'],$_POST['catégorie'],$_POST['type_vente'],$_SESSION['ID']));
				$req2->closeCursor();
			}
			if($photo1==1 && $photo2==1 && $photo3==0 && $video==1){
				$req2 = $bdd->prepare('INSERT INTO objets (Nom,Photo1_nom,Photo1_extension,Photo2_nom,Photo2_extension,Video_nom,Video_extension,Description,Prix,Catégorie,Methode_vente,ID_V) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
				$req2->execute(array($_POST['Nom'],$nom_img1,$extension1,$nom_img2,$extension2,$nom_vid,$extensionv,$_POST['Description'],$_POST['Prix'],$_POST['catégorie'],$_POST['type_vente'],$_SESSION['ID']));
				$req2->closeCursor();
			}
			if($photo1==1 && $photo2==1 && $photo3==1 && $video==1){
				$req2 = $bdd->prepare('INSERT INTO objets (Nom,Photo1_nom,Photo1_extension,Photo2_nom,Photo2_extension,Photo3_nom,Photo3_extension,Video_nom,Video_extension,Description,Prix,Catégorie,Methode_vente,ID_V) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
				$req2->execute(array($_POST['Nom'],$nom_img1,$extension1,$nom_img2,$extension2,$nom_img3,$extension3,$nom_vid,$extensionv,$_POST['Description'],$_POST['Prix'],$_POST['catégorie'],$_POST['type_vente'],$_SESSION['ID']));
				$req2->closeCursor();
			}
			if($photo1==0 && $photo2==0 && $photo3==0 && $video==1){
				$req2 = $bdd->prepare('INSERT INTO objets (Nom,Video_nom,Video_extension,Description,Prix,Catégorie,Methode_vente,ID_V) VALUES(?,?,?,?,?,?,?,?)');
				$req2->execute(array($_POST['Nom'],$nom_vid,$extensionv,$_POST['Description'],$_POST['Prix'],$_POST['catégorie'],$_POST['type_vente'],$_SESSION['ID']));
				$req2->closeCursor();
			}
			echo "Ajout dans notre base de données confirmé";
			//sleep(3);
			header('Location:../Pages/index.php'); //mettre sur la page vendeur
		} else {
			?> <h1>Veuillez remplir tous les champs</h1><?php
			echo "Veuillez remplir tous les champs";
			//sleep(3);
			header('Location:../Pages/nv_obj.php');
		}

	 ?>

</body>
</html>