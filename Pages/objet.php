<?php 
session_start();
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

  <div id="header">
    <img src="../Images/logo%20Ebay%20ECE.JPG" height="40" width="160"> 
  </div>
  
  <div class="topnav">
    <div style="float:left">
      <a href="index.php">Home</a>
      <a href="news.php">News</a>
      <a class="active" href="Produit.php">Produit</a>
      <a href="Contact.php">Contact</a>
      <a href="about.php">About</a>
    </div>
    <div style="float:right">
      <a href="connexion.php"><img height="27" src="../Images/ImgAcoountSeConnecter.jpg" alt="" hspace="0"></a>
      <a href="Panier.php"><img height="27" src="../Images/Panier.png" alt="" hspace="0"></a>
    </div>     
  </div>       
  <br/>
        
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
            <a href="" />
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
        <label for="prix">Montant maximum : </label><input type="text" name="prixdonne">
        <input type="submit" name="submit" Value="Particper a l'enchère">
        </form>
    </center>
        <?php
    }
    else if($data['Methode_vente']==1 && isset($_SESSION['ID'])){//nego
      ?>
    <br/><br/>
        <center>
        <form>
        <input type="hidden" name="ID_obj" value="<?php echo $data['ID'];?>">
        <input type="hidden" name="ID_ach" value="<?php echo $_SESSION['ID'];?>">
        <input type="text" name="prix"><label for="prix">Proposez un prix : </label>
        <input type="submit" name="submit" Value="Proposer">
        </form>
        </center>
            <?php
    }
    if(isset($_SESSION['ID'])){//achat immediat
      ?>
    <br/><br/>
    <center>
      <form>
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
    }
  }
?>
    <br/><br/><br/>
    
    <div id="footer">
        Copyright &copy; 2020; 
        Clément Viéville - Hugo Teinturier - Kenny Huber
    </div>
</body>
</html>