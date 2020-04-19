<?php
session_start();

	 
		$header="MIME-Version: 1.0\r\n";
        $header.='From: "ECEbay F.A.Q."<support@gmail.com>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';
			$bdd = new PDO('mysql:host=localhost;dbname=pj_web2020;charset=utf8', 'root', '');
             $req5= $bdd->prepare("SELECT ID_Client ,ID_Objet,Acquereur,ID_transac,Prix_max,Nom FROM panier"); 
               $req5->execute();?>
		<?php echo("kkk")?>
		<html>
			<body>
				<div align="center">
					<br />
                    <img src="../Images/logo%20Ebay%20ECE.JPG">
                    <br />
					
					<u>Vous avez acheté :</u><br />
                    <?php
                      while ($data = $req5->fetch()){
                        if(($data['ID_Client']==$_SESSION['ID'])&&($data['Acquereur']==4))
                        {
                         ?>
                            <tr>
                            	<?php echo("kkk")?>
                              <td><?php echo $data['Nom'];?></td>
                              <td><?php echo $data['ID_Objet'];?></td>


                              <td><?php echo ($data['Prix_max']);?></td>
                              </tr><?php

                          }
                        }
                        ?>
					<u>Vous pouvez toujours joindre ECEbay à l\'adresse mail : vieville.clement0@gmail.com.</u><br />
					<br />
				</div>
			</body>
		</html>
		';<?php
$req5->closeCursor();;
		mail("hugo.teinturier@gmail.com", "Résumé de votre commande", "jjj", $header);
		echo"Vous avez reçus un mail de confirmation dans votre boite mail.";
	
?>