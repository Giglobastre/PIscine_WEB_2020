<!DOCTYPE html>

<html>

<head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="icon" type="image/jpg" href="logo%20Ebay%20ECE.JPG" />
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
      <a href="news.php">News</a>
      <a href="Produit.php">Produit</a>
      <a href="client.php">Client</a>
      <a href="Contact.php">Contact</a>
      <a href="about.php">About</a>
    </div>
    <div style="float:right">
      <a class="active" href="connexion.php"><img height="27" src="../Images/imgAccountVerte.JPG" alt="" hspace="0"></a>
      <a href="Panier.php"><img height="27" src="../Images/Panier.png" alt="" hspace="0"></a>
    </div>     
  </div>

<br> <br> <br> 

    <center >

    <form class="centre"action="../Traitement/Traitement_connexion.php" method="POST">

        <table>

        <tr>
            <td ><b> Entrez votre Addresse mail <b></td>
            <td> <input type="text" name="mail"></td>
        </tr>

        <tr>
            <td ><b> Entrez votre Mot de Passe <b></td>
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
            <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
    <div id="footer">
      Copiright &copy; 2020; 
      Clément Viéville - Hugo Teinturier - Kenny Huber
    </div>
</body>
</html>