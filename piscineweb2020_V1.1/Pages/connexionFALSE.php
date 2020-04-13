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
          <a class="active" href="HomePage.html">Home</a>
          <a href="news.html">News</a>
          <a href="produit.html">Produit</a>
          <a href="client.html">Client</a>
          <a href="panier.html">Mon panier</a>
          <a href="contact.html">Contact</a>
          <a href="about.html">About</a>
         </div>
            <div style="float:right">
             
            </div>    

        </div> 
<br> <br> <br> 
    <center >
    <form class="centre"action="../Traitement/Traitement_connexion.php" method="POST">
        <table>
          <div class="alerte">Adresse mail ou mot de passe incorect</div>
            <td >mail </td>
            <td> <input type="text" name="mail"></td>
        </tr>

        <tr>
            <td >mdp </td>
            <td> <input type="text" name="mdp"></td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="button1" value="submit"></td>
        </tr>
    </table>
    </form>



</body>

</html>