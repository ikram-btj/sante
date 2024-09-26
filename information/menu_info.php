<!DOCTYPE html>
<html lang="en">
<head>
  <title>carnet de santé</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Les Informations médicales</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Les publicités médicales</a></li>
    <li><a data-toggle="tab" href="#menu1">Fiches Symptomes </a></li>
    <li><a data-toggle="tab" href="#menu2">Fiches Douleurs</a></li>
    <li><a data-toggle="tab" href="#menu3">Gestes D'urgences</a></li>
  </ul>

<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <?php include('imaage.php'); ?>

	</div>
	
	
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
	  
	  <div class="container">
  <h2>Vertical Button Group</h2>
  <div class="btn-group-vertical">
  <ul style="list-style-type: none;">
  
      <li > <a data-toggle="tab" href="#menu4"> <button type="button" class="btn btn-primary"style="width:250px;">Amaigrissement</button></a></li>
    <li > <a data-toggle="tab" href="#menu5"> <button type="button" class="btn btn-primary"style="width:250px;">Constipation</button></a></li>
    <li > <a data-toggle="tab" href="#menu6"> <button type="button" class="btn btn-primary"style="width:250px;">Crampes</button></a></li>
    <li > <a data-toggle="tab" href="#menu7"> <button type="button" class="btn btn-primary"style="width:250px;">Démangeaisons généraliseés</button></a></li>
    <li > <a data-toggle="tab" href="#menu8"> <button type="button" class="btn btn-primary"style="width:250px;">diarrhé</button></a></li>
    <li > <a data-toggle="tab" href="#menu9"> <button type="button" class="btn btn-primary"style="width:250px;">Douleures dans la potrine</button></a></li>
    <li > <a data-toggle="tab" href="#menu10"> <button type="button" class="btn btn-primary"style="width:250px;">Fièvre</button></a></li>
    <li > <a data-toggle="tab" href="#menu11"> <button type="button" class="btn btn-primary"style="width:250px;">géne pour avaler</button></a></li>

  
    
  </div>
</div>
<?php include('paragraphe1.php'); ?>
    </div>
	
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
	  
	  <div class="container">
  <h2>Vertical Button Group</h2>
  <div class="btn-group-vertical">
  <ul style="list-style-type: none;">
    <li > <a data-toggle="tab" href="#menu12"> <button type="button" class="btn btn-primary"style="width:250px;">Angor</button></a></li>
   <li > <a data-toggle="tab" href="#menu13"> <button type="button" class="btn btn-primary"style="width:250px;">Appendicite</button></a></li>
   <li > <a data-toggle="tab" href="#menu14"> <button type="button" class="btn btn-primary"style="width:250px;">Colique hépatique</button></a></li>
   <li > <a data-toggle="tab" href="#menu15"> <button type="button" class="btn btn-primary"style="width:250px;">Colique néphrétique</button></a></li>
   <li > <a data-toggle="tab" href="#menu16"> <button type="button" class="btn btn-primary"style="width:250px;">Lumbago</button></a></li>
   <li > <a data-toggle="tab" href="#menu17"> <button type="button" class="btn btn-primary"style="width:250px;">Migraine</button></a></li>
   <li > <a data-toggle="tab" href="#menu18"> <button type="button" class="btn btn-primary"style="width:250px;">Périarthrite de l'épaule</button></a></li>
   <li > <a data-toggle="tab" href="#menu19"> <button type="button" class="btn btn-primary"style="width:250px;">Sinusite</button></a></li>

  </div>
</div>
<?php include('paragraphe2.php'); ?>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      
	  <div class="container">
  <h2>Vertical Button Group</h2>
  <div class="btn-group-vertical">
  <ul style="list-style-type: none;">
   <li > <a data-toggle="tab" href="#menu20"> <button type="button" class="btn btn-primary"style="width:250px;">Bandages</button></a></li>
    <li><a data-toggle="tab" href="#menu21"> <button type="button" class="btn btn-primary"style="width:250px;">Hémorragier externes</button></a></li>
    <li><a data-toggle="tab" href="#menu22"> <button type="button" class="btn btn-primary"style="width:250px;">Expulsion d'un corps étranger</button></a></li>
    <li><a data-toggle="tab" href="#menu23"> <button type="button" class="btn btn-primary"style="width:250px;">Massage cardiaque</button></a></li>
    <li><a data-toggle="tab" href="#menu24"> <button type="button" class="btn btn-primary"style="width:250px;">Position Latérale de Sécurité</button></a></li>
    <li><a data-toggle="tab" href="#menu25"> <button type="button" class="btn btn-primary"style="width:250px;">Brulures</button></a></li>
	
    
	</ul>
  </div>
</div>
<?php include('paragraphe3.php'); ?>
    </div>
	
  </div>
  
</div>



</body>
</html>
