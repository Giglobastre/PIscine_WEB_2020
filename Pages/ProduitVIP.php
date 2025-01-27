<?php 
session_start();
$_SESSION['Test']=0;

try{
  $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
}
catch (Exception $e){
  die('Erreur : ' . $e->getMessage());
}

if(isset($_SESSION['ID'])){
  $req15=$bdd->prepare('SELECT Photo_nom, Photo_extension, Background_nom, Background_extension FROM utilisateurs WHERE ID="'.$_SESSION['ID'].'"');
  $req15->execute();
  while ($data = $req15->fetch()){
    if(isset($data['Photo_nom']) && isset($data['Photo_extension'])){
      $PP="../Profil/".$data['Photo_nom'].".".$data['Photo_extension'];
    }
    if(isset($data['Background_nom']) && isset($data['Background_extension'])){
      $BG="../Profil/".$data['Background_nom'].".".$data['Background_extension'];
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="icon" type="image/jpg" href="../Images/logo%20Ebay%20ECE.JPG" />
  <link rel="stylesheet" type="text/css" href="../Style/Style_index.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
</head>
<body>

  <style type="text/css">
    <?php if(isset($BG)){ 
      ?>body{background-image: url("<?php echo $BG; ?>");}<?php
    } ?>
  </style>

  <div id="header">
    <img src="../Images/logo%20Ebay%20ECE.JPG" height="40" width="160"> 
  </div>
  
  <div class="topnav">
    <div style="float:left">
      <a href="index.php">Menu</a>
      <a class="active" href="Produit.php">Produit</a>
      <a href="negociations.php">Négociation</a>
      <a href="Contact.php">Contact</a>
      <a href="about.php">A propos d'ECEbay</a>
      <?php if(isset($_SESSION['type']) && $_SESSION['type']==1){ ?>
        <a href="nv_obj.php">Mettre en vente un objet</a>
        <?php } ?>
      </div>
      <div style="float:right" id="boutons">
        <?php
        if(isset($_SESSION['ID'])){
          ?>
          <form method="post" action="../Traitement/Traitement_deco.php">
            <input type="submit" name="submit_ach" value="Deconnexion">
          </form>
          <?php
        }
        ?>
        <?php
      if(isset($_SESSION['ID']) && $_SESSION['type']==0 && $_SESSION['admin']==0){//ach
        ?>
        <?php if(isset($PP)) { ?>
          <a href="Profil_Acheteur.php"><p>Mon compte</p><img height="27" src="<?php echo $PP; ?>" alt="" hspace="0"></a>
        <?php } else { ?>
          <a href="Profil_Acheteur.php"><p>Mon compte</p><img height="27" src="ImgAcoountSeConnecter.jpg" alt="" hspace="0"></a>
        <?php } ?>
        <a href="Panier.php"><img height="27" src="../Images/Panier.png" alt="" hspace="0"></a>
        <?php
      }else if(isset($_SESSION['ID']) && $_SESSION['type']==1&& $_SESSION['admin']==0){//Vendeur
        ?>
        <a href="Profil_Acheteur.php"><p>Ma page</p><img height="27" src="../Images/ImgAcoountConnexion.jpg" alt="" hspace="0"></a>
        <?php
      }if(isset($_SESSION['ID']) && $_SESSION['admin']==1){//admin
        ?>
        <a href="Profil_Admin.php"><img height="27" src="../Images/ImgAcoountConnexionAdmin.jpg" alt="" hspace="0"></a>
        <?php
      }if(!isset($_SESSION['ID'])){
        ?>
        <a href="connexion.php"><img height="27" src="../Images/ImgAcoountSeConnecter.jpg" alt="" hspace="0"></a>
        <?php
      }
      ?>
    </div>
  </div>       
  <br /> 
  <div style="padding-left:30px">
    <h2><b>Catégories Accessoires VIP</b></h2>
    <img border="0" src="../Images/pub1.JPG" height="180" width="500">
    
    <h3>Objets appartenant à la catégorie VIP</h3>
    </div>
    
        <?php
        try{
          $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
        }
        catch (Exception $e){
          die('Erreur : ' . $e->getMessage());
        }
        $req = $bdd->prepare('SELECT ID,Nom, Photo1_nom, Photo1_extension, Prix, Description, Catégorie FROM objets WHERE Catégorie=3 ORDER BY ID DESC'); //ajouter LIMIT poour en prendre qu'un certain nombre & order bypour que ce soit les dernieres
        $req->execute();
        ?><div id="derniersobj"><?php
        //$r=mysqli_num_rows($req);
        $r=$req->rowCount();
        $i=0;
        ?><center><table><?php
        while ($data = $req->fetch()){
        if($i%2==0){
          ?><tr><?php
        }
        ?><td><?php
        echo '<div id="objet">
        <center>
        <h3><b>'.$data['Nom'].'</b></h3>
        <form method="post" action="objet.php">
        <input type="hidden" name="ID_obj" value="'.$data['ID'].'"/>
        <input type="image" height=200 src="../Objets/'.$data['Photo1_nom'].'.'.$data['Photo1_extension'].'"/>
        </form>
        <form method="post" action="../Traitement/Traitement_favoris.php">
        <input type="hidden" name="ID_obj" value="'.$data['ID'].'"/>
        <p><span style="border: 1px solid grey;" id="Description">'.$data['Description'].'</span></span></p>
        <h3><b>'.$data['Prix'].' €</b><input type="image" height=35 width=65 src="../Images/coeur.png"/></h3> 
        </form>        
        </center>
        </div>
        </td>
        ';
        $i++;
        if($i%2==0){
          ?></tr><?php
        }
        if($i%2!=0 && $i==$r){
          ?></tr><?php
        }
        }
        ?></table></center><?php
        $req->closeCursor();
        ?>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>    
  <div id="footer">
    Copyright &copy; 2020; 
    Clément Viéville - Hugo Teinturier - Kenny Huber
  </div>
    
</body>
</html>