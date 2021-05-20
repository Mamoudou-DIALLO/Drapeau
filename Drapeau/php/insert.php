<?php
$tab1 = json_encode(file_get_contents("aus.geo.json"),true);
$tab2 = json_encode(file_get_contents("gin.geo.json"),true); 
$tab3 = json_encode(file_get_contents("mar.geo.json"),true); 
$tab4 = json_encode(file_get_contents("fra.geo.json"),true); 
$tab5 = json_encode(file_get_contents("esp.geo.json"),true); 
$tab6 = json_encode(file_get_contents("can.geo.json"),true); 
$tab7 = json_encode(file_get_contents("usa.geo.json"),true); 

$pays1="Australie";
$continent1 = "Océanie";

$pays2="Guinée";
$continent2 = "Afrique";

$pays3="Maroc";
$continent3 = "Afrique";

$pays4="France";
$continent4 = "Europe";

$pays5="Espagne";
$continent5 = "Europe";

$pays="Canada";
$continent= "Amérique";

$pays7="Etats-Unis";
$continent7 = "Amérique";

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
        die(); // On arrête tout.
}
$sql1= "INSERT INTO `quiz_c`(continent,pays,coord_p) VALUES('$continent1','$pays1','$tab1')";
$sql2= "INSERT INTO `quiz_c`(continent,pays,coord_p) VALUES('$continent2','$pays2','$tab2')";
$sql3= "INSERT INTO `quiz_c`(continent,pays,coord_p) VALUES('$continent3','$pays3','$tab3')";
$sql4= "INSERT INTO `quiz_c`(continent,pays,coord_p) VALUES('$continent4','$pays4','$tab4')";
$sql5= "INSERT INTO `quiz_c`(continent,pays,coord_p) VALUES('$continent5','$pays5','$tab5')";
$sql= "INSERT INTO `quiz_c`(continent,pays,coord_p) VALUES('$continent','$pays','$tab')";
$sql7= "INSERT INTO `quiz_c`(continent,pays,coord_p) VALUES('$continent7','$pays7','$tab7')";


		try{	
				$commande1 = $pdo->prepare($sql1);
				$commande2 = $pdo->prepare($sql2);
				$commande3 = $pdo->prepare($sql3);
				$commande4 = $pdo->prepare($sql4);
				$commande5 = $pdo->prepare($sql5);
				$commande = $pdo->prepare($sql);
				$commande7 = $pdo->prepare($sql7);
				$bool1 = $commande1->execute(array('$continent1','$pays1','$tab1'));
				$bool2 = $commande2->execute(array('$continent2','$pays2','$tab2'));
				$bool3 = $commande3->execute(array('$continent3','$pays3','$tab3'));
				$bool4 = $commande4->execute(array('$continent4','$pays4','$tab4'));
				$bool5 = $commande5->execute(array('$continent5','$pays5','$tab5'));
				$bool = $commande->execute(array('$continent','$pays','$tab'));
				$bool7 = $commande7->execute(array('$continent7','$pays7','$tab7'));
				if($bool1 and ($bool2 and ($bool3 and ($bool4 and ($bool5 and ($bool and $bool7)))))){
					echo("données inserées");
				}else {echo("pff");}
		}
		catch (PDOException $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		
?>
