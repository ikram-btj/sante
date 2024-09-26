<meta charset="utf-8">
<?php 
// On commence par récupérer les champs 
if( isset($_POST['nom_h']) and  isset($_POST['wilaya_h']) 
	and isset($_POST['region_h']))
	{
	
 
  $nom_h=$_POST['nom_h'];
  $wilaya_h=$_POST['wilaya_h'];
  $region_h=$_POST['region_h'];

  // connexion à la base
$db = mysql_connect ('localhost', 'root', '')  or die('Erreur de connexion '.mysql_error());
// sélection de la base  

    mysql_select_db('carnet_de_sante',$db)  or die('Erreur de selection '.mysql_error()); 
     
    // on écrit la requête sql 
    $sql =  mysql_query("INSERT INTO hopitale VALUES('','$nom_h','$wilaya_h','$region_h')") 
	or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
    // on insère les informations du formulaire dans la table R
    

    // on affiche le résultat pour le visiteur 
    echo 'Votre hopitale a ete ajoutes.'; 

    mysql_close($db);  // on ferme la connexion 
    }
	else   { 
    echo '<font color="red" size=6>Attention, un champs  est vide !</font>'; 
    } 
?> 
