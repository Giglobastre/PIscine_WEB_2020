<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../Style/Style_connexion.css" />


</head>

<body class="col">




    <div id="header">
      <img src="../Images/logo%20Ebay%20ECE.JPG" height="50" width="220"> 
  </div>

  <div class="topnav">
    <div style="float:left">
      <a class="active" href="HomePage.html">Menu</a>
      <a href="produit.html">Produit</a>
      <a href="negociations.php">Négociation</a>
      <a href="panier.html">Mon panier</a>
      <a href="contact.html">Contact</a>
      <a href="about.html">A propos d'ECEbay</a>
  </div>
  <div style="float:right">

  </div>    

</div> 
<br> <br> <br> 
<center >
    <form class="form" action="../Traitement/Traitement_creation.php" method="POST">
        <table >
            
            <div class="alerte">Les deux mots de passe sont differents</div>
            
            <tr>

                <td >Nom </td>
                <td> <input type="text" name="nom"></td>
            </tr>
            <tr>
                <td >Prenom </td>
                <td> <input type="text" name="prenom"></td>
            </tr>
            <tr>
                <td >Pseudo</td>
                <td> <input type="text" name="pseudo"></td>
            </tr>
            <tr>
                <td >Mail </td>
                <td> <input type="text" name="mail"></td>
            </tr>

            <tr>
                <td >Mdp </td>
                <td> <input type="password" name="mdp"></td>
            </tr>
            <tr>
                <td >Comfirmation </td>
                <td> <input type="password" name="mdp2"></td>
            </tr>
            <tr>
              <p><input type="radio" name="type" value="1" > Vendeur <input type="radio" name="type" value="0" checked> Acheteur</p>
            </tr>
            <tr>
                <td></td>
                <td><button  type="submit" name="button1" value="submit">Valider</button></td>
            </tr>
        </table>
    </form>

</center>

</body>

</html>