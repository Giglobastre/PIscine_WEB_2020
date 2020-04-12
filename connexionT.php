<html>
<?php 

$mail=$_POST['mail'];
$mdp=$_POST['mdp'];


try{
	$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');

	$req = $bdd->prepare("SELECT MDP, Admin,Type FROM utilisateurs WHERE Mail='".$mail."'"); 
	$req->execute();

	while ($data = $req->fetch()){
		if($data['MDP']==$mdp)
		{
			if($data['Admin']==true)
			{
				echo "authentification reussi ";
			}
			if($data['Admin']==false)
			{
				if($data['Type']==false)
				{
					echo "authentification acheteur reussi ";
				}
				else{
					echo "authentification vendeur reussis";
				}
				
			}

		}
		
    }
    

    $req->closeCursor();;
}
catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}

?> 
</html>