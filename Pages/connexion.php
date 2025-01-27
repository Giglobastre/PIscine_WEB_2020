<?php 
session_start();

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
  <link rel="stylesheet" type="text/css" href="../Style/Style_connexion.css">
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
      <center>
<br><br><br>
  <form action="../Traitement/Traitement_connexion.php" method="POST">   

      <center>
            <fieldset>
             <legend> <b>Inscription ECEbay</b> </legend>
                 <input type="text" name="nom" placeholder="Nom ">
                 <input type="text" name="prenom" placeholder="Prenom ">
                 <input type="text" name="pseudo" placeholder="Pseudo ">
                 <input type="email" name="mail" placeholder="Mail ">
                 <input  type="password" name="mdp" placeholder="Mot de Passe ">  
                 <input type="password" name="mdp2" placeholder="Confirmation Mot de Passe ">
                 <td > Acheteur <input type="radio" name="type" value="0"checked> </td>
                 <td > Vendeur <input type="radio" name="type" value="1"> </td>
                 <p>
                  <br />
                 <input type="submit" value="S'inscrire" />
                 <input type="reset" value="Annuler" />
                 </p>
            </fieldset>

            <fieldset>
             <legend><b>Connexion</b></legend>
              <input type="email" name="mail2" placeholder="Mail ">
              <input type="password" name="mdp1" placeholder="Mot de Passe">
                <p>
                  <br />
             <input type="submit" value="Se connecter" />
             <input type="reset" value="Annuler" />
             </p>
            </fieldset>
    
            <?php 
            if($_SESSION['Test']==1)

            {

              ?> <h4 class="place"> Veuillez remplir tous les champs</h4><?php

              $_SESSION['Test']=0;

            }?>

            <?php if($_SESSION['Test']==2)

            {

              ?><td> <h4 class="place"> Mot de Passe ou email incorrect</h4><?php

              $_SESSION['Test']=0;

            }?>

            <?php if($_SESSION['Test']==3)

            {

              ?><td> <h4 class="place"> Mots de passe differents</h4><?php

              $_SESSION['Test']=0;

            }?>

            <?php if($_SESSION['Test']==4)

            {

              ?> <h4 class="place"> Email déja asocié à un compte</h4><?php

              $_SESSION['Test']=0;

            }?>        

      </div>  

</center>

    </form>  

</center>

    <br> <br> <br> <br> <br> <br> <br>

     </div>  

    <div id="footer">

      Copyright &copy; 2020; 

      Clément Viéville - Hugo Teinturier - Kenny Huber
</div>



  </body>

  </html>