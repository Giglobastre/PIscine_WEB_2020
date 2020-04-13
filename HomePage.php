<!DOCTYPE html>
<html>

    <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="icon" type="image/jpg" href="logo%20Ebay%20ECE.JPG" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    
    <style>
        #header{
            background-color: white;
            color: right;
            text-align: center;
            padding: 5px;
        }
        body 
            {
              margin: 0;
              font-family: Arial, Helvetica, sans-serif;
            }

            .topnav {
              overflow: hidden;
              background-color: #333;
            }

            .topnav a {
              float: left;
              color: #f2f2f2;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
              font-size: 17px;
            }

            .topnav a:hover {
              background-color: #ddd; 
              color: black;
            }

            .topnav a.active {
              background-color: #4CAF50;
              color: white;
            }
         #footer{
             background-color: black;
             color: white;
             clear: both;
             text-align: center;
             padding: 5px;
        }   
    </style>
    </head>
    <body>
        
        <div id="header">
          <img src="logo%20Ebay%20ECE.JPG" height="50" width="220"> 
        </div>
        
        <div class="topnav">
            <div style="float:left">
          <a class="active" href="HomePage.php">Home</a>
          <a href="news.php">News</a>
          <a href="Produit.php">Produit</a>
          <a href="client.php">Client</a>
          <a href="Contact.php">Contact</a>
          <a href="about.php">About</a>
         </div>
            <div style="float:right">
              <a href="connexion.php"><img height="27" src="ImgAcoountConnexion.jpg" alt="" hspace="0"></a>
              <a href="panier.php"><img height="27" src="Panier.png" alt="" hspace="0"></a>
            </div>     
        </div>       
               
        <div style="padding-left:30px">
            <div id="searchbar">                
            <h2>Que voulez-vous rechercher ?</h2>
                <form action="" class="formulaire">
                   <input class="champ" type="text" placeholder="ECEbay Search.."/>
                    <input class="bouton" type="button" value="Rechercher" />         
                </form>
            </div>
        </div>
        <div>
            <marquee align="center" height="600" scrolldelay="15" scrollamount="15" onmouseout="this.start()" onmouseover="this.stop()"> 
                <p>  
                    <a href="ProduitFerraille.php"><img border="0" src="pub2.JPG" alt="" hspace="0"></a>
                    <a href="ProduitVIP.php"><img border="0" src="pub1.JPG" alt="" hspace="0"></a>
                    <a href="ProduitMus%C3%A9e.php"><img border="0" src="pub3.JPG" alt="" hspace="0"></a>
                    <a href="ProduitFerraille.php"><img border="0" src="pub2.JPG" alt="" hspace="0"></a>
                    <a href="ProduitVIP.php"><img border="0" src="pub1.JPG" alt="" hspace="0"></a>
                    <a href="ProduitMus%C3%A9e.php"><img border="0" src="pub3.JPG" alt="" hspace="0"></a>
                    <a href="ProduitFerraille.php"><img border="0" src="pub2.JPG" alt="" hspace="0"></a>
                    <a href="ProduitVIP.php"><img border="0" src="pub1.JPG" alt="" hspace="0"></a>
                    <a href="ProduitMus%C3%A9e.php"><img border="0" src="pub3.JPG" alt="" hspace="0"></a>
                    <a href="ProduitFerraille.php"><img border="0" src="pub2.JPG" alt="" hspace="0"></a>
                    <a href="ProduitVIP.php"><img border="0" src="pub1.JPG" alt="" hspace="0"></a>
                    <a href="ProduitMus%C3%A9e.php"><img border="0" src="pub3.JPG" alt="" hspace="0"></a>
                    <a href="ProduitFerraille.php"><img border="0" src="pub2.JPG" alt="" hspace="0"></a>
                    <a href="ProduitVIP.php"><img border="0" src="pub1.JPG" alt="" hspace="0"></a>
                    <a href="ProduitMus%C3%A9e.php"><img border="0" src="pub3.JPG" alt="" hspace="0"></a>
                    <a href="ProduitFerraille.php"><img border="0" src="pub2.JPG" alt="" hspace="0"></a>
                    <a href="ProduitVIP.php"><img border="0" src="pub1.JPG" alt="" hspace="0"></a>
                    <a href="ProduitMus%C3%A9e.php"><img border="0" src="pub3.JPG" alt="" hspace="0"></a>              
                </p>
            </marquee>
        </div>
        <div style="padding-left:30px">
            <h2>Objets récements consultés</h2>
                    
            
            
        </div>

        <div id="footer">
            Copiright &copy; 2020; 
            Clément Viéville - Hugo Teinturier - Kenny Huber
        </div>
    </body>
</html>