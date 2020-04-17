<?php 
  session_start();
?>
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
    <form class="form" action="../Traitement/Traitement_paiement.php" method="POST">
        <table >
            <tr>
            <td >Nom sur la carte</td>
            <td> <input type="text" name="nom"></td>
        </tr>
        <tr>
            <td >Prenom sur la carte </td>
            <td> <input type="text" name="prenom"></td>
        </tr>
        <tr>
            <td >Numero de carte</td>
            <td> <input type="text" name="numero"></td>
        </tr>
        <tr>
            <td> Date expiration </td>
            <td> <input type="text" name="date"></td>
        </tr>

        <tr>
            <td >CVV </td>
            <td> <input type="password" name="cvv"></td>
        </tr>
        
        <tr>
        </tr>
        <tr>
        <p><input type="radio" name="type" value="1" checked> Visa <input type="radio" name="type" value="0" > American express<input type="radio" name="type" value="3" > Mastercard</p><input type="radio" name="type" value="4" > Paypal</p>
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