<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

		$photo1=0;
		$photo2=0;
		$photo3=0;
		$video=0;
		//verif que le form a été bien rempli
		if(isset($_POST['Nom']) && isset($_POST['Description']) && isset($_POST['Prix']) && isset($_POST['catégorie'])){
			//verification photo
			if(isset($_FILES['photo1'])){
				if( $_FILES['photo1']['error']==0 && $_FILES['photo1']['size']<8000000){
					$photo1=1;
				}
			}
			else{$_FILES['photo1']=null}
			if(isset($_FILES['photo2'])){
				if($_POST['photo2']['error']==0 && $_POST['photo2']['size']<8000000){
					$photo2=1;
				}
			}
			if(isset($_FILES['photo3'])){
				if($_POST['photo3']['error']==0 && $_POST['photo3']['size']<8000000){
					$photo3=1;
				}
			}
			if(isset($_FILES['video'])){
				if($_POST['video']['error']==0 && $_POST['video']['size']<8000000){
					$video=1;
				}
			}
			//recup l'id dernier obj, renommer la photo et envoyer dans bdd et fichiers
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
			$req = $bdd->query('SELECT ID,max(Date_obj) FROM objets');
			$ID_dernierobj=0;
	      	while ($data = $req->fetch())
      		{
      			$ID_dernierobj=$data;
			}
			$req->closeCursor();
			echo $ID_dernierobj;
		}
	 ?>

</body>
</html>