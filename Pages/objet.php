<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="icon" type="image/jpg" href="logo%20Ebay%20ECE.JPG" />
  <link rel="stylesheet" type="text/css" href="../Style/Style_index.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
</head>
<body>
  
  <div id="header">
    <img src="../Images/logo%20Ebay%20ECE.JPG" height="40" width="160"> 
  </div>
  
  <div class="topnav">
    <div style="float:left">
      <a class="active" href="index.php">Home</a>
      <a href="news.php">News</a>
      <a href="Produit.php">Produit</a>
      <a href="Contact.php">Contact</a>
      <a href="about.php">About</a>
    </div>
    <div style="float:right">
      <a href="connexion.php"><img height="27" src="../Images/ImgAcoountConnexion.jpg" alt="" hspace="0"></a>
      <a href="Panier.php"><img height="27" src="../Images/Panier.png" alt="" hspace="0"></a>
    </div>     
  </div>       
  
  <div style="padding-left:30px">
    <div id="searchbar">                
      <h2>Que voulez-vous rechercher ?</h2>
      <form action="" class="formulaire">
       <input class="champ" type="text" placeholder="ECEbay Search.."/>
       <input class="bouton" type="button" value="Rechercher" />         
     </form>
   </div>
 </div>

<?php
	try{
    $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
  }
  catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
  $req = $bdd->prepare('SELECT ID,Nom, Photo1_nom, Photo1_extension,Photo2_nom, Photo2_extension,Photo3_nom, Photo3_extension,Video_nom, Video_extension, Prix, Description, Catégorie FROM objets WHERE ID="'.$_POST['ID_obj'].'"');
  $req->execute();
  while ($data = $req->fetch()){
    echo '<div id="objet">
            <center>
              <h3>'.$data['Nom'].'</h3>
              <form method="post" action="objet.php" id="form_obj">
                <input type="hidden" name="ID_obj" value="'.$data['ID'].'"/>
                <input type="image" src="../Objets/'.$data['Photo1_nom'].'.'.$data['Photo1_extension'].'"/>
              </form>
              <p id="Description">'.$data['Description'].'</p>
              <h3>'.$data['Prix'].'</h3>
            </center>
          </div>';
  }
?>

</body>
</html>