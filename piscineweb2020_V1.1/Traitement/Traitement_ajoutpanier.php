<?php 
session_start();

$_SESSION['ID_Client']=1;
$ID_objet=1;
$total=0;



$condition=0;
try{
  $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');

  $req = $bdd->prepare("SELECT ID_Client ,ID_Objet FROM panier"); 
  $req->execute();
  
  while ($data = $req->fetch()){

    if($data['ID_Client']==$_SESSION['ID_Client'])
    {
      $condition=1;
      echo ("id client :");
      echo '<h3>'.$data['ID_Client'].'</h3>';
      echo ("id object :");
      echo '<h3>'.$data['ID_Objet'].'</h3>';
      $req2 = $bdd->prepare("SELECT ID,Prix FROM objets WHERE ID='".$data['ID_Objet']."'"); 
      $req2->execute();
      
      while ($data = $req2->fetch())
      {
        $total=$data['Prix']+$total;
        echo ("Prix :");
        echo '<h3>'.$data['Prix'].'</h3>';
        
      }

      

      $req2->closeCursor();;
    }

    
  }
  echo("Total panier =");
  echo $total;
  if($condition==0)
  {
    echo("panier vide");
  }
  

  $req->closeCursor();;
}
catch (Exception $e){
  
  die('Erreur : ' . $e->getMessage());
}

?> 