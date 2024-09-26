<meta charset="utf-8">
<?php
$id_p=$Session['login'];
// On commence par récupérer les champs 
if(isset($_POST['id_p']))  
{ 
 // connexion à la base
$db = mysql_connect ('localhost','root','')or die('Erreur de connexion'.mysql_error());

// sélection de la base

mysql_select_db('carnet_de_sante',$db)  or die('Erreur de selection '.mysql_error()); 
 
$reponses = mysql_query("SELECT * FROM vaccin where id_p='$id_p'");

while ($_SESSION = mysql_fetch_array($reponses) )
{ ?>
	
<html> 
	<table BORDER="1" >
				
<tr><td>
				
<?php echo "".$_SESSION['id_vaccin'].'</br>'; ?>

</td>				
<td>				
<?php echo "".$_SESSION['nom_vaccin'].'</br>';  ?>
</td>				
<td>				
<?php echo "".$_SESSION['nb_injection'].'</br>'; ?>				
</td>				
<td>				
<?php echo "".$_SESSION['date_1_injection'].'</br>'; ?>				
</td>						

</tr>			
	

</table>
</html>



<?php
		
echo "<br>";
}

mysql_close($db); // on ferme la connexion 
}  

?> 

