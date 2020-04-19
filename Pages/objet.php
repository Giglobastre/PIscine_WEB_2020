<?php 
session_start();
$_SESSION['Test']=0;
$condi=0;

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
  <link rel="stylesheet" type="text/css" href="../Style/Style_objet.css">
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
      <a class="active" href="index.php">Menu</a>
      <a href="Produit.php">Produit</a>
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

  <?php
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
  }
  catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
  if(isset($_POST['ID_obj'])){
    $req = $bdd->prepare('SELECT ID,Nom, Photo1_nom, Photo1_extension,Photo2_nom, Photo2_extension,Photo3_nom, Photo3_extension,Video_nom, Video_extension, Prix, Description, Catégorie, Methode_vente FROM objets WHERE ID="'.$_POST['ID_obj'].'"');
    $req->execute();

    $req10 = $bdd->prepare('SELECT ID_Client FROM negociations WHERE ID_Objet="'.$_POST['ID_obj'].'"');
    $req10->execute();
    while ($data = $req10->fetch()){
      if($data['ID_Client']==$_SESSION['ID'])
      {
        $condi=1;
        
      }

    }
    $req10->closeCursor();
    while ($data = $req->fetch()){
    //changer tout le echo comme les if ?  la ou pas de variabless par ex pour afficher les images que si elles sont set et la video aussi
      $_SESSION['CAT']=$data['Catégorie'];
      echo '<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <center>
      <h2><b>'.$data['Nom'].'</b></h2>              
      </center>
      <div style="padding-left:300px">
      <table>
      <tr>
      <td><a href="../Objets/'.$data['Photo1_nom'].'.'.$data['Photo1_extension'].'"><img src="../Objets/'.$data['Photo1_nom'].'.'.$data['Photo1_extension'].'"class="img-responsive img-rounded" style="margin:0px auto;max-height:100%" width="300"; /></td>
      <td><a href="../Objets/'.$data['Photo2_nom'].'.'.$data['Photo2_extension'].'"><img src="../Objets/'.$data['Photo2_nom'].'.'.$data['Photo2_extension'].'"class="img-responsive img-rounded" style="margin:0px auto;max-height:100%"width="300";  /></td>
      <td><a href="../Objets/'.$data['Photo3_nom'].'.'.$data['Photo3_extension'].'"><img src="../Objets/'.$data['Photo3_nom'].'.'.$data['Photo3_extension'].'"class="img-responsive img-rounded" style="margin:0px auto;max-height:100%"width="300";  /></td>
      </tr>
      </table>
      </div>
      <center>
      <br />
      <p id="Description">'.$data['Description'].'</p>
      <h3><b>'.$data['Prix'].' €</b></h3>
      <video width="320" height="240" autoplay>
      <source src="../Objets/'.$data['Video_nom'].'.'.$data['Video_extension'].'" type="video/'.$data['Video_extension'].'" />
      source video non supportée par le navigateur
      </video>  
      </center>              
      ';            
        //aff catégorie
      if($data['Catégorie']==1){
        ?>
        <center><p>Catégorie : Féraille et trésor</p></center>
        <?php
      }else if($data['Catégorie']==2){
        ?>
        <center><p>Catégorie : Bon pour le musée</p></center><?php
      }else if($data['Catégorie']==3){
        ?><center><p>Catégorie : Accessoire VIP</p></center><?php
      }

      
    //aff bouton pour participer a la vente
    //RELIER LES FORMS A UNE PAGE //////////////////////////////////////////////////////////////////////////////
    if($data['Methode_vente']==0 && isset($_SESSION['ID'])){//enchere
      ?>
      <center>
        <br/><br/>
        <form action="../Traitement/Traitement_calculpanier" method="post">
          <input type="hidden" name="ID_obj" value="<?php echo $data['ID'];?>">
          <input type="hidden" name="ID_ach" value="<?php echo $_SESSION['ID'];?>">
          <label for="prixdonne">Montant maximum : </label><input type="text" name="prixdonne">
          <input type="submit" name="submit" Value="Particper a l'enchère">
        </form>
      </center>
      <?php
    }
    else if($data['Methode_vente']==1 && isset($_SESSION['ID'])){//nego
      if($condi==0)
      {
        ?>
        <br/><br/>
        <center>
          <form action="../Traitement/Traitement_negociation.php" method="POST">
            <input type="hidden" name="ID_obj" value="<?php echo $data['ID'];?>">
            <input type="hidden" name="ID_ach" value="<?php echo $_SESSION['ID'];?>">
            <input type="hidden" name="type" value="0">
            <input type="text" name="prixdonne"><label for="prix">Proposez un prix : </label>
            <input type="submit" name="submit" Value="Proposer">
          </form>
          </center><?php
        }

        if($condi==1)
      {
        ?>
        <br/><br/>
        <center>
          <form action="../Pages/negociations.php" method="POST">
            <input type="hidden" name="ID_obj" value="<?php echo $data['ID'];?>">
            <input type="hidden" name="ID_ach" value="<?php echo $_SESSION['ID'];?>">
            <input type="hidden" name="type" value="0">
            <label for="prix">Vous avez deja fait une offre : </label>
            <input type="submit" name="submit" Value="Voire l'etat de l'offre">
          </form>
          </center><?php
        }
        
      }
    if(isset($_SESSION['ID'])){//achat immediat
      ?>
      <br/><br/>
      <center>
        <form action="../Traitement/Traitement_achatimmediat.php" method="post">
          <input type="hidden" name="ID_obj" value="<?php echo $data['ID'];?>">
          <input type="hidden" name="ID_ach" value="<?php echo $_SESSION['ID'];?>">
          <p>Acheter immediatement, prix : <?php echo $data['Prix']*3;?></p>
          <input type="submit" name="submit" Value="Acheter">
        </form>
      </center>

      <?php
    }
    else if(!isset($_SESSION['ID'])){//connexion
      ?>
      <br/><br/>
      <center>
        <form>
          <a href="connexion.php"><img height="20" width="20" src="../Images/warning.PNG" alt="" hspace="0"><a/>
            <p style="color:#FF0000";>Connectez vous ou créez-vous un compte pour acheter ce produit.</p>
            <a href="connexion.php"><img height="20" width="130" src="../Images/inscriptionConnexion.PNG" alt="" hspace="0"></a>
          </form>
        </center>
        <?php
    }//fermeture if avant while
  }
}
?>
<br/><br/><br/>

<?php
echo "////////////////////////////////////";
echo $_SESSION['CAT'];
  if(isset($_SESSION['ID'])){
    $req= $bdd->prepare('UPDATE utilisateurs SET Type_derniervu="'.$_SESSION['CAT'].'" WHERE ID="'.$_SESSION['ID'].'"');
    $req->execute();
  }
  unset($_SESSION['CAT']);
?>



<div id="footer">
  Copyright &copy; 2020; 
  Clément Viéville - Hugo Teinturier - Kenny Huber
</div>
</body>
</html>