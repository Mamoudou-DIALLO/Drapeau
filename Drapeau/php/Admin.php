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
// pour récuperer le prénom de l'administrateur (Bonjour nom)
$emailnom=isset($_POST['email'])?($_POST['email']):'';	
$nomafficher ="SELECT * FROM utilisateur WHERE email= '$emailnom'";
$statement = $pdo->prepare($nomafficher);
$statement->execute(array(':nom' => $nomafficher));

// pour afficher le nombre des joueures 

$nombrejoueures ="SELECT count(*) as nombre FROM utilisateur";
$statementnombre= $pdo->prepare($nombrejoueures);
$statementnombre->execute();
$donneesNombreJoueur =$statementnombre->fetch();

// ajouter un joueur
if(isset($_POST['AjoueterJoueurA']))
{
	$_POST['AjoueterJoueurA']='';
$nom=isset($_POST['nom'])?($_POST['nom']):'';
$email=isset($_POST['email'])?($_POST['email']):'';
$motdepasse=isset($_POST['mdp'])?($_POST['mdp']):'';
	try{										
$sqlAfficherNom ="insert into utilisateur(nom,email,mot_de_passe,date_i) VALUES('$nom','$email','$motdepasse',curtime())";
$statementAfficherNom= $pdo->prepare($sqlAfficherNom);
$bool =$statementAfficherNom->execute(array($nom,$email,$motdepasse));
	if($bool){
					require('CompteBienCree.php');die();
				} else echo "enregistrement pff ";
	
	} catch (PDOException $e)
		{
			die('Erreur : ' . $e->getMessage());
		}					
}		
//ajouter Quiz continent
// if (isset($_POST["AjouterQuizC"])){
    //recuperation de l'id du quiz
	// $_POST['AjoueterJoueurA']='';
    // $id_c=isset($_POST["id_c"]);
    //recuperation des pays de la question
    // $q1_p=isset($_POST["pays1"]);
    // $q2_p=isset($_POST["pays2"]);
    // $q3_p=isset($_POST["pays3"]);
    // $q4_p=isset($_POST["pays4"]);
    // $q5_p=isset($_POST["pays5"]);
    // $q6_p=isset($_POST["pays6"]);
    // $q7_p=isset($_POST["pays7"]);
    //recuperation des images
    // $q1_i=isset($_POST["image1"]);
    // $q2_i=isset($_POST["image2"]);
    // $q3_i=isset($_POST["image3"]);
    // $q4_i=isset($_POST["image4"]);
    // $q5_i=isset($_POST["image5"]);
    // $q6_i=isset($_POST["image6"]);
    // $q7_i=isset($_POST["image7"]);
    //recuperation des coordonnées
    // $q1_coord=isset($_POST["coord1"]);
    // $q2_coord=isset($_POST["coord2"]);
    // $q3_coord=isset($_POST["coord3"]);
    // $q4_coord=isset($_POST["coord4"]);
    // $q5_coord=isset($_POST["coord5"]);
    // $q6_coord=isset($_POST["coord6"]);
    // $q7_coord=isset($_POST["coord7"]);
    //recuperation des points des differntes questions
    // $q1_point=isset($_POST["point1"]);
    // $q2_point=isset($_POST["point2"]);
    // $q3_point=isset($_POST["point3"]);
    // $q4_point=isset($_POST["point4"]);
    // $q5_point=isset($_POST["point5"]);
    // $q6_point=isset($_POST["point6"]);
    // $q7_point=isset($_POST["point7"]);
    //insertion du quiz
    //$sql_id = "INSERT INTO quiz_c(id_c) VALUES('$id_c')";
    //insertion des questions du quiz
    // $sql_1 = "INSERT INTO question_c(id_c,pays,coord,points,image) VALUES('$id_c','$q1_p','$q1_coord','$q1_point','$q1_i')";
    // $sql_2 = "INSERT INTO question_c(id_c,pays,coord,points,image) VALUES('$id_c','$q2_p','$q2_coord','$q2_point','$q2_i')";
    // $sql_3 = "INSERT INTO question_c(id_c,pays,coord,points,image) VALUES('$id_c','$q3_p','$q3_coord','$q3_point','$q3_i')";
    // $sql_4 = "INSERT INTO question_c(id_c,pays,coord,points,image) VALUES('$id_c','$q4_p','$q4_coord','$q4_point','$q4_i')";
    // $sql_5 = "INSERT INTO question_c(id_c,pays,coord,points,image) VALUES('$id_c','$q5_p','$q5_coord','$q5_point','$q5_i')";
    // $sql_6 = "INSERT INTO question_c(id_c,pays,coord,points,image) VALUES('$id_c','$q6_p','$q6_coord','$q6_point','$q6_i')";
    // $sql_7 = "INSERT INTO question_c(id_c,pays,coord,points,image) VALUES('$id_c','$q7_p','$q7_coord','$q7_point','$q7_i')";
    // try{
        //preparation des requêtes
        // $c1=$pdo->prepare($sql_id);
        // $c2=$pdo->prepare($sql_1);
        // $c3=$pdo->prepare($sql_2);
        // $c4=$pdo->prepare($sql_3);
        // $c5=$pdo->prepare($sql_4);
        // $c6=$pdo->prepare($sql_5);
        // $c7=$pdo->prepare($sql_6);
        // $c8=$pdo->prepare($sql_7);
        //execution des requêtes
        // $b1 = $c1->execute(array($id_c));
        // $b2 = $c2->execute(array($id_c,$q1_p,$q1_coord,$q1_point,$q1_i));
        // $b3 = $c3->execute(array($id_c,$q2_p,$q2_coord,$q2_point,$q2_i));
        // $b4 = $c4->execute(array($id_c,$q3_p,$q3_coord,$q3_point,$q3_i));
        // $b5 = $c5->execute(array($id_c,$q4_p,$q4_coord,$q4_point,$q4_i));
        // $b6 = $c6->execute(array($id_c,$q5_p,$q5_coord,$q5_point,$q5_i));
        // $b7 = $c7->execute(array($id_c,$q6_p,$q6_coord,$q6_point,$q6_i));
        // $b8 = $c8->execute(array($id_c,$q7_p,$q7_coord,$q7_point,$q7_i));
        //verification de de l'insertion
        // if($b1 and $b2 and $b3 and $b4 and $b5 and $b6 and $b7 and $b8 ){
            // require('Admin.php');die();
        // } else{
            // echo "l'execution d'une requête a mal fonctionner";
        // }
    // }catch (PDOException $e)
    // {
        // die('Erreur : ' . $e->getMessage());
    // }

//}


									  
?>
<!DOCTYPE html>
<html>

  <head>


   <meta charset="utf-8">
    
	
	<!--Hist-->
        <link href="css/fresh-bootstrap-table.css" rel="stylesheet" />
   
	
    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!--link href="css/devicons.min.css" rel="stylesheet"-->
    <link href="css/simple-line-icons.css" rel="stylesheet">
	

 	 
 
    <!-- Custom styles for this template -->
    <link href="css/resume.css" rel="stylesheet">
	<!-- Leaflet -->
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />  
   	<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
	<link rel="icon" type="image/png" href="images/LogoM.jpg"  />

  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">

		<h1>ADMIN</h1>
	  </a>
      <!--button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button-->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#ProfilAdmin">Profil Admin</a>
          </li>
    
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#VisualiserJoueurs">Visualiser Joueurs</a>
          </li>
		 
		  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#VisualiserQuestions">Visualiser Questions</a>
          </li>
		  
           <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#AjouterJoueur">Ajouter Joueur </a>
          </li> 
         
          <!--li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#AjouterQuizC">Ajouter Quiz Continent</a>
          </li>
		  
		   <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#AjouterQuizP">Ajouter Quiz Pays</a>
          </li-->
		   
		  
		  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Deconnecter.php">Deconnexion</a>
          </li>
        </ul>
      </div>
    </nav>
<!---------------------->
<div class="container-fluid p-0">
	 <section class="resume-section p-3 p-lg-5 " id="ProfilAdmin">
     <div class="row">
                            <div class="col-lg-12 col-xl-4">
                                <div class="card-box">
                                    <div class="bar-widget">
                                        <div class="table-box">
                                            <div class="table-detail">
                                                <!-- <div class="iconbox bg-info"> -->
                                                    <i class="fa fa-users" style="font-size:48px"></i>
                                                <!-- </div> -->
                                            </div>

                                            <div class="table-detail">
											<p class="text-muted m-b-0 m-t-0">Nombre des Joueurs</p>
											
                                                <h4 class="m-t-0 m-b-5"><b><?php echo $donneesNombreJoueur['nombre']?></b></h4>
											
                                               
                                            </div>
                                          

                                        </div>
                                    </div>
                                </div>
                            </div>

                    
							
						
                        </div>
     
       
			
	
		<div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="equipe">
              <img class="mx-auto rounded-circle" src="images/admin.png" alt="">
              <h4>REGRAGUI Yousra</h4>
              <p class="text-muted">Etudiante L3 informatique</p>
              <ul class="list-inline social-buttons">
                
               
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="equipe">
              <img class="mx-auto rounded-circle" src="images/admin2.png" alt="">
              <h4>DIALLO MAMADO Korka</h4>
              <p class="text-muted">Etudiant L3 informatique</p>
              <ul class="list-inline social-buttons">
                
               
              </ul>
            </div>
          </div>
         
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted">Licence 3 Informatique Institut Galilée - Université Paris 13 .</p>
          </div>
        </div>
      </div>
      </section>
	  
	  
	  <!--liste des joueurs-->
	   <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="VisualiserJoueurs">
      <h2 class="mb-5">La liste Des Joueurs</h2>
	
	
	 
	 <div class="fresh-table toolbar-color-orange">
		<table id="fresh-table" class="table">
		<?php
		
		$SqlAficherJoueurs="SELECT * FROM utilisateur";
		$statementAfficherJoueurs= $pdo->prepare($SqlAficherJoueurs);
		$statementAfficherJoueurs->execute();
		?>
		 
		 
                        <thead>
                        	<th  data-sortable="true">Nom</th>
                        	<th  data-sortable="true">E-mail</th>
							<th >date inscription</th>
							<th >score</th>
							<th >Photo</th>
                        	<th data-field="actions">Action</th>
                        </thead>
                        <tbody>
		  <?php
						while($donnees = $statementAfficherJoueurs->fetch())
		 {
           ?>                 <tr>
                            	
                            	<td><?php echo $donnees['nom'] ?></td>
                            	<td><?php echo $donnees['email'] ?></td>
                            	<td><?php echo $donnees['date_i'] ?></td>
								
								<td><?php echo $donnees['score'] ?></td>
								<td><img src="imageUtilisateurs/<?php echo($donnees['image'])?>"  height="42" width="42"></td>
								<td><a href="supprimerJoueur.php?email=<?php echo $donnees['email'] ?>" onclick="return confirm('voulez-vous supprimer ce Joueur ? o_O!')" role= "button" id="supprimer"><i class="fa fa-times"></i></a></td>
                            	
                            </tr>
		 <?php
		 }
         ?>               
                        </tbody>
				
        </table>
		
	  </div>	
      </section>
	  
	  
	  <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="VisualiserQuestions">
      <h2 class="mb-5">La liste Des Questions pour le questionnaire Continent </h2>
	 

	
	 
	 <div class="fresh-table toolbar-color-orange">
		<table id="fresh-table" class="table">
		<?php
		
		$SqlAficherQuestion="SELECT * FROM question_c";
		$statementAfficherQuestion= $pdo->prepare($SqlAficherQuestion);
		$statementAfficherQuestion->execute();
		?>
		 
		 
                        <thead>
                            
							<th  data-sortable="true">Numéro de questionnaire</th>
							
                        	<th  data-sortable="true">Nom Pays</th>
                
                        	<th data-sortable="true">coordonnées </th>
                        	

                        	<th data-field="actions">Action</th>
                        </thead>
                        <tbody>
		  <?php
						while($donnees = $statementAfficherQuestion->fetch())
		 {
           ?>                 <tr>
								<td><?php echo $donnees['id_c'] ?></td>
								
                            	<td><?php echo $donnees['pays'] ?></td>
                            	<td><?php echo $donnees['coord'] ?></td>
                            	
                            	
								
								<td><a href="supprimerQuestion.php?question=<?php echo $donnees['pays'] ?>" onclick="return confirm('voulez-vous supprimer cette question ? o_O!')" role= "button" id="supprimer"><i class="fa fa-times"></i></a></td>
                            	
                            </tr>
		 <?php
		 }
         ?>               
                        </tbody>
				
        </table>
		
	  </div>	
    
	  
      <h2 class="mb-5">La liste Des Questions pour le questionnaire Pays </h2>
	 

	
	 
	 <div class="fresh-table toolbar-color-orange">
		<table id="fresh-table" class="table">
		<?php
		
		$SqlAficherQuestion="SELECT * FROM question_p";
		$statementAfficherQuestion= $pdo->prepare($SqlAficherQuestion);
		$statementAfficherQuestion->execute();
		?>
		 
		 
                        <thead>
                            
							<th  data-sortable="true">Numéro de questionnaire</th>
							
                        	<th  data-sortable="true">Nom Continent</th>
                
                        	<th data-sortable="true">coordonnées </th>
                        	

                        	<th data-field="actions">Action</th>
                        </thead>
                        <tbody>
		  <?php
						while($donnees = $statementAfficherQuestion->fetch())
		 {
           ?>                 <tr>
								<td><?php echo $donnees['id_p'] ?></td>
								
                            	<td><?php echo $donnees['continent'] ?></td>
                            	<td><?php echo $donnees['corrd'] ?></td>
                            	
                            	
								
								<td><a href="supprimerQuestionP.php?question=<?php echo $donnees['continent'] ?>" onclick="return confirm('voulez-vous supprimer cette question ? o_O!')" role= "button" id="supprimer"><i class="fa fa-times"></i></a></td>
                            	
                            </tr>
		 <?php
		 }
         ?>               
                        </tbody>
				
        </table>
		
	  </div>	
      </section>
	  <!--Ajouter Joueur-->
	  <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="AjouterJoueur">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">     
                    <form class="form-horizontal" role="form" method="POST">
                                        <div class='row'>
                                            <div class="col-lg-12">
                                                <div class="ajouterquestion">
                                                    <span class="prg">Ajouter Joueur </span> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            
                                                <div class="col-lg-6">
                                                
													
													<div class="form-group">
                                                      <div class="col-sm-8">
													 
													  
                                                      </div>
												    </div>
													
													
													<div class="form-group" >
                                                        <label for="maxLat5" class="col-sm-2 control-label">Nom</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="nom" id="nom"required>
                                                        </div>
                                                    </div>
													 <div class="form-group">
                                                        <label for="minLat5" class="col-sm-2 control-label">Email</label>
                                                        <div class="col-sm-8">
                                                            <input type="email" class="form-control" name="email" id="email"required>
                                                        </div>
                                                    </div>
													
                                                    <div class="form-group">
                                                        <label for="maxLgt5" class="col-sm-2 col-lg-4 control-label">Mot de passe</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" class="form-control" name="mdp" id="mdp"required>
                                                        </div>
                                                    </div>
                                                  

                                                </div>

                                            
                                        </div>

                                        <div class="row">
                                                                                           
											 <div class="col-lg-12">
														
													 <div class="boutonsForm">

													<button type="reset"   class="button button1">Annuler</button>
													<button type="submit"   class="button button1" name="AjoueterJoueurA">Enregistrer</button>
													 </div>
														 
											 </div>
        
                                        </div>
                
                                         
                                        

                                     
                    </form>
                              
                            
                </div>    
			</div>
		</div>  
    </section>
	  <!--Ajouter une quiz Continent -->
	<!--section class="resume-section p-3 p-lg-5 d-flex flex-column" id="AjouterQuizC">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">     
                   
                    <form class="form-horizontal" role="form" method="POST">
                                        <div class='row'>
                                            <div class="col-lg-12">
                                                <div class="ajouterquestion">
                                                    <span class="prg">Ajouter Quiz Continent </span> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            
                                                <div class="col-lg-6">
													<div class="form-group" >
                                                        <label for="num1" class="col-sm-2 col-lg-4 control-label">Numero de quiz </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="num1" id="num1"required>
                                                        </div>
                                                    </div>
													 
													
                                                    <div class="form-group">
                                                        <label for="pays1" class="col-sm-2 control-label">Pays1</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="pays1" id="pays1"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="pay2" class="col-sm-2 control-label">Pays2</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="pays2" id="pays2"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="pays3" class="col-sm-2 control-label">Pays3</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="pays3" id="pays3"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="pays4" class="col-sm-2 control-label">Pays4</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="pays4" id="pays4"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="pays5" class="col-sm-2 control-label">Pays5</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="pays5" id="pays5"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="pays6" class="col-sm-2 control-label">Pays6</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="pays6" id="pays6"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="pays7" class="col-sm-2 control-label">Pays7</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="pays7" id="pays7" required>
                                                        </div>
                                                    </div>
													</div>
													<!--------------------------------->
													<!--div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="coord1" class="col-sm-2 control-label">Cordonnées1 </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="coord1" id="coord1"required>
                                                        </div>
                                                    </div>
													
													 <div class="form-group">
                                                        <label for="coord2" class="col-sm-2 control-label">Cordonnées2 </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="coord2" id="coord2" required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="coord3" class="col-sm-2 control-label">Cordonnées3 </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="coord3" id="coord3" required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="coord4" class="col-sm-2 control-label">Cordonnées4 </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="coord4" id="coord4"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="coord5" class="col-sm-2 control-label">Cordonnées5 </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="coord5" id="coord5"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="coord6" class="col-sm-2 control-label">Cordonnées6 </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="coord6" id="coord6"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="coord7" class="col-sm-2 control-label">Cordonnées7 </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="coord7" id="coord7"required>
                                                        </div>
                                                    </div>

                                                </div>
												<!------------------------------------->
                                                <!--div class="col-lg-6">
											
                                                      <div class="form-group">
                                                         <label for="point1" class="col-sm-2 control-label">points1</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="point1" id="point1"required>
                                                        </div>
                                                        
                                                    </div>
													  <div class="form-group">
                                                         <label for="point2" class="col-sm-2 control-label">points2</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="point2" id="point2"required>
                                                        </div>
                                                        
                                                    </div>
													  <div class="form-group">
                                                         <label for="point3" class="col-sm-2 control-label">points3</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="point3" id="point3"required>
                                                        </div>
                                                        
                                                    </div>
													  <div class="form-group">
                                                         <label for="point4" class="col-sm-2 control-label">points4</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="point4" id="point4"required>
                                                        </div>
                                                        
                                                    </div>
													  <div class="form-group">
                                                         <label for="point5" class="col-sm-2 control-label">points5</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="point5" id="point5"required>
                                                        </div>
                                                        
                                                    </div>
													  <div class="form-group">
                                                         <label for="point6" class="col-sm-2 control-label">points6</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="point6" id="point6"required>
                                                        </div>
                                                        
                                                    </div>
													  <div class="form-group">
                                                         <label for="point7" class="col-sm-2 control-label">points7</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="point7" id="point7"required>
                                                        </div>
                                                        
                                                    </div>
													</div>
													
												<div class="col-lg-6">
                                                   <div class="form-group">
                                                         <label for="image1" class="col-sm-2 control-label">image1</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="image1" id="image1"required>
                                                        </div>
                                                        
                                                    </div>
													
													<div class="form-group">
                                                         <label for="image2" class="col-sm-2 control-label">image2</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="image2" id="image2"required>
                                                        </div>
                                                        
                                                    </div>
													<div class="form-group">
                                                         <label for="image3" class="col-sm-2 control-label">image3</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="image3" id="image3"required>
                                                        </div>
                                                        
                                                    </div>
													<div class="form-group">
                                                         <label for="image4" class="col-sm-2 control-label">image4</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="image4" id="image4"required>
                                                        </div>
                                                        
                                                    </div>
													<div class="form-group">
                                                         <label for="image5" class="col-sm-2 control-label">image5</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="image5" id="image5"required>
                                                        </div>
                                                        
                                                    </div>
													<div class="form-group">
                                                         <label for="image6" class="col-sm-2 control-label">image6</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="image6" id="image6"required>
                                                        </div>
                                                        
                                                    </div>
													<div class="form-group">
                                                         <label for="image7" class="col-sm-2 control-label">image7</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="image7" id="image7"required>
                                                        </div>
                                                        
                                                    </div>

                                                    
                                                </div>
                                            
                                        </div>

                                        <div class="row">
                                                                                           
											 <div class="col-lg-12">
														
													 <div class="boutonsForm">

													<button type="reset"   class="button button1">Annuler</button>
													<button type="submit"   class="button button1" name="AjouterQuizC">Enregistrer</button>
													 </div>
														 
											 </div>
        
                                        </div>
                
                                         
                                        

                                     
                    </form>
                            
                </div>    
			</div>
		</div>  
    </section>
	  <!--Ajouter quiz pays-->
	  <!--section class="resume-section p-3 p-lg-5 d-flex flex-column" id="AjouterQuizP">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">     
                   
                    <form class="form-horizontal" role="form" method="POST">
                                        <div class='row'>
                                            <div class="col-lg-12">
                                                <div class="ajouterquestion">
                                                    <span class="prg">Ajouter Quiz Pays </span> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            
                                                <div class="col-lg-6">
													<div class="form-group" >
                                                        <label for="num1" class="col-sm-2 col-lg-4 control-label">Numero de quiz </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="num1" id="num1"required>
                                                        </div>
                                                    </div>
													 
													
                                                    <div class="form-group">
                                                        <label for="continent1" class="col-sm-2 control-label">continent1</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="continent1" id="continent1"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="continent2" class="col-sm-2 control-label">continent2</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="continent2" id="continent2"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="continent3" class="col-sm-2 control-label">continent3</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="continent3" id="continent3"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="continent4" class="col-sm-2 control-label">continent4</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="continent4" id="continent4"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="continent5" class="col-sm-2 control-label">continent5</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="continent5" id="continent5"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="continent6" class="col-sm-2 control-label">continent6</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="continent6" id="continent6"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="continent7" class="col-sm-2 control-label">continent7</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="continent7" id="continent7" required>
                                                        </div>
                                                    </div>
													</div>
													<!--------------------------------->
													<!--div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="corrd1" class="col-sm-2 control-label">Cordonnées1 </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="corrd1" id="corrd1"required>
                                                        </div>
                                                    </div>
													
													 <div class="form-group">
                                                        <label for="corrd2" class="col-sm-2 control-label">Cordonnées2 </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="corrd2" id="coord2" required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="corrd3" class="col-sm-2 control-label">Cordonnées3 </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="corrd3" id="corrd3" required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="corrd4" class="col-sm-2 control-label">Cordonnées4 </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="corrd4" id="corrd4"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="coord5" class="col-sm-2 control-label">Cordonnées5 </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="coord5" id="coord5"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="corrd6" class="col-sm-2 control-label">Cordonnées6 </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="corrd6" id="corrd6"required>
                                                        </div>
                                                    </div>
													<div class="form-group">
                                                        <label for="corrd7" class="col-sm-2 control-label">Cordonnées7 </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="corrd7" id="corrd7"required>
                                                        </div>
                                                    </div>

                                                </div>
												<!------------------------------------->
                                                <!--div class="col-lg-6">
											
                                                      <div class="form-group">
                                                         <label for="points1" class="col-sm-2 control-label">points1</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="points1" id="points1"required>
                                                        </div>
                                                        
                                                    </div>
													  <div class="form-group">
                                                         <label for="points2" class="col-sm-2 control-label">points2</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="points2" id="points2"required>
                                                        </div>
                                                        
                                                    </div>
													  <div class="form-group">
                                                         <label for="points3" class="col-sm-2 control-label">points3</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="points3" id="points3"required>
                                                        </div>
                                                        
                                                    </div>
													  <div class="form-group">
                                                         <label for="points4" class="col-sm-2 control-label">points4</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="points4" id="points4"required>
                                                        </div>
                                                        
                                                    </div>
													  <div class="form-group">
                                                         <label for="points5" class="col-sm-2 control-label">points5</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="points5" id="points5"required>
                                                        </div>
                                                        
                                                    </div>
													  <div class="form-group">
                                                         <label for="points6" class="col-sm-2 control-label">points6</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="points6" id="points6"required>
                                                        </div>
                                                        
                                                    </div>
													  <div class="form-group">
                                                         <label for="points7" class="col-sm-2 control-label">points7</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="points7" id="points7"required>
                                                        </div>
                                                        
                                                    </div>
													</div>
													
												<div class="col-lg-6">
                                                   <div class="form-group">
                                                         <label for="img1" class="col-sm-2 control-label">image1</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="img1" id="img1"required>
                                                        </div>
                                                        
                                                    </div>
													
													<div class="form-group">
                                                         <label for="img2" class="col-sm-2 control-label">image2</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="img2" id="img2"required>
                                                        </div>
                                                        
                                                    </div>
													<div class="form-group">
                                                         <label for="img3" class="col-sm-2 control-label">image3</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="img3" id="img3"required>
                                                        </div>
                                                        
                                                    </div>
													<div class="form-group">
                                                         <label for="img4" class="col-sm-2 control-label">image4</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="img4" id="img4"required>
                                                        </div>
                                                        
                                                    </div>
													<div class="form-group">
                                                         <label for="img5" class="col-sm-2 control-label">image5</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="img5" id="img5"required>
                                                        </div>
                                                        
                                                    </div>
													<div class="form-group">
                                                         <label for="img6" class="col-sm-2 control-label">image6</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="img6" id="img6"required>
                                                        </div>
                                                        
                                                    </div>
													<div class="form-group">
                                                         <label for="img7" class="col-sm-2 control-label">image7</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="img7" id="img7"required>
                                                        </div>
                                                        
                                                    </div>

                                                    
                                                </div>
                                            
                                        </div>

                                        <div class="row">
                                                                                           
											 <div class="col-lg-12">
														
													 <div class="boutonsForm">

													<button type="reset"   class="button button1">Annuler</button>
													<button type="submit"   class="button button1" name="AjouterQuizC">Enregistrer</button>
													 </div>
														 
											 </div>
        
                                        </div>
                
                                         
                                        

                                     
                    </form>
	  </div>
	      <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/resume.min.js"></script>
	
	<!--data table pour les visualisations-->
	 <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap-table.js"></script>

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
                    //do nothing here, we don't want to show the text "showing x of y from..." 
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
    
          
            window.operateEvents = {
                'click .edit': function (e, value, row, index) {
                    alert('You click edit icon, row: ' + JSON.stringify(row));
                    console.log(value, row, index);    
                },
                'click .remove': function (e, value, row, index) {
                    $table.bootstrapTable('remove', {
                        field: 'id',
                        values: [row.id]
                    });
            
                }
            };
            
            
            
        });
            
		
        function rendreBouttonVisible() {
			var elm = document.getElementById("aideselect").value;
			if(elm == "joueurs"){
				document.getElementById("modifier").style.visibility = "hidden";
				document.getElementById("supprimer").style.visibility = "visible";
			}else if(elm == "merveilles"){
				document.getElementById("modifier").style.visibility = "visible";
				document.getElementById("supprimer").style.visibility = "visible";
			}
        }
		
            
    </script>

	  
	  
	  
	  
	  </body>
	  </html>
