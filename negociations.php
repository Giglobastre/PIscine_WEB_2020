<?php 
session_start();
?>
<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="icon" type="image/jpg" href="../Images/logo%20Ebay%20ECE.JPG"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
  <link rel="stylesheet" type="text/css" href="../Style/Style_negociations.css" />

</head>

<body class="col">

  <div id="header">
    <img src="../Images/logo%20Ebay%20ECE.JPG" height="40" width="160"> 
  </div>    

  <div class="topnav">
    <div style="float:left">
      <a href="index.php">Menu</a>
      <a href="AchatsPrécedents.php">Achats Précedents</a>
      <a href="Favoris.php">Favoris</a>
      <a class="active" href="negociations.php">Négociation</a>
      <a href="Contact.php">Contact</a>
      <a href="about.php">A propos d'ECEbay</a>
      <a href="Paramètres.php">Paramètres</a>
    </div>
    <div style="float:right">
      <a href="connexion.php"><img height="27" src="../Images/imgAccountVerte.JPG" alt="" hspace="0"></a>
      <a href="Panier.php"><img height="27" src="../Images/Panier.png" alt="" hspace="0"></a>
    </div>     
  </div>
  

  <br>

  <h1 > Negociation(s) en cours  </h1>
  <form action="../Traitement/Traitement_negociation.php" method="POST">   


    <table class="table-bordered  table-striped" >

      <?php
      $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
      $req = $bdd->prepare("SELECT ID_Client,ID_Objet,ID_Vendeur,CPT,Offre,Coffre FROM negociations WHERE Acquereur=0 "); 
      $req->execute();
      while ($data = $req->fetch()){
        


        if(($data['ID_Client']==$_SESSION['ID']))
        {
          

          if($data['CPT']%2==0)
            {?>
              <tr>

                <td class="espace">ID objet</td>
                <td class="espace">Etat</td>
                <td class="espace">Nouvelle offre</td>
                <td class="espace">Choix</td>
                <td class="espace"> Faire une contre offre</td>
                <td class="espace">Valider</td>

              </tr>
              <tr>
                <td ><?php echo $data['ID_Objet'];?></td><?php
                ?><td >En attente de votre reponse</td><?php
                ?><td ><?php echo $data['Coffre'];?></td><?php
                ?><input type="hidden" name="ID_obj" value="<?php echo $data['ID_Objet'];?>">
                <td >oui <input type="radio" name="type" value="1"checked> non <input type="radio" name="type" value="0"checked> </b></td>
                <td ><input type="text" name="prixdonne" placeholder="Prix "></td>
                <td ><input type="submit" name="button" ></td></tr></tr>
                <?php
              }
              else
                {?>
                  <tr>

                    <td class="espace">ID objet</td>
                    <td class="espace">Etat</td>
                    <td class="espace">Votre offre</td>
                    <td class="espace">Tour restant</td>


                  </tr><tr>
                    <td ><?php echo $data['ID_Objet'];?></td><?php
                    ?><td >En attente du vendeur</td><?php
                    ?><td ><?php echo $data['Offre'];?></td><?php


                    ?><td ><?php echo (10-$data['CPT']);?></td><?php


                  }?>
                  <?php
                }




                if(($data['ID_Vendeur']==$_SESSION['ID']))
                {
                 

                  if($data['CPT']%2==1)
                    {?>
                      <tr>

                        <td class="espace">ID objet</td>
                        <td class="espace">Etat</td>
                        <td class="espace">Nouvelle offre</td>
                        <td class="espace">Choix</td>
                        <td class="espace"> Faire une contre offre</td>
                        <td class="espace">Valider</td>

                      </tr>
                      <tr>
                        <td ><?php echo $data['ID_Objet'];?></td><?php
                        ?><td >En attente de votre reponse</td><?php
                        ?><td ><?php echo $data['Offre'];?></td><?php
                        ?><input type="hidden" name="ID_obj" value="<?php echo $data['ID_Objet'];?>">
                        ?><td >oui <input type="radio" name="type" value="1"checked> non <input type="radio" name="type" value="0"checked> </b></td>
                        <td ><input type="text" name="prixdonne" placeholder="Prix "></td>
                        <td ><input type="submit" name="button" ></td></tr></tr>
                        <?php
                      }
                      else
                        {?>
                          <tr>

                            <td class="espace">ID objet</td>
                            <td class="espace">Etat</td>
                            <td class="espace">Votre offre</td>
                            <td class="espace">Tour restant</td>


                          </tr><tr>
                            <td ><?php echo $data['ID_Objet'];?></td><?php
                            ?><td >En attente du vendeur</td><?php
                            ?><td ><?php echo $data['Coffre'];?></td><?php


                            ?><td ><?php echo $data['CPT'];?></td></tr><?php


                          }?>
                          <?php
                        }


                        
                        





                      }
                      $req->closeCursor();;


                      ?></table>
                      <table>
                        <h1>Negociation(s) finie(s)</h1>
                        <tr>

                          <td class="espace">ID objet</td>
                          <td class="espace">Etat</td>
                          <td class="espace">ID vendeur</td>
                          <td class="espace">Prix final</td>

                        </tr>
                        <?php




                        $req5 = $bdd->prepare("SELECT ID_Client,ID_Objet,ID_Vendeur,CPT,Offre,Coffre,Prix_final,Acquereur FROM negociations WHERE Acquereur!=0 "); 
                        $req5->execute();

                        while ($data = $req5->fetch()){
                         


                          if(($data['ID_Client']==$_SESSION['ID']))
                          {
                            

                            ?>

                            <tr>

                              <?php
                              if($data['Acquereur']==1)
                              {
                                ?><td class="espac" ><?php echo $data['ID_Objet'];?></td>
                                <td class="espac">Finis</td><?php
                                ?><td class="espac"><?php echo $data['ID_Vendeur'];?></td><?php
                                ?><td class="espac"><?php echo $data['Prix_final'];?></td></tr><?php

                              }

                              if($data['Acquereur']==3)
                              {

                                ?><td class="espa" ><?php echo $data['ID_Objet'];?></td>
                                ?><td class="espa">Annulée</td><?php
                                ?><td class="espa"><?php echo $data['ID_Vendeur'];?></td><?php
                                ?><td class="espa">////////<td><?php

                              }

                            }




                            if(($data['ID_Vendeur']==$_SESSION['ID']))
                            {
                             

                              
                              ?>
                              <tr>

                                <?php
                                if($data['Acquereur']==1)
                                {
                                  ?><td class="espac" ><?php echo $data['ID_Objet'];?></td>
                                  ?><td class="espac">Finis</td><?php
                                  ?><td class="espac"><?php echo $data['ID_Client'];?></td><?php
                                  ?><td class="espac"><?php echo $data['Prix_final'];?></td></tr><?php

                                }

                                if($data['Acquereur']==3)
                                {

                                  ?><td class="espa" ><?php echo $data['ID_Objet'];?></td>
                                  ?><td class="espa">Annulée</td><?php
                                  ?><td class="espa"><?php echo $data['ID_Client'];?></td><?php
                                  ?><td class="espa">////////<td><?php

                                }

                                



                              }








                            }
                            $req->closeCursor();;?>



                          </table>

                        </form>
                      </body>
                      </html>