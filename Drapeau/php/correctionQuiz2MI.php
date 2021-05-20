<?php
include_once 'C:\wamp64\www\quiz1\ConnexionBD.php';
$sql1 = "SELECT corrd FROM quiz_p NATURAL JOIN question_p";
$sql2 = "SELECT points FROM question_p";

$coord = $pdo->prepare($sql1);
$coord->execute();
$coordonnee = array();
while($recup_coord = $coord->fetch())
{
   $coordonnee[] = $recup_coord['corrd'];
}
$points = $pdo->prepare($sql2);
$points->execute();
$note = array();
while($points_recup = $points->fetch()){
    $note[]=$points_recup['points'];
}
 $score=0;
if (isset($_POST["valider"])){
		$lng1=$_POST["lng1"];
        $lat1=$_POST["lat1"];
		$lng2=$_POST["lng2"];
		$lat2=$_POST["lat2"];
		$lng3=$_POST["lng3"];
		$lat3=$_POST["lat3"];
		$lng4=$_POST["lng4"];
		$lat4=$_POST["lat4"];
		$lng5=$_POST["lng5"];
		$lat5=$_POST["lat5"];
		$lng6=$_POST["lng6"];
		$lat6=$_POST["lat6"];
		$lng7=$_POST["lng7"];
        $lat7=$_POST["lat7"];
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
    correction
</title>

</head>
<style>
	body {
 				 background-image: url("http://localhost/project/monde-anim01.gif");
			}
</style>
<body onload="f1(),f2(),f3(),f4(),f5(),f6(),f7(),f8()">
<div class="container">
<div class="col-lg-12" style="border-right: 1px dotted #C2C2C2; padding-right: 30px;">
<h1 style= "padding-right: 30px; text-align: center; background-color:black; color: white">
	VOTRE SCORE FINAL
</h1>
<button hidden><h1 id="v1" ></h1></button>
<br>
<button hidden><h1 id="v2" ></h1></button>
<br>
<button hidden><h1 id="v3" hidden></h1></button>
<br>
<button hidden><h1 id="v4" hidden></h1></button>
<br>
<button hidden><h1 id="v5" hidden></h1></button>
<br>
<button hidden><h1 id="v6" hidden></h1></button>
<br>
<button hidden><h1 id="v7" hidden></h1></button>
<button class="btn btn-dark w3-animate-top" style="color: black; text-align: center; width:300px; height:100px; margin-left: 400px"><h1 id="v8"><?php echo $score; ?></h1></button>
<br>
<br>
<br>
<a href="questionnairePaysMI.php"><button id="replay" class="btn btn-dark w3-animate-left" style="background-color: green;color: white; text-align: center; width:300px; height:50px; margin-left:400px">rejouer</button></a>
<br>
<br>
<script>
       function f1(){
    document.getElementById('v1').innerHTML = calcule_score(<?php echo $coordonnee[0];?>,<?php echo $lat1;?>,<?php echo $lng1;?>,<?php echo $note[0];?>);
}
</script>
<script>
    function f2(){
    document.getElementById('v2').innerHTML = calcule_score(<?php echo $coordonnee[1]?>,<?php echo $lat2?>,<?php echo $lng2?>,<?php echo $note[1]?>);
 }
</script>
<script>
    function f3(){ 
    document.getElementById('v3').innerHTML = calcule_score(<?php echo $coordonnee[2]?>,<?php echo $lat3?>,<?php echo $lng3?>,<?php echo $note[2]?>);
 }
</script>
<script>
    function f4(){ 
        document.getElementById('v4').innerHTML = calcule_score(<?php echo $coordonnee[3]?>,<?php echo $lat4?>,<?php echo $lng4?>,<?php echo $note[3]?>);
    }
</script>
<script>
    function f5(){
      document.getElementById('v5').innerHTML = calcule_score(<?php echo $coordonnee[4]?>,<?php echo $lat5?>,<?php echo $lng5?>,<?php echo $note[4]?>);
   }
</script>
<script>
    function f6(){
    document.getElementById('v6').innerHTML = calcule_score(<?php echo $coordonnee[5]?>,<?php echo $lat6?>,<?php echo $lng6?>,<?php echo $note[5]?>);
   }
</script>
<script>
    function f7(){
    document.getElementById('v7').innerHTML = calcule_score(<?php echo $coordonnee[6]?>,<?php echo $lat7?>,<?php echo $lng7?>,<?php echo $note[6]?>);
   }
</script>
<script>
    function f8(){
    document.getElementById('v8').innerHTML = (calcule_score(<?php echo $coordonnee[0];?>,<?php echo $lat1;?>,<?php echo $lng1;?>,<?php echo $note[0];?>)+calcule_score(<?php echo $coordonnee[1]?>,<?php echo $lat2?>,<?php echo $lng2?>,<?php echo $note[1]?>)+calcule_score(<?php echo $coordonnee[2]?>,<?php echo $lat3?>,<?php echo $lng3?>,<?php echo $note[2]?>)+calcule_score(<?php echo $coordonnee[3]?>,<?php echo $lat4?>,<?php echo $lng4?>,<?php echo $note[3]?>)+calcule_score(<?php echo $coordonnee[4]?>,<?php echo $lat5?>,<?php echo $lng5?>,<?php echo $note[4]?>)+calcule_score(<?php echo $coordonnee[5]?>,<?php echo $lat6?>,<?php echo $lng6?>,<?php echo $note[5]?>)+calcule_score(<?php echo $coordonnee[6]?>,<?php echo $lat7?>,<?php echo $lng6?>,<?php echo $note[6]?>));
   }
</script>
<script>
    function calcule_score(x,y,a,b,n){
    if((a> x-5 && a<x+5) || (b>y-5 && b<y+5)){
        return n;
    }else if((a> x-10 && a<x+10) || (b>y-10 && b<y+10)){
        return n - (n/2);
    }else {return 0;
    }
}
</script>

</body>
<html>