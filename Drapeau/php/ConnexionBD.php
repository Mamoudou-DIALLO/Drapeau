<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=jeu','root','');
	
}
catch (PDOException $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>