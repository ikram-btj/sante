<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php


session_start();
  $id_p =$_SESSION['login_p'];

	?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>intervention</title>
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


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lister Prehospitalisation</title>
<link rel="stylesheet" href="../Style/css/mm_health_nutr.css" type="text/css" />
</head>
<body class="hold-transition skin-blue sidebar-mini">



<?PHP include("menu/header.php");
include("menu/hopital.php");

?>
	
  <br>
  <br>
  <br>


<!-- Start Formoid form-->
<link rel="stylesheet" href="css/formoid_files/formoid1/formoid-solid-green.css" type="text/css" />
<script type="text/javascript" src="css/formoid_files/formoid1/jquery.min.js"></script>

	  
  



<table border="0" cellspacing="0" cellpadding="0" width="600" style="    margin-left: 400px;
"> 
<tr> <td class="bodyText">
<table><tr><td width="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /></td>
<td>
<p class="Style123" > <h1>Recherche de intervention(s)</h1>
<img src="mes_img/anl.png" width="300" height="300" />
</p></center> 

<form method="post" action="rech_intervention.php" class="margin-left:200px;">
<span class="Style18">
<u>Chercher par :</u>
</span>
  
    <select name="type">
	<option value="date_intr">date_intr</option>
    
    
    
  </select>
  <input type="text" size="10" name="valeur" value="" />
<input type="submit" value="Rechercher !" />
</p>
</form>

<?php

if (isset($_POST['valeur']))
{$db = mysql_connect ('localhost', 'root', '')  or die('Erreur de connexion '.mysql_error());
// sélection de la base  

    mysql_select_db('carnet_de_sante',$db)  or die('Erreur de selection '.mysql_error());
$valeur = addslashes($_POST['valeur']);
$type = addslashes ($_POST['type']);
	if ($type="date_intr")
	{
	$retour = mysql_query("SELECT * FROM intervention WHERE id_p='$id_p' and date_intr='$valeur' ORDER BY id_intervention ASC");
	
	}
	
?>
<p><center>
<table class="listintervention table table-striped"  cellpadding="15"style="width: 130%;">
  <tbody>
    <tr>
	<td>partie_corps</b></td>
     <td>motif_intr</b></td>
      <td>commantaire_intr</b></td>
     
	 
    </tr>
  </tbody>

  <?php

while ($donnees = mysql_fetch_array($retour))
{
?>
  <tr>
    

    
    <td><?php echo stripslashes($donnees['partie_corps']); ?></td>
	<td><?php echo stripslashes($donnees['motif_intr']); ?></td>
	<td><?php echo stripslashes($donnees['commantaire_intr']); ?></td>
	
  </tr>
  <?php
} // Fin de la boucle des news
?>
</table>
<?php	
}
else
{
?>

</center><?php
}
?>

<table border="0" cellspacing="0" cellpadding="0" width="190" id="leftcol">


  <tr ><td height="350"></td></tr>

  
  
  
  	
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



        
         
		

		
          
  
