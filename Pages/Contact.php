<?php
if(isset($_POST['mailform']))
{
  if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
  {
    $header="MIME-Version: 1.0\r\n";
        $header.='From: "ECEbay F.A.Q."<support@gmail.com>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';

    $message='
    <html>
      <body>
        <div align="center">
          <br />
          <img src="../Images/logo%20Ebay%20ECE.JPG">
          <br />
          <u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
          <u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
          <br />
          '.nl2br($_POST['message']).'
          <br />
        </div>
      </body>
    </html>
    ';

    mail("vieville.clement0@gmail.com", "ECEbay F.A.Q.", $message, $header);
    $msg="Votre message a bien été envoyé !";
  }
  else
  {
    $msg="Veuillez renseigner tous les champs.";
  }
}
?>
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
  <link rel="stylesheet" type="text/css" href="../Style/Style_contact.css">
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
      <a href="Produit.php">Produit</a>
      <a href="negociations.php">Négociation</a>
      <a class="active" href="Contact.php">Contact</a>
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

    <body class="col">
    <center>
        
            <form action="" method="post" >

            <fieldset>
             <legend> Contact </legend>                 
                 <input type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
                 <input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
                 <textarea name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br /><br />
                 <a href="../Images/Projet_piscine_2020.pdf"><img src="../Images/cg.PNG" height=15 width=170></a>
                 <br>
            </fieldset>

             <p>
             <input type="submit" value="Envoyer" name="mailform"/>
             <input type="reset" value="Annuler" />
             </p>

            </form>
            </center>
        
        <?php
        if(isset($msg))
        {
            echo $msg;
        }
        ?>
        <br><br><br> <br><br> <br> <br><br> <br> <br><br> <br> <br> 

  <div id="footer">
    Copyright &copy; 2020; 
    Clément Viéville - Hugo Teinturier - Kenny Huber
  </div>
        
  </body>
</html>