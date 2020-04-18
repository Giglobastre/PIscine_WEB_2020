<meta charset="utf-8" />
<?php 
      $bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
        if(!empty($_GET['ID']) AND !empty($_GET['ID'])) {
            $getid=htmlspecialchars($_GET['ID']);
            
            $objets=$bdd->prepare('SELECT ID,Nom, Photo1_nom, Photo1_extension, Prix, Description FROM objets WHERE ID = ?');
            $objets->execute(array($getid));
            $objets=$objets->fetch(); 
            
            if(isset($_POST['submit_commentaire'])){
                if(isset($_POST['pseudo'],$_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire'])){
                    $pseudo=htmlspecialchars($_GET['pseudo']);
                    $commentaire=htmlspecialchars($_GET['commentaire']);                    
                    $ins=$bdd->prepare('INSERT INTO commentaires (pseudo, commentaire, ID)');
                }
                else{
                        $c_erreur="Tous les champs doivent être complétés.";
                    }
                }
                ?>
                <div id="derniersobj">
                    <?php
                echo '<div id="objet">
                <center>
                <h3><b>'.$data['Nom'].'</b></h3>
                <form method="post" action="objet.php">
                <input type="hidden" name="ID_obj" value="'.$data['ID'].'"/>
                <input type="image" height=200 src="../Objets/'.$data['Photo1_nom'].'.'.$data['Photo1_extension'].'"/>
                </form>
                <p><span style="border: 1px solid grey;" id="Description">'.$data['Description'].'</span></p>
                <h3><b>'.$data['Prix'].' €</b><a href="Favoris.php"><img src="../Images/coeur.png" height=35 width=65></a></h3>            
                </center>
                </div>
                
                <h3><b>Commentaires :</b></h3>

                <form method="post" >
                    <input type="text" name="pseudo" placeholder="votre pseudo"/>
                    <textarea name="commentaire" placeholder="votre commentaire"></textarea>
                    <input type="submit" value="poster commentaire" name="submit_commentaire"/>
                </form>    
                <?php if(isset($c_erreur)){echo "Erreur: ".$c_erreur;}?>
                <?
                </div>

                ';
}
?>