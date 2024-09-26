<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd"
    >
<html lang="en">
<head>
    <title>Register form with HTML5 using placeholder and CSS3</title>
</head>
<style type="text/css">
    #wrapper {
        width:450px;
        margin:0 auto;
        font-family:Verdana, sans-serif;
    }
    legend {
        color:#0481b1;
        font-size:16px;
        padding:0 10px;
        background:#fff;
        -moz-border-radius:4px;
        box-shadow: 0 1px 5px rgba(4, 129, 177, 0.5);
        padding:5px 10px;
        text-transform:uppercase;
        font-family:Helvetica, sans-serif;
        font-weight:bold;
    }
    fieldset {
        border-radius:4px;
        background: #fff; 
        background: -moz-linear-gradient(#fff, #f9fdff);
        background: -o-linear-gradient(#fff, #f9fdff);
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#f9fdff)); /
        background: -webkit-linear-gradient(#fff, #f9fdff);
        padding:20px;
        border-color:rgba(4, 129, 177, 0.4);
    }
    option,input,
    textarea {
        color: #373737;
        background: #fff;
        border: 1px solid #CCCCCC;
        color: #aaa;
        font-size: 14px;
        line-height: 1.2em;
        margin-bottom:15px;

        -moz-border-radius:4px;
        -webkit-border-radius:4px;
        border-radius:4px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset, 0 1px 0 rgba(255, 255, 255, 0.2);
    }
    input[type="text"],

    input[type="password"]{
        padding: 8px 6px;
        height: 22px;
        width:280px;
    }
    input[type="text"]:focus,
    input[type="password"]:focus {
        background:#f5fcfe;
        text-indent: 0;
        z-index: 1;
        color: #373737;
        -webkit-transition-duration: 400ms;
        -webkit-transition-property: width, background;
        -webkit-transition-timing-function: ease;
        -moz-transition-duration: 400ms;
        -moz-transition-property: width, background;
        -moz-transition-timing-function: ease;
        -o-transition-duration: 400ms;
        -o-transition-property: width, background;
        -o-transition-timing-function: ease;
        width: 380px;
        
        border-color:#ccc;
        box-shadow:0 0 5px rgba(4, 129, 177, 0.5);
        opacity:0.6;
    }
		input[type="radio"]:focus{
        background:#f5fcfe;
        text-indent: 0;
        z-index: 1;
        color: #373737;
        -webkit-transition-duration: 40ms;
        -webkit-transition-property: width, background;
        -webkit-transition-timing-function: ease;
        -moz-transition-duration: 40ms;
        -moz-transition-property: width, background;
        -moz-transition-timing-function: ease;
        -o-transition-duration: 40ms;
        -o-transition-property: width, background;
        -o-transition-timing-function: ease;
        width: 38px;
        
        border-color:#ccc;
        box-shadow:0 0 5px rgba(4, 129, 177, 0.5);
        opacity:0.6;
    }
    input[type="submit"]{
        background: #222;
        border: none;
        text-shadow: 0 -1px 0 rgba(0,0,0,0.3);
        text-transform:uppercase;
        color: #eee;
        cursor: pointer;
        font-size: 15px;
        margin: 5px 0;
        padding: 5px 22px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-border-radius:4px;
        -webkit-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
    }
    textarea {
        padding:3px;
        width:96%;
        height:100px;
    }
    option,textarea:focus {
        background:#ebf8fd;
        text-indent: 0;
        z-index: 1;
        color: #373737;
        opacity:0.6;
        box-shadow:0 0 5px rgba(4, 129, 177, 0.5);
        border-color:#ccc;
    }
    .small {
        line-height:14px;
        font-size:12px;
        color:#999898;
        margin-bottom:3px;
    }
</style>
<body>
    <div id="wrapper">
<form method="post" action="ajou hopital.php">
            <fieldset>
                <legend>Ajouter un hopital</legend>
                <div>
                    <input type="text" id="nom_h" name="nom_h"  placeholder="Nom d'hopital"/>
                </div>
		
<div><BR>
<label  class="option" for="wilaya_h" > Wilaya d'hopital:</label>
<select name="wilaya_h" class="option">
<option value="Choisissez votre ville" selected></option> 
	<option value="Adrar">adrar</option>
	<option value="Chlef">Chlef</option>
	<option value="Laghouat">Laghouat</option>
	<option value="Oum El Bouaghi">Oum El Bouaghi</option>
	<option value="Batna">Batna</option>
	<option value="Béjaia">Béjaia</option>
	<option value="Biskra">Biskra</option>
	<option value="Béchar">Béchar</option>
	<option value="Blida">Blida</option>
	<option value="Bouira">Bouira</option>
	<option value="Tamanrasset">Tamanrasset</option>
	<option value="Tébessa">Tébessa</option>
	<option value="Tlemcen">Tlemcen</option>
	<option value="Tiaret">Tiaret</option>
	<option value="Tizi Ouzou">Tizi Ouzou</option>
	<option value="Alger">Alger</option>
	<option value="Djelfa">Djelfa</option>
	<option value="Djijel">Djijel</option>
	<option value="Sétif">Sétif</option>
	<option value="Saida">saida</option>
	<option value="Skikda">skikda</option>
	<option value="Sidi Bel Abbes">sidi bel abbes</option>
	<option value="Annaba">Annaba</option>
	<option value="Guelma">Guelma</option>
	<option value="Constantine">Constantine</option>
	<option value="Médéa">Médéa</option>
	<option value="Mostaganem">Mostaganem</option>
	<option value="M'Sila">M'sila</option>
	<option value="Mascara">Mascara</option>
	<option value="Ouargla">Ouargla</option>
	<option value="Oran">Oran</option>
	<option value="El Bayadh">El Bayadh</option>
	<option value="Illizi">Illizi</option>
	<option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
	<option value="Boumerdes">Boumerdes</option>
	<option value="El Tarf">El Tarf</option>
	<option value="Tindouf">Tindouf</option>
	<option value="Tissemssilt">Tissemssilt</option>
	<option value="El Oued">El Oued</option>
	<option value="Khenchela">Khenchela</option>
	<option value="Souk Ahras">Souk ahras</option>
	<option value="Tipaza">Tipaza</option>
	<option value="Mila">Mila</option>
	<option value="Ain Defla">Ain defla</option>
	<option value="Naama">Naama</option>
	<option value="Ain Temouchent">Ain temouchent</option>
	<option value="Ghardaia">Ghardaia</option>
	<option value="Relizane">Relizane</option>
	</select><BR>

	
     
				  <div>
				  <BR>
                    <textarea id="region_h" name="region_h"  placeholder="Region d'hopital"></textarea>
                </div>

                <input type="submit" name="submit" value="Ajouter"/>
            </fieldset>    
        </form>
    </div>
</body>
</html>
