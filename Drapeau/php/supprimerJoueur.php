<?php

	$email=$_GET['email'];
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
	
	// suppression d'un joueur
	$sqldeleteH="DELETE FROM historique WHERE email='$email'";
	$statementH=$pdo->prepare($sqldeleteH);
	$statementH->execute();
	$sqldelete="DELETE FROM utilisateur WHERE email='$email'";
	$statement=$pdo->prepare($sqldelete);
	$statement->execute();
	require('Admin.php');
?>