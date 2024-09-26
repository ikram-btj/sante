<?php 

if(isset ($_SESSION['login_p'])){echo "<script>windows.open('../../menu/analyse.php','_self')</script>";}
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title></title>
    
    
    <link rel="stylesheet" href="css/reset.css">

   <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'> 

        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Connexion</h1><span> <i class='fa fa-code'></i> pour <a href='*'> Patient/Medecin</a></span>
</div>

<div class="rerun"><a href="">Rerun Pen</a></div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Patient</h1>
    <form action="cnx_p.php" method="post">
      <div class="input-container">
        <input type="text" id="Username" name="login_p" required="required"/>
        <label for="Username">Nom et prenom</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" name="password_p" required="required"/>
        <label for="Password">NSS</label>
        <div class="bar"></div>
      </div>
	  
      <div class="button-container">
	
        <button type="submit" name="cnct"><span>aller</span></button>
      </div>
      <div class="footer"><a href="#"></a></div>
    </form>
  </div>
  
  
  
  
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Medecin
      <div class="close"></div>
    </h1>
  <form action="cnx.php" method="post">
      <div class="input-container">
        <input type="text" id="Username" name="login_m" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" name="password_m" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>

     
      <div class="button-container">
        <button type="submit" name="connecter"><span>aller</span></button>
      </div>
	   <div class="footer"><a href="#"></a></div>
    </form>
  </div>
</div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
