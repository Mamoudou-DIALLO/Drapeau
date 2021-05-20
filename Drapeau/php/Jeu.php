<?php
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
// insertion dans la base de données les informations pour creer un utilisateur

if(isset($_POST['register']))
{
	$_POST['register']='';
	$nom=isset($_POST['nom'])?($_POST['nom']):'';
	$emaili=isset($_POST['emaili'])?($_POST['emaili']):'';
	$motdepasse=md5(isset($_POST['motdepasse']))?($_POST['motdepasse']):'';
	$motdepassee=md5(isset($_POST['motdepassee']))?($_POST['motdepassee']):'';
	$questionsecurite=isset($_POST['question'])?($_POST['question']):'';
	$reponse=isset($_POST['reponse'])?($_POST['reponse']):'';
	
	
		
	//verification	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	//verifaction du nom
  if (empty($_POST["nom"])) {
    $nom = "nom rejeté";
  } else {
   
    if (!preg_match("/^[a-zA-Z ]*$/",$_POST["nom"])) {
      $nom = "que les chiffres et les espaces qui sont autorisés"; 
	 die('le nom est non valide');
    }
  }
		
		//verification d'email
		  if (empty($_POST["emaili"])) {
    $emaili = "Email is required";
  } else {
    
  
    if (!filter_var($_POST["emaili"], FILTER_VALIDATE_EMAIL)) {
      $emaili = "Invalid email format"; 
	  die('email non valide');
    }
  }
  
		//verifaction du password
			if(empty($_POST['motdepasse']) || ($_POST['motdepasse']!=$_POST['motdepassee'])){
			
			die('le mot de passe est non valide');
			
			}
				
}
			
$sql= "INSERT INTO `utilisateur`(nom,email,mot_de_passe,confirmation,securite,reponse,date_i) VALUES('$nom','$emaili','$motdepasse','$motdepassee','$questionsecurite','$reponse',curtime())";
		try{	
				$commande = $pdo->prepare($sql);
				$bool = $commande->execute(array($nom,$emaili,$motdepasse,$questionsecurite,$reponse));
				if($bool){
					session_start();
					require('CompteBienCree.php');
				} else echo "enregistrement pff ";
		}
		catch (PDOException $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		
}	




//cas d'annulation 
        else if (isset($_POST['annuler']))
        {
           require('acceuil.php');
            die();
        }
//connexion 

 else if(isset($_POST['connect']))
        {
            $email =isset($_POST['email'])?($_POST['email']):'';
            $mdp =isset($_POST['mdp'])?($_POST['mdp']):''; 
         
            $sql="SELECT * FROM `utilisateur` WHERE email=? AND mot_de_passe=?";
            try {
                $commande = $pdo->prepare($sql);
								$bool = $commande->execute(array($email, $mdp));
								$tab_id= array();
                if ($bool) {
										while ($recup = $commande->fetch()){
													$resultat[]=$recup;
													$tab_id[]=$recup['id'];
										}
                    //$resultat = $commande->fetchAll(PDO::FETCH_ASSOC);              
                }
            }
            catch (PDOException $e) {
                echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
                die();
            }
            if (count($resultat) == 0){ die("Nous n'avons malheureusement pas pu vous connecter, veuillez rafraichir"); 
						}else {
									session_start();
									$_SESSION['id']=$tab_id[0];
									require('Joueur.php'); die();
								}
        }


?>
<!DOCTYPE html>
<html lang="fr">
	<head>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <title> Global-Game </title>
<style>
Body { 
 font-family: Arial, Helvetica, sans-serif;
font-style: italic;
background-image:url("hey.jpg");
}
#hello
{
   
	background-position: center center ; 
    text-align: center;


} 


div.form
{

    text-align: center;
}

h3 { 
font-weight: bold;
}


ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
li {
  float: left;
}

li a {
  display: block;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;  
 } 

</style>
</head>
<body>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
<nav class="navbar navbar-inverse">
  <!--div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </butto-->

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		 <li><a href="guide.php"><span class="glyphicon glyphicon-info-sign"></span> Guide</a></a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-earphone"></span> Contact<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">DIALLO Mamoudou 0758599613</a></li>
          </ul>
        </li>
       
      </ul>
	  
   <ul class="nav navbar-nav navbar-right">
	 <li ><a href="#" title="NOM&Prénom" data-toggle="popover" data-placement="bottom" data-content="votre email">
          <span class="glyphicon glyphicon-user"></span> Utilisateur 
        </a>
	
	</li>
   </ul>
		
	
	  
    </div>
  </div>
</nav>


<div class="row" id="hello">

<div class="container">
<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
<div class="panel-group" id="jouer">
<div class="panel panel-default">

	  
<div id="collapse1" class="panel-collapse collapse in">
	 
	<!--login-->
<form  action="Jeu.php" method="POST">	
	 <div class="panel panel-default">
	  <div class="panel-heading" style="background-color:#D3D3D3">
        <h2 style="text-align:center" class="panel-title" >
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span class="glyphicon glyphicon-log-in"></span> Login </a>
        </h2>
      </div>
	  <div id="collapse3" class="panel-collapse collapse in">
	  <!--se connecter-->
	  <h2 class="text-uppercase text-center"> Se connecter</h2>
			<div>
			<div class="form-group" >
			
					<div class="">
					    <label  class="control-label" >Email</label>
						<INPUT class="form-control" name="email" type="email" placeholder="Votre mot de passe...">
					</div>
				<div class="">
					<label  class="control-label">Mot de passe</label>
					<input type="password" class="form-control"  name="mdp" placeholder="Votre mot de passe...">
						
				</div>
					</br>
				<div class="">
					<button type="submit" name="connect" class="btn btn-primary">se connecter</button> </br>
					<a href="MotdepasseOublie.php">Vous avez oublié votre mot de passe ?</a>
				</div>
			</div>
			</div> 
	  </div>
	</div>
	</form>
	<!--inscription-->
	 <div class="panel panel-default">
	  <div class="panel-heading" style="background-color:#D3D3D3">
        <h2 style="text-align:center" class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><span class="glyphicon glyphicon-list-alt"></span> Inscription</a>
        </h2>
      </div>
	   <div id="collapse4" class="panel-collapse collapse in">
	   <!--Enregistrement -->
	  	<form action="Jeu.php" method="POST">
					<h2 class="text-uppercase text-center"> Inscription Gratuite</h2>
								<div class="form-group">
									<label class="control-label">Nom</label>
									
									<div class="">
											<div class="">
												<input type="text" name="nom" class="form-control" placeholder="Your name..." />
						
											</div>
										
									</div>
								</div>
								
								
								<div class="form-group">
									<label  class="control-label">Email</label>
									<div class="">
										<input type="email" name="emaili" class="form-control" id="email" placeholder="Your email..."  required />
									</div>
								</div>
								<div class="form-group">
									<label  class="control-label ">Mot de passe </label>
									<div class="">
										<input type="password" name="motdepasse" class="form-control"  placeholder="Your password..." required / >
									</div>
								</div>
								
								<div class="form-group">
									<label  class="control-label ">Confirmation de votre mot de passe </label>
									<div class="">
										<input type="password" name="motdepassee" class="form-control"  placeholder="Your password..." required / >
									</div>
								</div>
								

								
								<div class="form-group">
									<label  class="control-label " >Question de sécurité </label>
									 <div class="">
												<select class="form-control" name="question"  autocomplete="off">
												<option></option>
													<option>what is your favorite country?</option>
													<option>what is your favorite city?</option>
													
												</select>
									 </div>
									
								</div>
								<div class="form-group">
									<label  class="control-label ">Réponse de sécurité </label>
									<div class="">
										<input type="text" name="reponse" class="form-control"  placeholder="Your answer please ..."  />
									</div>
								</div>
								
			
									<div class="">
										<button type="submit" name= "register" class="btn btn-primary">Sauvegarder & se connecter</button>
										<button type="submit" name="annuler" class="btn btn-default" >Annuler</button>
									</div>
							</form>
	</div>
	
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
</body>
</html>









