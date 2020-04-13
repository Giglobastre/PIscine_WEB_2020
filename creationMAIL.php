<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="connexion.css" />


</head>

<body class="col">




    <div id="header">
      <img src="logo.JFIF" height="50" width="220"> 
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
    <form class="form" action="creationT.php" method="POST">
        <table >

            <div class="alerte">Adresse mail deja associée a un autre compte</div>

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