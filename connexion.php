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
  <link rel="stylesheet" type="text/css" href="../Style/Style_connexion.css" />

</head>

<body class="col">

  <div id="header">
    <img src="../Images/logo%20Ebay%20ECE.JPG" height="40" width="160"> 
  </div>    

  <div class="topnav">
    <div style="float:left">
      <a href="index.php">Home</a>
      <a href="AchatsPrécedents.php">Achats Précedents</a>
      <a href="Favoris.php">Favoris</a>
      <a href="Contact.php">Contact</a>
      <a href="about.php">About</a>
      <a href="Paramètres.php">Paramètres</a>
    </div>
    <div style="float:right">
      <a class="active" href="connexion.php"><img height="27" src="../Images/imgAccountVerte.JPG" alt="" hspace="0"></a>
      <a href="Panier.php"><img height="27" src="../Images/Panier.png" alt="" hspace="0"></a>
    </div>     
  </div>
  

  <br>

<center><h1 > Bonjour :  </h1></center>
  <form action="../Traitement/Traitement_connexion.php" method="POST">   

    <div style="padding-left:300px">
      <table >
        <tr>
          <td><h2><b>Inscription ECEbay</b></h2></td>
          <td><h2><b>Connexion</b></h2></td>
        </tr>


        <tr>
          <td> <input type="text" name="nom" placeholder="Nom "></td>
        </tr>
        <tr>
          <td><input type="text" name="prenom" placeholder="Prenom "></td>
          <td><input type="email" name="mail2" placeholder="Mail "></td>
        </tr>
        <tr>
          <td> <input type="text" name="pseudo" placeholder="Pseudo "></td>
          <td><input type="text" name="mdp1" placeholder="Mot de Passe ">  </td>

        </tr>

        <tr>
          <td><input type="email" name="mail" placeholder="Mail "></td>
          
          </tr>
          <br>
          <tr>                
            <td><input  type="text" name="mdp" placeholder="Mot de Passe ">  </td>
            

          </tr>
          <br>
          <tr></tr>
          <tr>  
            <td><input type="text" name="mdp2" placeholder="Mot de Passe ">  </td>

          </tr>

          <tr>    
            <td><b><input type="submit" name="button1" value="Inscription"></b></td>
            <td><b><input type="submit" name="button2" value="Connexion"></b></td>
          </tr>


          <tr>
            <td style="  width:500px";></td> 
          </tr>

          <tr>    
            <td > Acheteur <input type="radio" name="type" value="0"checked> </b></td>
          </tr>

          <tr>    
            <td > Vendeur <input type="radio" name="type" value="1" ></td>
          </tr>
          </table>
          
            <?php if($_SESSION['Test']==1)
            {
              ?> <h4 class="place"> Veuillez remplir tous les champs</h4><?php
              $_SESSION['Test']=0;
            }?>
            <?php if($_SESSION['Test']==2)
            {
              ?><td> <h4 class="place"> Mot de Passe ou email incorect</h4><?php
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

    </form>  



    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
     </div>  
    <div id="footer">
      Copyright &copy; 2020; 
      Clément Viéville - Hugo Teinturier - Kenny Huber
   

  </body>
  </html>