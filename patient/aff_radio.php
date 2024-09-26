<?php


session_start();
ini_set('display_errors','off');

	?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Analyse</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="css/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="css/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="css/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="css/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="css/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="css/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">




<?PHP include("menu/header.php");
include("menu/nav_bar.php");

?>
  




  <br>
  <br>
  <br>

<!-- Start Formoid form-->
<link rel="stylesheet" href="css/formoid_files/formoid1/formoid-solid-green.css" type="text/css" />
<script type="text/javascript" src="css/formoid_files/formoid1/jquery.min.js"></script>
  
  <center>
<h2>Les Radios</h2>
          
  <table class="table table-hover"style ="margin-left:200px;width:850px;" >
    <thead>
      <tr>
        <th><b>type_radio:</b></th>
		<th><b>partie_corps:</b></th>
        <th><b>nom_maladie:</b></th>
		<th><b>date_resultat:</b></th>
        <th>commentaires_radio:</th>
        
      </tr>
	  
    </thead>  
<tbody>	

<?php 


  // connexion à la base
$db = mysql_connect ('localhost', 'root', '') or die('Erreur de connexion '.mysql_error());

// sélection de la base  
 mysql_select_db('carnet_de_sante',$db) or die('Erreur de selection '.mysql_error());  
$id_p = $_SESSION['login_p'];
//$ligne = mysql_query("SELECT * FROM antecedant ") ; 
//while ($champ = mysql_fetch_object($ligne) )
	
	
	

 $bd = mysql_query("SELECT * FROM radio where id_p='$id_p'");
 
// $bd = mysql_query('SELECT * FROM radio where id_analyse in (SELECT id_analyse FROM radio,consultation2  WHERE consultation2.id_cons2=radio.id_cons2 and id_p = '.$id_p.') ');
while($base = mysql_fetch_object($bd)){
 echo "


 
      <tr>
        <td>$base->type_rad</td>
		<td>$base->partie_corps</td>
        <td>$base->motif_radio</td>
		<td>$base->date_resultat_radio</td>
        <td>$base->commentaires_radio</td>
        
      </tr>
	  
	  ";

}
mysql_close($db); // on ferme la connexion 

?> 

</tbody>
</table>

</center>

<!--<br><br><input class="btn1" type="submit" value="Envoyer" name="submit">-->


<script type="text/javascript" src="css/formoid_files/formoid1/formoid-solid-green.js"></script> 
<!-- Stop Formoid form--> 




<!-- jQuery 2.2.0 -->
<script src="css/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="css/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="css/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="css/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="css/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="css/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="css/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="css/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="css/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="css/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="css/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="css/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="css/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="css/dist/js/demo.js"></script>
</body>
</html>
