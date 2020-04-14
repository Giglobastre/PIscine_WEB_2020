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
    <link rel="stylesheet" type="text/css" href="../Style/Style_contact.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
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
      <a class="active" href="Contact.php">Contact</a>
      <a href="about.php">About</a>
    </div>
    <div style="float:right">
      <a href="connexion.php"><img height="27" src="../Images/ImgAcoountConnexion.jpg" alt="" hspace="0"></a>
      <a href="Panier.php"><img height="27" src="../Images/Panier.png" alt="" hspace="0"></a>
    </div>     
  </div>     

<br> <br> <br> 

    <form id="myform" class="cssform" action="">

	<p><label for="user">Nom :</label>
	<input type="text" id="user" value="" /></p>

	<p><label for="emailaddress">Email :</label>
	<input type="text" id="emailaddress" value="" /></p>

	<p><label for="comments">Message :</label>
	<textarea id="comments" rows="5" cols="25"></textarea></p>

	<p><label for="terms">Conditions g&eacute;n&eacute;rales accept&eacute;es</label>
	<input type="checkbox" id="terms" class="boxes" /></p>

	<p><div style="center">
		<input type="submit" value="Envoyer" />
		<input type="reset" value="Reset" />
	</div>
        </p>
    </form>

      <br>
      <br>
      <br>
  <div id="footer">
    Copiright &copy; 2020; 
    Clément Viéville - Hugo Teinturier - Kenny Huber
  </div>

</body>
</html>