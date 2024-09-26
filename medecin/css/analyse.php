<?php 
session_start();

if(isset($_SESSION['login_p'])){

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
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



<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo" style="height: 60px;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>D</b>OC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Doct</b>eur</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="height: 60px;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		
		
		
		  
		   <li class="dropdown messages-menu">
            <a href="aafiche.php" class="dropdown-toggle" data-toggle="dropdown">
               <div class="pull-left"><img src="mes_img/png/images.jpg" style="
    height: 35px;
    width: 35px;"class="img-circle" alt="User Image"> </div>
			 
              <span class="hidden-xs" class="label label-success">  Fiche Personnel</span>
            </a>
			   <ul class="dropdown-menu">
             <!-- <li class="header">You have 4 messages</li>
			 -->
              <li>
                <!-- inner menu: contains the actual data -->
                <div style="position: relative; overflow: hidden; width: auto;" class="slimScrollDiv">
				<ul style="overflow: hidden; width: 100%;" class="menu">
                  <li><!-- start message -->
                    <a href="aafiche.php">
                      <div class="pull-left">
                        <img src="mes_img/png/images2.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Fiche Personnel
                       <!--  <small><i class="fa fa-clock-o"></i> 5 mins</small>-->
                      </h4>
                       <!-- <p>Why not buy a new awesome theme?</p>-->
                    </a>
                  </li>
                  <!-- end message -->
                 
               
                </ul><div style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;" class="slimScrollBar"></div><div style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div></div>
              </li>
              <!--<li class="footer"><a href="#">See All Messages</a></li>-->
            </ul>
			
		
           
          </li>
		  
		  
		  
		  
		  
		  
		  
		   <li class="dropdown messages-menu">
            <a href="aafiche.php" class="dropdown-toggle" data-toggle="dropdown">
               <div class="pull-left"><img src="mes_img/antc.jpg" style="
    height: 35px;
    width: 35px;"class="img-circle" alt="User Image"> </div>
			 
              <span class="hidden-xs" class="label label-success">  Antécédents</span>
            </a>
			   <ul class="dropdown-menu">
             <!-- <li class="header">You have 4 messages</li>
			 -->
              <li>
                <!-- inner menu: contains the actual data -->
                <div style="position: relative; overflow: hidden; width: auto;" class="slimScrollDiv">
				<ul style="overflow: hidden; width: 100%;" class="menu">
                  <li><!-- start message -->
                    <a href="aff_ant_f.php">
                      <div class="pull-left">
                        <img src="mes_img/png/family-practice.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Antécédents Familiaux
                       <!--  <small><i class="fa fa-clock-o"></i> 5 mins</small>-->
                      </h4>
                       <!-- <p>Why not buy a new awesome theme?</p>-->
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="aff_ant_p">
                      <div class="pull-left">
                        <img src="mes_img/png/administration.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                       Antécédents Personnels
               
                      </h4>
                      <!-- <p>Why not buy a new awesome theme?</p>-->
                    </a>
                  </li>
				  
				  
				   <li>
                    <a href="addition.php">
                      <div class="pull-left">
                        <img src="mes_img/kk.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                       Mode de Vie 
               
                      </h4>
                      <!-- <p>Why not buy a new awesome theme?</p>-->
                    </a>
                  </li>
               
                </ul><div style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;" class="slimScrollBar"></div><div style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div></div>
              </li>
              <!--<li class="footer"><a href="#">See All Messages</a></li>-->
            </ul>
			
		
           
          </li>
		  
		  
		  
		  
		  
          <!-- Messages: style can be found in dropdown.less-->
		  
		  
		  
		   <li class="dropdown messages-menu">
            <a href="aafiche.php" class="dropdown-toggle" data-toggle="dropdown">
               <div class="pull-left"><img src="mes_img/imag.jpg" style="
    height: 35px;
    width: 35px;"class="img-circle" alt="User Image"> </div>
			 
              <span class="hidden-xs" class="label label-success">  Maladies et traitements</span>
            </a>
			   <ul class="dropdown-menu">
             <!-- <li class="header">You have 4 messages</li>
			 -->
              <li>
                <!-- inner menu: contains the actual data -->
                <div style="position: relative; overflow: hidden; width: auto;" class="slimScrollDiv">
				<ul style="overflow: hidden; width: 100%;" class="menu">
                  <li><!-- start message -->
                    <a href="cons111.php">
                      <div class="pull-left">
                        <img src="mes_img/cnsl.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Consultation
                       <!--  <small><i class="fa fa-clock-o"></i> 5 mins</small>-->
                      </h4>
                       <!-- <p>Why not buy a new awesome theme?</p>-->
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="analyse.php">
                      <div class="pull-left">
                        <img src="mes_img/png/laboratory.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                       Analyse
               
                      </h4>
                      <!-- <p>Why not buy a new awesome theme?</p>-->
                    </a>
                  </li>
				  
				  <li>
                    <a href="radio.php">
                      <div class="pull-left">
                        <img src="mes_img/png/radiology.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                       Radilogie
               
                      </h4>
                      <!-- <p>Why not buy a new awesome theme?</p>-->
                    </a>
                  </li> 
               
                </ul><div style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;" class="slimScrollBar"></div><div style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div></div>
              </li>
              <!--<li class="footer"><a href="#">See All Messages</a></li>-->
            </ul>
			
		
           
          </li>
			
          
		  
		  
		  
		  
		  
		  
		  
		  		   <li class="dropdown messages-menu">
            <a href="aafiche.php" class="dropdown-toggle" data-toggle="dropdown">
               <div class="pull-left"><img src="mes_img/11.jpg" style="
    height: 35px;
    width: 35px;"class="img-circle" alt="User Image"> </div>
			 
              <span class="hidden-xs" class="label label-success">Hospitalisation et intervention</span>
            </a>
			   <ul class="dropdown-menu">
             <!-- <li class="header">You have 4 messages</li>
			 -->
              <li>
                <!-- inner menu: contains the actual data -->
                <div style="position: relative; overflow: hidden; width: auto;" class="slimScrollDiv">
				<ul style="overflow: hidden; width: 100%;" class="menu">
                  <li><!-- start message -->
                    <a href="hospitalisation.php">
                      <div class="pull-left">
                        <img src="mes_img/png/inpatient.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                       Hospitalisation
                       <!--  <small><i class="fa fa-clock-o"></i> 5 mins</small>-->
                      </h4>
                       <!-- <p>Why not buy a new awesome theme?</p>-->
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="intervention.php">
                      <div class="pull-left">
                        <img src="mes_img/png/surgery.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                       Intervention
               
                      </h4>
                      <!-- <p>Why not buy a new awesome theme?</p>-->
                    </a>
                  </li>
               
                </ul><div style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;" class="slimScrollBar"></div><div style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div></div>
              </li>
              <!--<li class="footer"><a href="#">See All Messages</a></li>-->
            </ul>
		
          </li>
		  
		  
		  
		  
		  
		  
		  
		  
		  		   <li class="dropdown messages-menu">
            <a href="aafiche.php" class="dropdown-toggle" data-toggle="dropdown">
               <div class="pull-left"><img src="mes_img/png/im.png" style="
    height: 35px;
    width: 35px;"class="img-circle" alt="User Image"> </div>
			 
              <span class="hidden-xs" class="label label-success"> .</span>
            </a>
			   <ul class="dropdown-menu">
             <!-- <li class="header">You have 4 messages</li>
			 -->
              <li>
                <!-- inner menu: contains the actual data -->
                <div style="position: relative; overflow: hidden; width: auto;" class="slimScrollDiv">
				<ul style="overflow: hidden; width: 100%;" class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="mes_img/png/log.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                       Connexion Patient
                       <!--  <small><i class="fa fa-clock-o"></i> 5 mins</small>-->
                      </h4>
                       <!-- <p>Why not buy a new awesome theme?</p>-->
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="logout.php">
                      <div class="pull-left">
                        <img src="mes_img/png/logo.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                       Déconnexion Patient
               
                      </h4>
                      <!-- <p>Why not buy a new awesome theme?</p>-->
                    </a>
                  </li>
				  
				   <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="mes_img/png/logm.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                       Déconnexion Medecin
               
                      </h4>
                      <!-- <p>Why not buy a new awesome theme?</p>-->
                    </a>
                  </li>
               
                </ul><div style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;" class="slimScrollBar"></div><div style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div></div>
              </li>
              <!--<li class="footer"><a href="#">See All Messages</a></li>-->
            </ul>
		
          </li>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		   
		
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section style="height: auto;" class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="mes_img/mede.jpg" style="
    height: 50px;
    width:50px;" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          
      
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input name="q" class="form-control" placeholder="Search..." type="text">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
	  
	  
	  
	  
	  
	  
	  
	  
	  
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->  
	  
	 
	  
	  
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Consultation</span> 
          </a>
          <ul class="treeview-menu">
            <li><a href="cons111.php"><i class="fa fa-circle-o"></i> Ajouter </a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Lister</a></li>
			<li><a href="index2.html"><i class="fa fa-circle-o"></i> Rechercher</a></li>
          </ul>
        </li>
        <li class=" active treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Analyse de sang</span>
           
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Lister</a></li>
            <li class="active"><a href="analyse.php"><i class="fa fa-circle-o"></i> Ajouter</a></li>
            <li><a href="recherche analyse.php"><i class="fa fa-circle-o"></i> Rechercher</a></li>
          </ul>
        </li>
      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Examens Radiologiques</span>
           
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Lister</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Ajouter</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Rechercher</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
	
	
	
	
	
    <!-- /.sidebar -->
  </aside>
  
  
  
  
  <section>
  <br>
  <br>
  <br>
  
<!-- Start Formoid form-->
<link rel="stylesheet" href="css/formoid_files/formoid1/formoid-solid-green.css" type="text/css" />
<script type="text/javascript" src="css/formoid_files/formoid1/jquery.min.js"></script>
<form class="formoid-solid-green" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:800px;min-width:600px"    method="post"  action="analyse2.php"><div class="title"><h2>Analyse</h2></div>
	
	
	
	
	
	
	
	<div class="element-radio">
	<label class="title">Type analyse<span class="required">*</span></label>		
	<div class="column column2">
	<label><input type="radio" name="type_analyse" value="Hematologie" required="required"/>
	<span>Hématologie</span></label>
	</div><span class="clearfix"></span>
	<div class="column column2">
	<label><input type="radio" name="type_analyse" value="Examens biochimiques" required="required"/>
	<span>Examens biochimiques</span></label>
	</div><span class="clearfix"></span>
     <div class="column column2">
	 <label><input type="radio" name="type_analyse" value="Examens microbiologiques" required="required"/>
	<span>Examens microbiologiques</span></label>
	</div><span class="clearfix"></span>
		
		</div>
	
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont"><input class="large" type="text" name="nom_analyse" placeholder="Nom analyse"/>
	<span class="icon-place"></span>
	</div>
	</div>
	
	
	<div class="element-date">
	<label class="title"></label>
	<div class="item-cont">
	<input class="large" data-format="yyyy-mm-dd" type="date" name="date_resultat_analyse" placeholder="Date de résultat"/>
	<span class="icon-place"></span>
	</div>
	</div> 
	
	<!--<div class="element-textarea">
	<label class="title"></label>
	<div class="item-cont">
	<textarea class="medium" name="commentaires_radio" cols="20" rows="5" placeholder=" Commentaires"></textarea>
	<span class="icon-place"></span>
	</div>
	</div>
	-->
	
	<div class="element-input">
	<label class="title"></label>
	<div class="item-cont"><input class="large" type="text" name="image_analyse" placeholder="Résultat"/>
	<span class="icon-place"></span>
	</div>
	</div>
	
<div class="submit">
<input type="submit" value="Envoyer" name="submit">

</div></form>

<script type="text/javascript" src="css/formoid_files/formoid1/formoid-solid-green.js"></script> 
<!-- Stop Formoid form--> 


</section>









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
<?php
}
else {
	
	
	header ('location:../cnx/material-login-form/index.php');
	
	
	}


 ?>