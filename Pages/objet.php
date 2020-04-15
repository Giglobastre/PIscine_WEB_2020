<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="icon" type="image/jpg" href="logo%20Ebay%20ECE.JPG" />
  <link rel="stylesheet" type="text/css" href="../Style/Style_objet.css">
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
$req = $bdd->prepare('SELECT ID,Nom, Photo1_nom, Photo1_extension,Photo2_nom, Photo2_extension,Photo3_nom, Photo3_extension,Video_nom, Video_extension, Prix, Description, Catégorie, Methode_vente FROM objets WHERE ID="'.$_POST['ID_obj'].'"');
$req->execute();
while ($data = $req->fetch()){
    //changer tout le echo comme les if ?  la ou pas de variabless par ex pour afficher les images que si elles sont set et la video aussi
  echo '<div id="objet">
  <center>
  <h1>'.$data['Nom'].'</h1>
  <div id="divimgobj">
  <img id="imgobj" src="../Objets/'.$data['Photo1_nom'].'.'.$data['Photo1_extension'].'">
  <img id="imgobj" src="../Objets/'.$data['Photo2_nom'].'.'.$data['Photo2_extension'].'">
  <img id="imgobj" src="../Objets/'.$data['Photo3_nom'].'.'.$data['Photo3_extension'].'">
  <video width="320" height="240" autoplay>
  <source src="../Objets/'.$data['Video_nom'].'.'.$data['Video_extension'].'" type="video/'.$data['Video_extension'].'" />
  source video non supportée par le navigateur
  </video>
  </div>
  <p id="Description">'.$data['Description'].'</p>
  <h3>'.$data['Prix'].'</h3>
  </center>
  </div>';
    //aff catégorie
  if($data['Catégorie']==1){
    ?><p>Catégorie : Féraille et trésor</p><?php
  }else if($data['Catégorie']==2){
    ?><p>Catégorie : Bon pour le musée</p><?php
  }else if($data['Catégorie']==3){
    ?><p>Catégorie : Accessoire VIP</p><?php
  }
    //aff bouton pour participer a la vente
    //RELIER LES FORMS A UNE PAGE //////////////////////////////////////////////////////////////////////////////
    if($data['Methode_vente']==0 && isset($_SESSION['ID'])){//enchere
      ?><form action="../Traitement/Traitement_calculpanier" method="post">
        <input type="hidden" name="ID_obj" value="<?php echo $data['ID'];?>">
        <input type="hidden" name="ID_ach" value="<?php echo $_SESSION['ID'];?>">
        <label for="prix">Montant maximum : </label><input type="text" name="prix">
        <input type="submit" name="submit" Value="Particper a l'enchère">
        </form><?php
    }
    else if($data['Methode_vente']==1 && isset($_SESSION['ID'])){//nego
      ?><form>
        <input type="hidden" name="ID_obj" value="<?php echo $data['ID'];?>">
        <input type="hidden" name="ID_ach" value="<?php echo $_SESSION['ID'];?>">
        <input type="text" name="prix"><label for="prix">Proposez un prix : </label>
        <input type="submit" name="submit" Value="Proposer">
        </form><?php
    }
    if(isset($_SESSION['ID'])){//achat immediat
      ?>
      <form>
        <input type="hidden" name="ID_obj" value="<?php echo $data['ID'];?>">
        <input type="hidden" name="ID_ach" value="<?php echo $_SESSION['ID'];?>">
        <p>Acheter immediatement, prix : <?php echo $data['Prix']*3;?></p>
        <input type="submit" name="submit" Value="Acheter">
      </form><?php
    }
    else if(!isset($_SESSION['ID'])){//connexion
      ?>
      <p>connectez vous ou creez vous un compte pour acheter</p>
      <form action="connexion.php">
        <input type="submit" name="submit" Value="Connexion">
      </form>
      <form action="creation.php">
        <input type="submit" name="submit" Value="Creer un compte">
      </form>
      <?php
    }
  }
?>
</body>
</html>