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
  <link rel="stylesheet" type="text/css" href="../Style/Style_panier.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
</head>
<body>

  <div id="header">
    <img src="../Images/logo%20Ebay%20ECE.JPG" height="40" width="160"> 
  </div>
  
  <div class="topnav">
    <div style="float:left">
      <a href="index.php">Menu</a>
      <a href="Produit.php">Produit</a>
      <a href="negociations.php">Négociation</a>
      <a href="Contact.php">Contact</a>
      <a href="about.php">A propos d'ECEbay</a>
    </div>
    <div style="float:right">

      <?php
      if(isset($_SESSION['ID'])){
        ?>
        <form method="post" action="../Traitement/Traitement_deco.php">
          <input type="submit" value="Deconnexion">
        </form>
        <?php
      }
      if(isset($_SESSION['type']) && $_SESSION['type']==0){//acheteur
        ?>
        <form method="post" action="">
          <input type="submit" name="submit_ach" value="Mes achats">
        </form>
        <?php
      }
      if(isset($_SESSION['type']) && $_SESSION['type']==1){//vendeur
        ?>
        <form method="post" action="">
          <input type="submit" name="submit_ach" value="Mes ventes">
        </form>
        <?php
      }
      if(isset($_SESSION['admin']) && $_SESSION['admin']==1){//admin
        ?>
        <form method="post" action="">
          <input type="submit" name="submit_ach" value="Administration">
        </form>
        <?php
      }
      ?>
      <?php
      if(isset($_SESSION['ID']) && $_SESSION['type']==0 && $_SESSION['admin']==0){//ach
        ?>
        <a href="Profil_Acheteur.php"><p>Ma page</p><img height="27" src="../Images/ImgAcoountConnexion.jpg" alt="" hspace="0"></a>
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

  <h1> VOTRE PANIER</h1>
  <table class="table table-bordered table-striped table-dark">

    <tr class="panier">
      <td class="espace">Nom produit</td>
      <td class="espace">reference</td>
      <td class="espace">Type achat</td>
      <td class="espace">Prix</td>
    </tr>

    <?php 


    if(isset($_SESSION['ID']))
    {

      $total=0;
      $condition=0;
      try{
        $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');

        $req = $bdd->prepare("SELECT ID_Client ,ID_Objet,Acquereur,ID_transac FROM panier"); 
        $req->execute();

        while ($data = $req->fetch()){

          if(($data['ID_Client']==$_SESSION['ID'])&&($data['Acquereur']==1))
          {
            $condition=1;

            $req2 = $bdd->prepare("SELECT ID,Prix,Nom,Methode_vente FROM objets WHERE ID='".$data['ID_Objet']."'"); 
            $req2->execute();

            while ($data = $req2->fetch())
            {
              $total=$data['Prix']+$total;?>
              <tr>
                <td><?php echo $data['Nom'];?></td>
                <td><?php echo $data['ID'];?></td>
                <?php if($data['Methode_vente']==0)
                {
                  ?><td>Enchere</td><?php
                }?>
                <?php if($data['Methode_vente']==1)
                {
                  ?><td><Negociation</td><?php
                }?>
                <td><?php echo $data['Prix'];?></td>
                </tr><?php
              }
              $req2->closeCursor();;
            }

            if(($data['ID_Client']==$_SESSION['ID'])&&($data['Acquereur']==3))
            {
              $condition=1;

              $req2 = $bdd->prepare("SELECT ID,Prix,Nom,Methode_vente FROM objets WHERE ID='".$data['ID_Objet']."'"); 
              $req2->execute();

              while ($data = $req2->fetch())
              {
                $total=(($data['Prix'])*3)+$total;?>
                <tr>
                  <td><?php echo $data['Nom'];?></td>
                  <td><?php echo $data['ID'];?></td>


                  ?><td>Achat immediat</td><?php
                  ?>
                  <td><?php echo ($data['Prix']*3);?></td>
                  </tr><?php
                }
                $req2->closeCursor();;
              }
            }
            $req->closeCursor();;
            ?>
            <tr>
              <td></td>
              <td></td>
              <td class="grey">Total</td>
              <td class="grey"><?php echo $total;?></td>
            </tr>
            <form action="../Pages/process.php" method="post">
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="submit" value="Payer"></td>
              </tr>
            </form>
          </table>
          <h1>VOS AFFAIRES SUIVIES</h1>
          <table class="table table-bordered table-striped">
            <tr class="panier">
              <td class="espace">Nom produit</td>
              <td class="espace">reference</td>
              <td class="espace">Type achat</td>

              <td class="espace">Faire une offre</td>
              <td class="espace">Prix</td>
            </tr>
            <?php
            $req5= $bdd->prepare("SELECT ID_Client ,ID_Objet,Acquereur,ID_transac FROM panier"); 
            $req5->execute();
            while ($data = $req5->fetch()){
              if(($data['ID_Client']==$_SESSION['ID'])&&($data['Acquereur']==0))
              {
                $req6 = $bdd->prepare("SELECT ID,Prix,Nom,Methode_vente FROM objets WHERE ID='".$data['ID_Objet']."'"); 
                $req6->execute();
                while ($data = $req6->fetch())
                {
                  $total=$data['Prix']+$total;?>
                  <tr>
                    <td><?php echo $data['Nom'];?></td>
                    <td><?php echo $data['ID'];?></td>
                    <?php if($data['Methode_vente']==0)
                    {
                      ?><td>Enchere</td><?php
                    }?>
                    <?php if($data['Methode_vente']==1)
                    {
                      ?>
                      <form action="../Pages/objet.php" method="post">
                        <td>

                          <input type="hidden" name="ID_obj" value="<?php echo $data['ID'];?>"> Negociation</td>
                          <td> <input type="submit" name="submit" Value="Faire une offre">

                          </td>
                          </form><?php
                        }?>
                        <td><?php echo $data['Prix'];?></td>
                        </tr><?php
                      }
                      $req6->closeCursor();;
                    }
                  }
                  $req5->closeCursor();;
                }
                catch (Exception $e){
                  die('Erreur : ' . $e->getMessage());
                }
              }
              else
              {
                echo("connectez vus");

              }?>
            </table>
            <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
            <div id="footer">
              Copyright &copy; 2020; 
              Clément Viéville - Hugo Teinturier - Kenny Huber
            </div>
          </body>
          </html>