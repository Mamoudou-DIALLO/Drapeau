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
$sql = "SELECT continent FROM quiz_p NATURAL JOIN question_p";
$continent = $pdo->prepare($sql);
$continent->execute();

$p = array();
while($recup = $continent->fetch())
{
	$p[] = $recup['continent'];
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
<title>
    Questinnaire pays
</title>
<script>
function RedirectionScript()
		{
		document.location.href="EchecChronoMI.php";
		}
</script>
</head>
<style>
	body {
 				 background-image: url("http://localhost/project/monde-anim01.gif");
			}
</style>
<body onload="setTimeout('RedirectionScript()', 300000);start()">
<div class="container">
<div class="col-lg-12" style="border-right: 1px dotted #C2C2C2; padding-right: 30px;">
<h1 style= "padding-right: 30px; text-align: center; background-color:"red"; color: green">
	QUIZ2
</h1>
<br>
<br>
 <h3 id="5" hidden>Bienvenue  vous avez <span style="color: red;">5 minutes</span> pour répondre aux questions !</h3><button id="commancer" type="button" class="btn btn-primary" style="width:200px; heigth:300px; margin-left:400px" onclick="document.getElementById('timer').style.display='block',document.getElementById('5').style.display='block',document.getElementById('c1').style.display='block',document.getElementById('commancer').style.display='none',document.getElementById('v1').style.display='block',document.getElementById('question').style.display='block',document.getElementById('mapid').style.display='block',f11()">Commencer</button>
 <br>
<div class="container">
  		<div class="row">
    		<div class="col-sm-4">
				<div class="chronometre" id="timer" hidden>
			  <div class="tim">
				<kbd >0 h</kbd> 
				<kbd >0 min</kbd> 
				<kbd >0 s</kbd> 
				<kbd >0 ms</kbd>
			  </div>
			</div>
			<!--le debut du jeu, un boutons commencer qui rend visible les information de la premiere question-->
			 	<button id="question" style="border-right: 5px;width: 600px; height: 30px" hidden> Trouvez le continent du pays qui s'affiche en cliquant sur la carte </button> 
				<p id="mapid" style="width: 600px; height: 400px" hidden></p>
				<p id="mapid2" style="width: 600px; height: 400px" hidden></p>
				<p id="mapid3" style="width: 600px; height: 400px" hidden></p>
				<p id="mapid4" style="width: 600px; height: 400px" hidden></p>
				<p id="mapid5" style="width: 600px; height: 400px" hidden></p>
				<p id="mapid6" style="width: 600px; height: 400px" hidden></p>
				<p id="mapid7" style="width: 600px; height: 400px" hidden></p>

			</div>
    <br>
    		<div class="col-sm-4" style="margin-left: 300px">
  				<button id= "c1"    hidden>  <?php echo $p[0] ?></button>
				<button id= "c2"    hidden>  <?php echo $p[1] ?> </button>
				<button id= "c3"    hidden>  <?php echo $p[2] ?></button>
				<button id= "c4"    hidden>  <?php echo $p[3] ?></button>
				<button id= "c5"    hidden>  <?php echo $p[4] ?></button>
				<button id= "c6"    hidden>  <?php echo $p[5] ?></button>
				<button id= "c7"    hidden>  <?php echo $p[6] ?> </button>	
  			    <!--p ><img id="image" src="" width="200" height="100" hidden></img></p-->
  			    <br>
				<div id="infos"> </div>
				<br>
				<br>
				<br>
				<!--les boutons alterné pour soumettre, chaque bouons se desactive et active son prochain-->
				<button id="v1" style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('c1').style.display='none',document.getElementById('c2').style.display='block',document.getElementById('mapid').style.display='none',document.getElementById('mapid2').style.display='block',document.getElementById('v2').style.display='block',document.getElementById('v1').style.display='none',f21()"hidden>Soumettre</button>
				<button id="v2" style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('c2').style.display='none',document.getElementById('c3').style.display='block',document.getElementById('v3').style.display='block',document.getElementById('v2').style.display='none',document.getElementById('mapid2').style.display='none',document.getElementById('mapid3').style.display='block',f31()" hidden>Soumettre</button>
				<button id="v3" style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('c3').style.display='none',document.getElementById('c4').style.display='block',document.getElementById('v4').style.display='block',document.getElementById('v3').style.display='none',document.getElementById('mapid3').style.display='none',document.getElementById('mapid4').style.display='block',f41()"hidden>Soumettre</button>
				<button id="v4" style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('c4').style.display='none',document.getElementById('c5').style.display='block',document.getElementById('v5').style.display='block',document.getElementById('v4').style.display='none',document.getElementById('mapid4').style.display='none',document.getElementById('mapid5').style.display='block',f51()"hidden>Soumettre</button>
				<button id="v5" style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('c5').style.display='none',document.getElementById('c6').style.display='block',document.getElementById('v6').style.display='block',document.getElementById('v5').style.display='none',document.getElementById('mapid5').style.display='none',document.getElementById('mapid6').style.display='block',f61()"hidden>Soumettre</button>
				<button id="v6" style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('c6').style.display='none',document.getElementById('c7').style.display='block',document.getElementById('v7').style.display='block',document.getElementById('v6').style.display='none',document.getElementById('mapid6').style.display='none',document.getElementById('mapid7').style.display='block',f71()"hidden>Soumettre</button>
				<button id="v7" style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('question').style.display='none',document.getElementById('c7').style.display='none',document.getElementById('v8').style.display='block',document.getElementById('v9').style.display='block',document.getElementById('v7').style.display='none',document.getElementById('mapid7').style.display='none',document.getElementById('pays7').style.display='none'" hidden>Soumettre</button>
				<button id="v9" style="background-color: green;color: white; text-align: center; width:300px; height:50px" onclick="document.getElementById('mapid7').style.display='none',document.getElementById('c1').style.display='block',document.getElementById('v1').style.display='block',document.getElementById('question').style.display='block',document.getElementById('v8').style.display='none',document.getElementById('v9').style.display='none',document.getElementById('mapid').style.display='block',f11()" hidden> Recommencer </button>
				<form action="correctionQuiz2MI.php" method="post">
				<button id="v8" name="valider" style="background-color: green;color: white; text-align: center; width:300px; height:50px" hidden>Sauvergarder Et continuer</button>
			
				<div class="LatLon" hidden>
				<!-- recuperation des coordonnes du clique-->
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
<!--script src="capitals.geojson">
</script>
<script src="countries11.js">
</script-->

<script>
	function f11(){
		var map = L.map('mapid').setView([0,0],0);
		var couche = new L.StamenTileLayer("watercolor");
		map.addLayer(couche);
		var popup = L.popup();
		L.control.scale().addTo(map);
		//L.geoJson(countriesData).addTo(map);
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
function f21(){
		var map = L.map('mapid2').setView([0,0],0);
		var couche = new L.StamenTileLayer("watercolor");
		map.addLayer(couche);
		var popup = L.popup();
		L.control.scale().addTo(map);
		//L.geoJson(countriesData).addTo(map);
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
function f31(){
	var map = L.map('mapid3').setView([0,0],0);
		var couche = new L.StamenTileLayer("watercolor");
		map.addLayer(couche);
		var popup = L.popup();
		L.control.scale().addTo(map);
		//L.geoJson(countriesData).addTo(map);
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
function f41(){
	var map = L.map('mapid4').setView([0,0],0);
		var couche = new L.StamenTileLayer("watercolor");
		map.addLayer(couche);
		var popup = L.popup();
		L.control.scale().addTo(map);
		//L.geoJson(countriesData).addTo(map);
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
function f51(){
		var map = L.map('mapid5').setView([0,0],0);
		var couche = new L.StamenTileLayer("watercolor");
		map.addLayer(couche);
		var popup = L.popup();
		L.control.scale().addTo(map);
		//L.geoJson(countriesData).addTo(map);
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
function f61(){
		var map = L.map('mapid6').setView([0,0],0);
		var couche = new L.StamenTileLayer("watercolor");
		map.addLayer(couche);
		var popup = L.popup();
		L.control.scale().addTo(map);
		//L.geoJson(countriesData).addTo(map);
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
function f71(){
		var map = L.map('mapid7').setView([0,0],0);
		var couche = new L.StamenTileLayer("watercolor");
		map.addLayer(couche);
		var popup = L.popup();
		L.control.scale().addTo(map);
		//L.geoJson(countriesData).addTo(map);
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
<script type="text/javascript">
   /*la fonction getElementByTagName renvoie une liste des éléments portant le nom de balise donné ici "span".*/
  var sp = document.getElementsByTagName("kbd");
 

  var t;
  var ms=0,s=0,mn=0,h=0;
   
   /*La fonction "start" démarre un appel répétitive de la fonction update_chrono par une cadence de 100 milliseconde en utilisant setInterval et désactive le bouton "start" */

  function start(){
   t =setInterval(update_chrono,100);
   btn_start.disabled=true;
  }
  
  /*La fonction update_chrono incrémente le nombre de millisecondes par 1 <==> 1*cadence = 100 */
  function update_chrono(){
    ms+=1;
    /*si ms=10 <==> ms*cadence = 1000ms <==> 1s alors on incrémente le nombre de secondes*/
       if(ms==10){
        ms=1;
        s+=1;
       }
       /*on teste si s=60 pour incrémenter le nombre de minute*/
       if(s==60){
        s=0;
        mn+=1;
       }
       if(mn==60){
        mn=0;
        h+=1;
       }
       /*afficher les nouvelle valeurs*/
       sp[0].innerHTML=h+" h";
       sp[1].innerHTML=mn+" min";
       sp[2].innerHTML=s+" s";
       sp[3].innerHTML=ms+" ms";

  }
  
	/*on arrête le "timer" par clearInterval ,on réactive le bouton start */
	function stop(){
    clearInterval(t);
    btn_start.disabled=false;
		
	}
</script>
</body>
</html>
