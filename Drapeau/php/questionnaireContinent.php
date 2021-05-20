<?php

session_start();
$hostname = "localhost";    
            $base= "jeu";
            $loginBD= "root";    
            $passBD="";
    try {
       
        $dsn = "mysql:server=$hostname ; dbname=$base";
        $pdo = new PDO ($dsn, $loginBD, $passBD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
    
        echo utf8_encode("Echec de connexion : " . $e->getMessage() . "\n");
        die(); // On arrÃªte tout.
    }
$sql = "SELECT pays FROM quiz_c NATURAL JOIN question_c";
$sql1 = "SELECT coord FROM quiz_c NATURAL JOIN question_c";
$sql2 = "SELECT image FROM quiz_c NATURAL JOIN question_c";

$pays = $pdo->prepare($sql);
$coord = $pdo->prepare($sql1);
$image = $pdo->prepare($sql2);
$pays->execute();
$coord->execute();
$image->execute();


$p = array();
while($recup = $pays->fetch())
{
	$p[] = $recup['pays'];
}
$coordonnee = array();
while($recup_coord = $coord->fetch())
{
   $coordonnee[] = $recup_coord['coord'];
}
$drap = array();
while($recup_img = $image->fetch())
{
   $drap[] = $recup_img['image'];
}
?>



<!DOCTYPE html>
<html lang="fr">
<head> 

<meta charset="utf-8">  
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
   integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
   crossorigin=""></script>
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
<script type="text/javascript" src="http://maps.stamen.com/js/tile.stamen.js?v1.3.0"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link href="css/resume.css" rel="stylesheet">
  <!-- Polices -->
   
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/devicons.min.css" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet">
	<link href="css/fresh-bootstrap-table.css" rel="stylesheet" />
<title>
    Questionnaire Continent
</title>

</head>
<style>
	body {
 				 background-image: url("monde-anim01.gif");
			}
</style>
<body >
<div class="container">
<div class="col-lg-12" style="border-right: 1px dotted #C2C2C2; padding-right: 30px;">
<h1 style= "padding-right: 30px; text-align: center; background-color:"red"; color: green">
	QUIZ1
</h1>
<br>
<br> 
<button id="commancer" type="button" class="btn btn-primary" style="width:200px; heigth:300px; margin-left:400px" onclick="document.getElementById('i1').style.display='block',document.getElementById('pays1').style.display='block',document.getElementById('image').style.display='block',document.getElementById('image').src='<?php echo $drap[0];?>',document.getElementById('commancer').style.display='none',document.getElementById('v1').style.display='block',document.getElementById('question').style.display='block',document.getElementById('mapid').style.display='block',f11(<?php echo $coordonnee[0];?>,3)">Commencer</button>
 <br>
<div class="tab-content">
<!--q1-->

<div class="tab-pane fade in active" id="panneauq1">
	<div id="q1" class="container">
	<div class="row">
</div>
  		<div class="row">
  			<div class="col-sm-4">
  				<button id= "pays1" style="background-color: DodgerBlue;color: white; text-align: center;width:200px; height:50px" hidden><?php echo $p[0];?> </button>
				<button id= "pays2" style="background-color: DodgerBlue;color: white; text-align: center;width:200px; height:50px" hidden><?php echo ($p[1]);?> </button>
				<button id= "pays3" style="background-color: DodgerBlue;color: white; text-align: center;width:200px; height:50px" hidden> <?php echo ($p[2]);?></button>
				<button id= "pays4" style="background-color: DodgerBlue;color: white; text-align: center;width:200px; height:50px" hidden> <?php echo ($p[3]);?></button>
				<button id= "pays5" style="background-color: DodgerBlue;color: white; text-align: center;width:200px; height:50px" hidden> <?php echo ($p[4]);?></button>
				<button id= "pays6" style="background-color: DodgerBlue;color: white; text-align: center;width:200px; height:50px" hidden><?php echo ($p[5]);?> </button>
				<button id= "pays7" style="background-color: DodgerBlue;color: white; text-align: center;width:200px; height:50px" hidden><?php echo ($p[6]);?> </button>	
  			    <p><img id="image" src="" width="300" height="200" hidden></img>
				<p id="i1" hidden>L'Australie, en forme longue le Commonwealth d'Australie (en anglais : Australia et Commonwealth of Australia), est un pays de l'hémisphère sud dont la superficie couvre la plus grande partie de l'Océanie</p></p>
  			    <p id="i2" hidden>La Guinée(Écouter), en forme longue la république de Guinée, aussi appelée « Guinée-Conakry » du nom de sa capitale pour la différencier de la Guinée-Bissau et de la Guinée équatoriale, est un pays d’Afrique de l'Ouest. Riche en ressources naturelles, 
				elle est surnommée le « château d'eau de l'Afrique » et possède le tiers des réserves mondiales de bauxite, 
				elle est surnommée le « scandale géologique »3</p></p>
				<p id="i3" hidden>Le Maroc (en arabe : « المغرب », al-Maġrib ; en berbère : « ⵍⵎⵖⵔⵉⴱ »1,17, l-Meġrib), ou depuis 1957, en forme longue le royaume du Maroc, autrefois l'Empire chérifien, est un État unitaire régionalisé situé en Afrique du Nord. Son régime politique est une monarchie constitutionnelle. 
				Sa capitale est Rabat et sa plus grande ville Casablanca.</p></p>
  			  <p id="i4" hidden>La France (Écouter), en forme longue depuis 1875 la République française (Écouter), est un État transcontinental souverain, dont le territoire métropolitain est situé en Europe de l'Ouest. Ce dernier a des frontières terrestres avec la Belgique, le Luxembourg, l'Allemagne, la Suisse, l'Italie, l'Espagne et les principautés d'Andorre et de MonacoN 6,7, et dispose d'importantes façades maritimes dans l'Atlantique, la Manche, la mer du Nord et la Méditerranée. Son territoire ultramarin s'étend dans les océans Indien8, Atlantique9 et Pacifique10 ainsi que sur le continent sud-américain11, 
			  et a des frontières terrestres avec le Brésil, le Suriname et le royaume des Pays-Bas.</p></p>
			  <p id="i5" hidden>L’Espagne, en forme longue le royaume d'Espagne (respectivement en castillan España Écouter et Reino de España), est un pays d'Europe du Sud — et, selon les définitions, d'Europe de l'Ouest — qui occupe la plus grande partie de la péninsule Ibérique. 
			  En 2018, il s'agissait du trentième pays le plus peuplé du monde, avec 46 millions d’habitants.</p></p>
			  <p id="i6" hidden>Le Canada [kanadɔ]4 Écouter ou [kanada]5 Écouter (en anglais : [ˈkænədə]6 Écouter) est un pays situé dans la partie septentrionale de l'Amérique du Nord. Monarchie constitutionnelle fédérale à régime parlementaire, composée de dix provinces et trois territoires, le pays est encadré à l'est par l'océan Atlantique, 
			  au nord par l'océan Arctique et à l'ouest par l'océan Pacifique</p></p>
			  <p id="i7" hidden>Les États-Unis, en forme longue les États-Unis d'Amérique4 (en anglais : United States et United States of America, également connus sous les abréviations US et USA), 
			  sont un pays transcontinental dont l'essentiel du territoire se situe en Amérique du Nord. </p></p>
				<br>
				<button id="v1"  style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('i2').style.display='block',document.getElementById('i1').style.display='none',document.getElementById('pays2').style.display='block',document.getElementById('pays1').style.display='none',document.getElementById('image').src='<?php echo $drap[1];?>',document.getElementById('mapid').style.display='none',document.getElementById('mapid2').style.display='block',document.getElementById('v2').style.display='block',document.getElementById('v1').style.display='none',f21(<?php echo $coordonnee[1];?>,5)"hidden>Soumettre</button>
				<button id="v2"  style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('i3').style.display='block',document.getElementById('i2').style.display='none',document.getElementById('pays3').style.display='block',document.getElementById('pays2').style.display='none',document.getElementById('image').src='<?php echo $drap[2];?>',document.getElementById('v3').style.display='block',document.getElementById('v2').style.display='none',document.getElementById('mapid2').style.display='none',document.getElementById('mapid3').style.display='block',f31(<?php echo $coordonnee[2];?>,5)" hidden>Soumettre</button>
				<button id="v3"  style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('i4').style.display='block',document.getElementById('i3').style.display='none',document.getElementById('pays4').style.display='block',document.getElementById('pays3').style.display='none',document.getElementById('image').src='<?php echo $drap[3];?>',document.getElementById('v4').style.display='block',document.getElementById('v3').style.display='none',document.getElementById('mapid3').style.display='none',document.getElementById('mapid4').style.display='block',f41(<?php echo $coordonnee[3];?>,5)"hidden>Soumettre</button>
				<button id="v4"  style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('i5').style.display='block',document.getElementById('i4').style.display='none',document.getElementById('pays5').style.display='block',document.getElementById('pays4').style.display='none',document.getElementById('image').src='<?php echo $drap[4];?>',document.getElementById('v5').style.display='block',document.getElementById('v4').style.display='none',document.getElementById('mapid4').style.display='none',document.getElementById('mapid5').style.display='block',f51(<?php echo $coordonnee[4];?>,5)"hidden>Soumettre</button>
				<button id="v5"  style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('i6').style.display='block',document.getElementById('i5').style.display='none',document.getElementById('pays6').style.display='block',document.getElementById('pays5').style.display='none',document.getElementById('image').src='<?php echo $drap[5];?>',document.getElementById('v6').style.display='block',document.getElementById('v5').style.display='none',document.getElementById('mapid5').style.display='none',document.getElementById('mapid6').style.display='block',f61(<?php echo $coordonnee[5];?>,3)"hidden>Soumettre</button>
				<button id="v6"  style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('i7').style.display='block',document.getElementById('i6').style.display='none',document.getElementById('pays7').style.display='block',document.getElementById('pays6').style.display='none',document.getElementById('image').src='<?php echo $drap[6];?>',document.getElementById('v7').style.display='block',document.getElementById('v6').style.display='none',document.getElementById('mapid6').style.display='none',document.getElementById('mapid7').style.display='block',f71(<?php echo $coordonnee[6];?>,3)"hidden>Soumettre</button>
				<button id="v7"  style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('i7').style.display='none',document.getElementById('pays7').style.display='none',document.getElementById('v8').style.display='block',document.getElementById('v9').style.display='block',document.getElementById('v7').style.display='none',document.getElementById('pays1').style.display='none',document.getElementById('image').style.display='none',document.getElementById('question').style.display='none',document.getElementById('mapid7').style.display='none'" hidden>Soumettre</button>
				<button id="v9"  style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('i1').style.display='block',document.getElementById('i2').style.display='none',document.getElementById('pays1').style.display='block',document.getElementById('v1').style.display='block',document.getElementById('image').style.display='block',document.getElementById('question').style.display='block',document.getElementById('pays1').style.display='block',document.getElementById('image').src='<?php echo $drap[0];?>',document.getElementById('v8').style.display='none',document.getElementById('v9').style.display='none',document.getElementById('mapid').style.display='block',f11(<?php echo $coordonnee[0];?>)" hidden> Recommencer </button>
				<form action="correctionQuiz1.php" method="post">
				<button id="v8" name="valider" type="submit" style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('score').innerHTML= <?php echo $score ?>" hidden>Sauvergarder Et continuer</button>

			</div>
			<div class="col-sm-4">
			
			 	<button id="question" style="border-right: 5px; padding-right: 30px;width: 700px; height: 30px" hidden> Trouvez le continent du pays qui s'affiche en cliquant sur la carte </button> 
				<p id="mapid" style="width: 700px; height: 400px" hidden></p>
				<p id="mapid2" style="width: 700px; height: 400px" hidden></p>
				<p id="mapid3" style="width: 700px; height: 400px" hidden></p>
				<p id="mapid4" style="width: 700px; height: 400px" hidden></p>
				<p id="mapid5" style="width: 700px; height: 400px" hidden></p>
				<p id="mapid6" style="width: 700px; height: 400px" hidden></p>
				<p id="mapid7" style="width: 700px; height: 400px" hidden></p>
				<!--button id="s" style="border-right: 5px; padding-right: 30px;width: 700px; height:50px">SCORE:<span id="score" hidden></span>/100 </button-->

				<div class="LatLon" hidden>
								<label for="lq1">Latitude :</label><input type="text" name="lng1" id="lng1"  />
								<label for="jq2">Longitude :</label><input  type="text" name="lat1" id="lat1" />
								<label for="lq1">Latitude :</label><input type="text" name="lng2" id="lng2"  />
								<label for="jq2">Longitude :</label><input  type="text" name="lat2" id="lat2" />
								<label for="lq1">Latitude :</label><input type="text" name="lng3" id="lng3"  />
								<label for="jq2">Longitude :</label><input  type="text" name="lat3" id="lat3" />
								<label for="lq1">Latitude :</label><input type="text" name="lng4" id="lng4"  />
								<label for="jq2">Longitude :</label><input  type="text" name="lat4" id="lat4" />
								<label for="lq1">Latitude :</label><input type="text" name="lng5" id="lng5"  />
								<label for="jq2">Longitude :</label><input  type="text" name="lat5" id="lat5" />
								<label for="lq1">Latitude :</label><input type="text" name="lng6" id="lng6"  />
								<label for="jq2">Longitude :</label><input  type="text" name="lat6" id="lat6" />
								<label for="lq1">Latitude :</label><input type="text" name="lng7" id="lng7"  />
								<label for="jq2">Longitude :</label><input  type="text" name="lat7" id="lat7" />
				</div>

			</div>
		</div>
	</div>   	
</div>
</div>
</form>
<script src="aus.geo.json">
</script>
<script src="gin.geo.json">
</script>
<script src="mar.geo.json">
</script>
<script src="fra.geo.json">
</script>
<script src="can.geo.json">
</script>
<script src="usa.geo.json">
</script>
<script src="esp.geo.json">
</script>
<script>
	function f11(x,y,z){
		var map = L.map('mapid', 
		{
		center: [x,y],
		zoom: z
		});
		var couche = new L.StamenTileLayer("watercolor");
		map.addLayer(couche);
		var popup = L.popup();
		L.control.scale().addTo(map);
		L.geoJson(aust).addTo(map);
		var marker =L.marker([x,y]).addTo(map);
		marker.bindPopup('<h3>Australie</h3>');
		map.on('click', recup_coord_click);
		function recup_coord_click(e){ 
			var curseur = document.getElementById('mapid');
			curseur.style.cursor='pointer';
			var coord = e.latlng.toString();
			marqueur1 = new L.marker([e.latlng.lat,e.latlng.lng]).bindPopup("<center> Coordinates : </center>" +"<br>" + e.latlng.lat + "; " + e.latlng.lng + "</br>");
			map.addLayer(marqueur1);    
			document.getElementById('lng1').value=e.latlng.lat;
			document.getElementById('lat1').value=e.latlng.lng;
		}
		
	}
</script>
<script>
	//document.getElementById('score').innerHTML= <?php echo $score ?>;
</script>
<script>
function f21(x,y,z){
		var map = L.map('mapid2', 
		{
		center: [x,y],
		zoom: z
		});
		var couche = new L.StamenTileLayer("watercolor");
		map.addLayer(couche);
		var popup = L.popup();
		L.control.scale().addTo(map);
		L.geoJson(ginea).addTo(map);
		var marker =L.marker([x,y]).addTo(map);
		marker.bindPopup('<h3>GUINNEE</h3>');
		map.on('click', recup_coord_click);
		function recup_coord_click(e){ 
			var curseur = document.getElementById('mapid2');
			curseur.style.cursor='pointer';
			var coord = e.latlng.toString();
			marqueur1 = new L.marker([e.latlng.lat,e.latlng.lng]).bindPopup("<center> Coordinates : </center>" +"<br>" + e.latlng.lat + "; " + e.latlng.lng + "</br>");
			map.addLayer(marqueur1);    
			document.getElementById('lng2').value=e.latlng.lat;
			document.getElementById('lat2').value=e.latlng.lng;
		}
	}
</script>
<script>
function f31(x,y,z){
		var map = L.map('mapid3', 
		{
		center: [x,y],
		zoom: z
		});
		var couche = new L.StamenTileLayer("watercolor");
		map.addLayer(couche);
		var popup = L.popup();
		L.control.scale().addTo(map);
		L.geoJson(maroc).addTo(map);
		var marker =L.marker([x,y]).addTo(map);
		marker.bindPopup('<h3>MAROC</h3>');
		map.on('click', recup_coord_click);
		function recup_coord_click(e){ 
			var curseur = document.getElementById('mapid3');
			curseur.style.cursor='pointer';
			var coord = e.latlng.toString();
			marqueur1 = new L.marker([e.latlng.lat,e.latlng.lng]).bindPopup("<center> Coordinates : </center>" +"<br>" + e.latlng.lat + "; " + e.latlng.lng + "</br>");
			map.addLayer(marqueur1);    
			document.getElementById('lng3').value=e.latlng.lat;
			document.getElementById('lat3').value=e.latlng.lng;
		}


	}
</script>
<script>
function f41(x,y,z){
		var map = L.map('mapid4', 
		{
		center: [x,y],
		zoom: z
		});
		var couche = new L.StamenTileLayer("watercolor");
		map.addLayer(couche);
		var popup = L.popup();
		L.control.scale().addTo(map);
		L.geoJson(france).addTo(map);
		var marker =L.marker([x,y]).addTo(map);
		marker.bindPopup('<h3>FRANCE</h3>');
		map.on('click', recup_coord_click);
		function recup_coord_click(e){ 
			var curseur = document.getElementById('mapid4');
			curseur.style.cursor='pointer';
			var coord = e.latlng.toString();
			marqueur1 = new L.marker([e.latlng.lat,e.latlng.lng]).bindPopup("<center> Coordinates : </center>" +"<br>" + e.latlng.lat + "; " + e.latlng.lng + "</br>");
			map.addLayer(marqueur1);    
			document.getElementById('lng4').value=e.latlng.lat;
			document.getElementById('lat4').value=e.latlng.lng;
		}


	}
</script>
<script>
function f51(x,y,z){
		var map = L.map('mapid5', 
		{
		center: [x,y],
		zoom: z
		});
		var couche = new L.StamenTileLayer("watercolor");
		map.addLayer(couche);
		var popup = L.popup();
		L.control.scale().addTo(map);
		L.geoJson(espa).addTo(map);
		var marker =L.marker([x,y]).addTo(map);
		marker.bindPopup('<h3>ESPAGNE</h3>');
		map.on('click', recup_coord_click);
		function recup_coord_click(e){ 
			var curseur = document.getElementById('mapid5');
			curseur.style.cursor='pointer';
			var coord = e.latlng.toString();
			marqueur1 = new L.marker([e.latlng.lat,e.latlng.lng]).bindPopup("<center> Coordinates : </center>" +"<br>" + e.latlng.lat + "; " + e.latlng.lng + "</br>");
			map.addLayer(marqueur1);    
			document.getElementById('lng5').value=e.latlng.lat;
			document.getElementById('lat5').value=e.latlng.lng;
		}

	}
</script>
<script>
function f61(x,y,z){
		var map = L.map('mapid6', 
		{
		center: [x,y],
		zoom: z
		});
		var couche = new L.StamenTileLayer("watercolor");
		map.addLayer(couche);
		var popup = L.popup();
		L.control.scale().addTo(map);
		L.geoJson(canada).addTo(map);
		var marker =L.marker([x,y]).addTo(map);
		marker.bindPopup('<h3>CANADA</h3>');
		map.on('click', recup_coord_click);
		function recup_coord_click(e){ 
			var curseur = document.getElementById('mapid6');
			curseur.style.cursor='pointer';
			var coord = e.latlng.toString();
			marqueur1 = new L.marker([e.latlng.lat,e.latlng.lng]).bindPopup("<center> Coordinates : </center>" +"<br>" + e.latlng.lat + "; " + e.latlng.lng + "</br>");
			map.addLayer(marqueur1);    
			document.getElementById('lng6').value=e.latlng.lat;
			document.getElementById('lat6').value=e.latlng.lng;
		}

	}
</script>
<script>
function f71(x,y,z){
		var map = L.map('mapid7', 
		{
		center: [x,y],
		zoom: z
		});
		var couche = new L.StamenTileLayer("watercolor");
		map.addLayer(couche);
		var popup = L.popup();
		L.control.scale().addTo(map);
		L.geoJson(us).addTo(map);
		var marker =L.marker([x,y]).addTo(map);
		marker.bindPopup('<h3>ETATS-UNIS</h3>');
		map.on('click', recup_coord_click);
		function recup_coord_click(e){ 
			var curseur = document.getElementById('mapid7');
			curseur.style.cursor='pointer';
			var coord = e.latlng.toString();
			marqueur1 = new L.marker([e.latlng.lat,e.latlng.lng]).bindPopup("<center> Coordinates : </center>" +"<br>" + e.latlng.lat + "; " + e.latlng.lng + "</br>");
			map.addLayer(marqueur1);    
			document.getElementById('lng7').value=e.latlng.lat;
			document.getElementById('lat7').value=e.latlng.lng;
		}

	}


</script>

</body>
</html>
