<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
		<script type="text/javascript" src="js/jquery-1.6.js" ></script>
		<script type="text/javascript" src="js/cufon-yui.js"></script>
		<script type="text/javascript" src="js/cufon-replace.js"></script>  
		<script type="text/javascript" src="js/Vegur_300.font.js"></script>
		<script type="text/javascript" src="js/PT_Sans_700.font.js"></script>
		<script type="text/javascript" src="js/PT_Sans_400.font.js"></script>
		<script type="text/javascript" src="js/tms-0.3.js"></script>
		<script type="text/javascript" src="js/tms_presets.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/atooltip.jquery.js"></script>
		<!--[if lt IE 9]>
		<script type="text/javascript" src="js/html5.js"></script>
		<link rel="stylesheet" href="css/ie.css" type="text/css" media="all">
		<![endif]-->
		<!--[if lt IE 7]>
			<div style=' clear: both; text-align:center; position: relative;'>
				<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a>
			</div>
		<![endif]-->
	</head> 
	<body id="page1" bgcolor=#F8B0>
		<div class="main">
<!--header -->
			<header>
				
				<nav>
					<ul id="menu">
						<li class="active"><a href="index.html"><span>Accueil</span></a></li>
						<li><a href="../cnx/material-login-form/index.html"><span></span>Connection </a></li>
						
						<li><a href="../informatioin.php"><span>Information</span></a></li>
						
					</ul>
				</nav>
				<div id="slider">
					<ul class="items">
						<li>
							<img src="images/img1.jpg" alt="">
							<div class="banner">
								<span class="title"><span class="color2"></span><span class="color1"> Votre Carnet</span><span>De Sante</span></span>
								
							<a href="antecedant.html"  class="button1">En savoir plus</a>
							</div>
						</li>
						<li>
							<img src="images/img2.jpg" alt="">
							<div class="banner">
								<span class="title"><span class="color2"></span><span class="color1">Maladie </span><span>Et Traitement</span></span>
							
								<a href="#" class="button1">Consultation</a>
							</div>
						</li>
						<li>
							<img src="images/img3.jpg" alt="">
							<div class="banner">
								<span class="title"><span class="color2"></span><span class="color1">Examen</span><span>Et Analyse</span></span>
								<p>Vous souhaitez prciser l' examen ,faites le en un click!</p>
								<a href="#" class="button1"> Genre d'Examen </a>
							</div>
						</li>
					</ul>
				</div>
			</header>
<!--header end-->
<!--content -->
			<article id="content"><div class="ic">More Website Templates @ TemplateMonster.com - November 14, 2011!</div>
				
			</article>
		</div>
		
		<!--
		<div class="bg1">
			<div class="main">
				<article id="content2">
					<div class="wrapper">
						<div class="col2 marg_right1">
							<h3>Bienvenue sur le site du cabinet médical de monsieur Bouddou!</h3>
							<div class="wrapper">
								<figure class="left marg_right1"><img src="images/page1_img1.jpg" alt=""></figure>
								<p class="color2 pad_bot1">c'est le site de Monsieur Bouddou mohammed ,médecin généraliste.</p>
								<p>ce site vous permet de prendre un rendez-vous en seulement quelques clicks sans avoir à se déplacer.</p>
							</div>
							<p>Votre demande sera aussitot examiner par le docteur,une réponse montrant un refus avec justificatif ou une acceptation vous sera divulgué avec date et heure du rendez-vous sur votre e-mail.Merci de remplir le formulaire .</p>
							<a href="#" class="button1">En savoir plus</a>
						</div>
						
						</div>
					</div>
				</article>
			</div>
		</div>-->
		<div class="main">
<!--content end-->
<!--footer -->
			<footer>
			<!--
				<ul id="icons">
					<li class="first">Follow Us:</li>
					<li><a href="http://www.facebook.com" class="normaltip" title="Facebook"><img src="images/icon1.jpg" alt=""></a></li>
					<li><a href="http://www.twitter.com" class="normaltip" title="Twitter"><img src="images/icon2.jpg" alt=""></a></li>
					
					<li><a href="http://www.youtube.com" class="normaltip" title="YouTube"><img src="images/icon4.jpg" alt=""></a></li>
				</ul>
			 {%FOOTER_LINK} 
				-->
			</footer>
<!--footer end-->
		</div>
		<script type="text/javascript"> Cufon.now(); </script>
		<script>
			$(window).load(function(){
				$('#slider')._TMS({
					banners:true,
					waitBannerAnimation:false,
					preset:'diagonalFade',
					easing:'easeOutQuad',
					pagination:true,
					duration:400,
					slideshow:8000,
					bannerShow:function(banner){
						banner.css({marginRight:-500}).stop().animate({marginRight:0}, 600)
					},
					bannerHide:function(banner){
						banner.stop().animate({marginRight:-500}, 600)
					}
					})
			})
		</script>
	</body>
</html>
