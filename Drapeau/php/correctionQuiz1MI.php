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
 $score=0;
if (isset($_POST["valider"])){
		$lng1=$_POST["lng1"];
		$lat1=$_POST["lat1"];//[149.13, -35.17]
		if(($lat1>=(149.13-5) and $lat1 <(149.13+5)) and ($lng1> (-35.17 +5 )and $lng1 < (-35.17 -5)))
				{
					$s1 = 10;
					$score = $score+$s1;
					

				}else if( ($lat1>=(149.13-10) and $lat1 <(149.13+10)) and ($lng1> (-35.17 +10 ) and $lng1<(-35.17 -10)))
				{
						$s1 = 5;
						$score = $score+$s1;
						
							
				}else{ 
						$s1 = 0;
						$score = $score+$s1;
						
						
					
				}
		$lng2=$_POST["lng2"];
		$lat2=$_POST["lat2"];//[-13.42, 9.33]
		if(($lat2<=(-13.42-5) and $lat2 >(-13.42+5)) and ($lng2< (9.33 +5 )and $lng2 > (9.33 -5)))
				{
					$s2 = 15;
					$score = $score+$s2;
					
					
					
				}else if(($lat2<=(-13.42-10) and $lat2 >(-13.42+10)) and ($lng2< (9.33 +10 ) and $lng2>(9.33 -10)))
				{
						$s2 = 7.5;
						$score = $score+$s2;
						
							
				}else{ 
						$s2 = 0;
						$score = $score+$s2;
						
						
				}
		$lng3=$_POST["lng3"];
		$lat3=$_POST["lat3"];//[-6.49, 34.01]
		if(($lat3<=(-6.49-5) and $lat3 >(-6.49+5)) and ($lng3< (34.01 +5 )and $lng3 > (34.01 -5)))
				{
					$s3 = 15;
					$score = $score+$s3;
					
					
					
				}else if(($lat3<=(-6.49-10) and $lat3 >(-6.49+10)) and ($lng3< (34.01 +10 ) and $lng3>(34.01 -10)))
				{
						$s3 = 7.5;
						$score = $score+$s3;
						
							
				}else{ 
						$s3 = 0;
						$score = $score+$s3;
						
						
				}
		$lng4=$_POST["lng4"];
		$lat4=$_POST["lat4"];//[2.2, 48.52]
		if(($lat4>=(2.2-5) and $lat4 <(2.2+5)) and ($lng4< (48.52 +5 )and $lng4 > (48.52 -5)))
				{
					$s4 = 15;
					$score = $score+$s4;
					
					
					
				}else if(($lat4>=(2.2-10) and $lat4 <(2.2+10)) and ($lng4< (48.52 +10 ) and $lng4>(48.52 -10)))
				{
						$s4 = 7.5;
						$score = $score+$s4;
						
							
				}else{ 
						$s4 = 0;
						$score = $score+$s4;
						
						
					
				}
		$lng5=$_POST["lng5"];
		$lat5=$_POST["lat5"];//[-3.41, 40.24]
		if(($lat5<=(-3.41-5) and $lat5 >(-3.41+5)) and ($lng5< (40.24 +5 )and $lng5 > (40.24 -5)))
				{
					$s5 = 15;
					$score = $score+$s5;
					
					
					
					
				}else if(($lat5<=(-3.41-10) and $lat5 >(-3.41+10)) and ($lng5< (40.24 +10 ) and $lng5>(40.24 -10)))
				{
						$s5 = 7.5;
						$score = $score+$s5;
						
							
				}else{ 
						$s5 = 0;
						$score = $score+$s5;
						
						
					
				}
		$lng6=$_POST["lng6"];
		$lat6=$_POST["lat6"];//[-75.42, 45.25]
		if(($lat6<=(-75.42-5) and $lat6 >(-75.42+5)) and ($lng6< (45.25 +5 )and $lng6 > (45.25 -5)))
				{
					$s6 = 15;
					$score = $score+$s6;
					
					
					
				}else if(($lat6<=(-75.42-10) and $lat6 >(-75.42+10)) and ($lng6< (45.25 +10 ) and $lng6>(45.25 -10)))
				{
						$s6 = 7.5;
						$score = $score+$s6;
						
							
				}else{ 
						$s6 = 0;
						$score = $score+$s6;
						
						
					
				}
		$lng7=$_POST["lng7"];
		$lat7=$_POST["lat7"];//[-77.02, 38.53]
		if(($lat7<=(-77.2-5) and $lat7 >(-77.2+5)) and ($lng7< (38.53 +5 )and $lng7 > (38.53 -5)))
				{
					$s7 = 10;
					$score = $score+$s7;
				}else if(($lat7<=(-77.2-10) and $lat7 >(-77.2+10)) and ($lng7< (38.53 +10 ) and $lng7>(38.53 -10)))
				{
						$s7 = 7.5;
						$score = $score+$s7;
						
						echo $score	;
				}else{ 
						$s7 = 0;
						$score = $score+$s7;
						
				}
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
<body>
<div class="container">
<div class="col-lg-12" style="border-right: 1px dotted #C2C2C2; padding-right: 30px;">
<h1 style= "padding-right: 30px; text-align: center; background-color:black; color: white">
	VOTRE SCORE FINAL
</h1>
<br>
<button class="btn btn-dark w3-animate-top" style="color: black; text-align: center; width:300px; height:100px; margin-left: 400px"><h1 id="v1"><?php echo $score; ?></h1></button>
<br>
<br>
<br>
<a href="questionnaireContinentMI.php"><button id="replay" class="btn btn-dark w3-animate-left" style="background-color: green;color: white; text-align: center; width:300px; height:50px; margin-left:400px">rejouer</button></a>
<br>
<br>
<a href="questionnairePaysMI.php"><button class="btn btn-dark w3-animate-bottom" style="background-color: green;color: white; text-align: center; width:300px; height:50px; margin-left:400px"> Quiz Pays</button></a>
<br><br>
</body>
<html>
