<?php
session_start();

ini_set('display_errors','off');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
   
<body>
  <header>
<?php include("menu/header.php");?>
</header>


<?php include("menu/boxMedcine.php");?>      

<?php 


  // connexion à la base
$db = mysql_connect ('localhost', 'root', '') or die('Erreur de connexion '.mysql_error());

// sélection de la base  
 mysql_select_db('carnet_de_sante',$db) or die('Erreur de selection '.mysql_error());  
$id_p = $_SESSION['login_p'];
//$ligne = mysql_query("SELECT * FROM analyse ") ; 
//while ($champ = mysql_fetch_object($ligne) )
	
	
	
echo'<center><table border="1" bordercolor="silver"></center>';
		echo '<tr>
 <td>  type_analyse: </td> 
 <td>  date_resultat_analyse: </td>
 <td> image_analyse: </td> 
 </tr>';
 
 $bd = mysql_query('SELECT  * FROM analyse where id_p = '.$id_p.'  ') ;
while($base = mysql_fetch_object($bd))
	
 echo "
 
 
<div class="container">
  <h2>Hover Rows</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>type_analyse</th>
        <th>date_resultat_analyse</th>
        <th>image_analyse</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
</div>

 
 
 <tr> 
<td>$base->type_analyse</td>
 <td>$base->date_resultat_analyse</td>
 <td>$base->image_analyse</td>
 <td>$base->image_analyse</td>
 
 <tr>";


mysql_close($db); // on ferme la connexion 

?> 

 </body>
</html>