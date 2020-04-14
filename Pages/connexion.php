<!DOCTYPE html>
<html>

    <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="icon" type="image/jpg" href="logo%20Ebay%20ECE.JPG" />
    <link rel="stylesheet" type="text/css" href="../Styles/Style_connexion.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    
    </head>
    <body>
        
        <div id="header">
          <img src="logo%20Ebay%20ECE.JPG" height="50" width="220"> 
        </div>
        
        <div class="topnav">
            <div style="float:left">
          <a href="index.php">Home</a>
          <a href="favoris.php">Favoris</a>
          <a href="Panier.php">Mon panier</a>
          <a href="parametres.php">Parametres</a>
          <a href="Contact.php">Contact</a>
          <a href="about.php">About</a>

         </div>
            <div style="float:right">
              <a class="active" href="connexion.php"><img height="27" src="imgAccountVerte.JPG" alt="" hspace="0"></a>
            </div>     
        </div>       
               
        <div style="padding-left:30px">
            <div id="searchbar">                
            <h1>Que voulez-vous rechercher ?</h1>
                <form action="" class="formulaire">
                   <input class="champ" type="text" placeholder="ECEbay Search.."/>
                    <input class="bouton" type="button" value="Rechercher" />         
                </form>
            </div>
        </div>
                    
        <form class="centre"action="../Traitement/Traitement_connexion.php" method="POST">
        <table>
        <tr>
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
            
            
        <div id="footer">
            Copiright &copy; 2020; 
            Clément Viéville - Hugo Teinturier - Kenny Huber
        </div>
    </body>
</html>