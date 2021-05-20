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
        die(); // On arrÃªte tout.
    }

// pour récuperer le nom d'affichage (Bonjour nom)
$emailnom=isset($_POST['email'])?($_POST['email']):'';	
$nomafficher ="SELECT * FROM utilisateur WHERE email= '$emailnom'";
$statement = $pdo->prepare($nomafficher);
$statement->execute(array(':nom' => $nomafficher));


// pour afficher totale des point d'un joueur 
$totalepoint ="SELECT score  FROM utilisateur WHERE email= '$emailnom'";
$statementpoint= $pdo->prepare($totalepoint);
$statementpoint->execute(array(':score' => $totalepoint));

// pour afficher le nombre des joueures 

$nombrejoueures ="SELECT count(*) as nombre FROM utilisateur WHERE email NOT IN('admin@admin.com','admin2@admin.com')";
$statementnombre= $pdo->prepare($nombrejoueures);
$statementnombre->execute();
$donneesnombre=$statementnombre->fetch();

// pour afficher la photo d'un joueur

$imagejoueur ="SELECT image FROM utilisateur WHERE email= '$emailnom'";
$statementnimage= $pdo->prepare($imagejoueur);
$statementnimage->execute(array(':image' =>$imagejoueur) );

// pour afficher le classment  d'un joueur
$scorejoueur ="SELECT score  FROM utilisateur WHERE  email= '$emailnom'";
$statementscorejoueur= $pdo->prepare($scorejoueur);
$statementscorejoueur->execute(array(':score' =>$scorejoueur));
$donneesscorejoueur=$statementscorejoueur->fetch();
$tmp=$donneesscorejoueur['score'];

$classementjoueur ="SELECT count(*) as classementJoueur FROM utilisateur WHERE score>='$tmp' AND email NOT IN('admin@admin.com','admin2@admin.com') ";
$statementnclassementjoueur= $pdo->prepare($classementjoueur);
$statementnclassementjoueur->execute();
$donneesClassmentJoueur=$statementnclassementjoueur->fetch();

		   if(isset($_POST["enregistrer"]))
		   {
		   $nomjoueur=isset($_POST['nom'])?($_POST['nom']):'';
		   $email=isset($_POST["email"])?($_POST["email"]):'';
		   $ancmotdepasse=md5(isset($_POST['ancmotdepasse']))?($_POST['ancmotdepasse']):'';
		   $nouveaumotdepasse=md5(isset($_POST['nouveaumotdepasse']))?($_POST['nouveaumotdepasse']):'';
		   
		   $fileimage=$_FILES['imageprofile']['name'];
		   $filetempo=$_FILES['imageprofile']['tmp_name'];
		   move_uploaded_file($filetempo,'imageUtilisateurs/'.$fileimage);
	
			   $sqlUpdate = "UPDATE utilisateur SET  nom= '$nomjoueur', motdepasse= '$nouveaumotdepasse', image= '$fileimage' WHERE email= '$email'";
			   $statement = $pdo->prepare($sqlUpdate);
	           $statement->execute(array($nomjoueur,$nouveaumotdepasse,$fileimage));
			
							   
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
    <link href="css/fresh-bootstrap-table.css" rel="stylesheet" />
	
 

    <!-- Polices -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/devicons.min.css" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet">

	
	
    <!-- le fichier css -->
    <link href="css/resume.css" rel="stylesheet">
  <title> Profil-Joueur </title>
  </head>

  
  <body>
  
		<audio id="buttonAudio">
			<source src="music/button.mp3" type="audio/mpeg">
		</audio>

<nav class="navbar navbar-inverse">

<div class="container-fluid">	
<div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>

    </div>
 
  
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="acceuil.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		 <li><a href="guide.php"><span class="glyphicon glyphicon-info-sign"></span> Guide</a></a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-earphone"></span> Contact<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">DIALLO korka 0618534978</a></li>
            <li><a href="#">REGRAGUI yousra 0617668963</a></li>
          </ul>
        </li>
       
      </ul>
	  
  
 
   <div  class="nav navbar-nav navbar-right">
    <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Utilisateur 
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li class="nav-item"><a class="nav-link js-scroll-trigger" onMouseOver="playAudio('buttonAudio')"  href="#MonProfil"> Mon Profil </a></li>
      <li class="nav-item"><a class="nav-link js-scroll-trigger" onMouseOver="playAudio('buttonAudio')" href="#profil" > Modifier Profil </a></li>
      <li class="nav-item"><a class="nav-link js-scroll-trigger" onMouseOver="playAudio('buttonAudio')" href="#historique"> Historique </a></li>
	  <li class="nav-item"><a class="nav-link js-scroll-trigger" onMouseOver="playAudio('buttonAudio')" href="#classement">Classement</a></li>
	    <li class="nav-item"><a class="nav-link js-scroll-trigger" onMouseOver="playAudio('buttonAudio')" href="Deconnecter.php">Deconnecter</a></li>
    </ul>
	</li>
  </div>
</div>
 </div>
 </nav>
 	<div class="row text-center">
			  <div class="col-lg-12">
 <h2 style="text-align:center">
          <a class="btn btn-danger btn-lg text-uppercase js-scroll-trigger" href="quiz.php"><span class="glyphicon glyphicon-fire"></span> Play on MapGame </a>
        </h2></div></div>
 <div class="container-fluid p-0">
			<section class="resume-section p-3 p-lg-5 " id="MonProfil">
			 
					<div class="row">
						<div class="col-lg-12 col-xl-4">
							<div class="card-box">
								<div class="bar-widget">
									<div class="table-box">
										<div class="table-detail">
											 <div class="iconbox bg-info"> 
												<i class="fa fa-star" style="font-size:48px;color:yellow"></i>
											</div>
										</div>

									<div class="table-detail">
										<?php
											while ($donnees = $statementpoint->fetch())
												{
													echo'<h4 class="m-t-0 m-b-5"><b>'.$donnees['score']. '</b></h4>';
												}
										?>
										<p class="text-muted m-b-0 m-t-0">Total Points :</p>
									</div>
										  

								</div>
							</div>
						</div>
					</div>

						
					</div>
				 
				   <!-- le message Bonjour nom du Joueur -->
					<h2 class="mb-0">Bonjour
						<?php
							$donnees = $statement->fetch();
							{						
								echo '<span class="text-primary">'.$donnees['nom'].'</span>';
							}							 
						?>	   					
					</h2>


			</section>
			  


			<!-- la section modifier profil -->		
			<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="profil">	  
				<div class="container">
					<h2 class="mb-5">Modifier Profile</h2>
					
					<div class="row">
						<!-- le formulaire -->
						<form method="POST" action="Joueur.php" enctype="multipart/form-data">
							
							<!-- la photo a modifier -->
							<div class="col-md-3">			   
							  <img src="images/avatar7.png"  class="img-circlalt" width="130" height="130">;						  
							  <input type="file"  name="imageprofile">
							</div>
							
							<div class='row'>
								
								<!-- les inputs de gauche -->
								<div class="col-lg-8">		
									<div class="form-group">
										<label for="nomjoueur" class="col-sm-2 col-lg-12 control-label">Nom </label>
										<div class="col-sm-8">
											<input type="text" class="form-control" name="nomjoueur" id="nomjoueur" placeholder="Nom" required>
										</div>									
									</div>
									
									
								<div class="form-group" >
										<label for="emailpr" class="col-sm-2 col-lg-12 control-label">E-mail</label>
										<div class="col-sm-8">
										<?php
										 echo   '<input type="email" class="form-control" name="emailpr" id="emailpr" disabled="disabled" value="'.isset($_POST['email']).'" required>';
										?>
										</div>
								</div>	
									
									<div class="form-group">
										<label for="ancmotdepasse" class="col-sm-2 col-lg-12 control-label">Ancienne MP</label>
										<div class="col-sm-8">
											<input type="password" class="form-control" name="ancmotdepasse" id="ancmotdepasse" placeholder="**********" required>
										</div>
									</div>
									
									<div class="form-group">
										<label for="nouveaumotdepasse" class="col-sm-2 col-lg-12 control-label">NV MP</label>
										<div class="col-sm-8">
											<input type="password" class="form-control" name="nouveaumotdepasse" id="nouveaumotdepasse" placeholder="***********" required>
										</div>
									</div>
								</div>


							
								
								<!-- les bouttons annuler et Enregistrer -->
								<div class="col-md-12">
									<div class="boutonsForm">
										<button type="reset"   class="button button1">Annuler</button>
										<button type="submit"   class="button button1" name="enregistrer" id="enregistrer" onclick='window.location.reload()' >Enregistrer</button>
									</div>
								</div>						
							</div>
						</form>				 
					</div>
				</div>

			</section>

			<!-- la section historique -->
			<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="historique">
				<h2 class="mb-5">Historique</h2>
				
				<!--une data table pour stocké l'hstoriques du joueur -->
				<div class="fresh-table toolbar-color-orange">
					<table id="fresh-table" class="table">
									<thead>
										<th>Nom du Pays</th>
										<th>Nom du Continent</th>
										<th  data-sortable="true">Date</th>
										<th data-sortable="true">Points</th>
										
									
									</thead>
									<tbody>
									
									<!-- la recuperation des données depuis la table historiques -->
							<?php
									
									$emailhistorique=isset($_POST['email'])?($_POST['email']):'';
									$afficherhistorique ="SELECT * FROM historique WHERE email= '$emailhistorique'";
									$statementhistorique = $pdo->prepare($afficherhistorique);
									$statementhistorique->execute(array($emailhistorique));
									 
					while ($donnees = $statementhistorique->fetch())
						{            
											
							 ?>
							
										<tr>
											<td><?php echo $donnees['nomPays'];?></td>
											<td><?php echo $donnees['nomContinent'];?></td>
											<td><?php echo $donnees['question'];?></td>
											<td><?php echo $donnees['date'];?></td>
											<td><?php echo $donnees['points'];?></td>
											
										</tr>
							<?php 
						}
							?>

					</tbody>
					</table>
				</div>	
			</section>
			
				<!-- la section classement -->
			<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="classement">
					
				<h2 class="mb-5">Classement</h2>
				
				<!-- un tableau pour afficher les classments du joueur -->
				<div class="fresh-table toolbar-color-orange">
					
					<table id="fresh-table" class="table">
						
						<thead>
							<th>Classement</th>
							<th  data-sortable="true">Nom des Joueurs</th>
							<th  data-sortable="true">E-mail</th>
							<th  data-sortable="true">Score</th>
							<th data-field="actions" ></th>
						</thead>
						<!-- la racupération des données depuis la table utilisateur  -->
							<?php
									$afficherclassment ="SELECT nom,email,score FROM utilisateur WHERE email != 'admin@admin.com' ORDER BY score DESC ";
									$statementclassement = $pdo->prepare($afficherclassment);
									$statementclassement->execute();
									$numeroclassment=1;
									 while ($donnees = $statementclassement->fetch())
						{
							?>
							
						<tbody>
									
							<tr>
								<td><?php echo $numeroclassment++;?></td>
								<td><?php echo $donnees['nom'];?></td>
								<td><?php echo $donnees['email'];?></td>
								<td><?php echo $donnees['score'];?></td>			
							</tr>
							<?php
							}
							?>
			   
						</tbody>
					</table>
				</div>
					
			</section>
		</div>
<!-- bootstrap-->
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.bundle.min.js"></script>

			<!-- jquery-->
			<script src="js/jquery.easing.min.js"></script>

			<!-- javascript-->
			<script src="js/resume.min.js"></script>
			
			<!-- data table javascript-->
				<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
				<!--script type="text/javascript" src="js/bootstrap.js"></script-->
				<script type="text/javascript" src="js/bootstrap-table.js"></script>

			<!-- script du data table -->
			<script type="text/javascript">
				var $table = $('#fresh-table'),
					full_screen = false;
					
				$().ready(function(){
					$table.bootstrapTable({
						toolbar: ".toolbar",
			
						showRefresh: true,
						search: true,
						showToggle: true,
						showColumns: true,
						pagination: true,
						striped: true,
						pageSize: 8,
						pageList: [8,10,25,50,100],
						
						formatShowingRows: function(pageFrom, pageTo, totalRows){
							
						},
						formatRecordsPerPage: function(pageNumber){
							return pageNumber + " rangée visible";
						},
						icons: {
							refresh: 'fa fa-refresh',
							toggle: 'fa fa-th-list',
							columns: 'fa fa-columns',
							detailOpen: 'fa fa-plus-circle',
							detailClose: 'fa fa-minus-circle'
						}
					});
					
								
					
					$(window).resize(function () {
						$table.bootstrapTable('resetView');
					});
					
					
				});
					

					
			</script>
				
		<!-- la fonction play audio  -->		
		<script>
		function playAudio(ID) { 
			var x = document.getElementById(ID);
			x.play(); 
		} 
		</script>
  </body>
  </html>
