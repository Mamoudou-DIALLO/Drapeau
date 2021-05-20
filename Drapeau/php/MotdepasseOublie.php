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
// modification du mot de passe
if(isset($_POST['reinitialiser']))
{
$email=$_POST['email'];
$questionsecurite=$_POST['question'];	
$reponse=($_POST['reponse']);
$NouveauMP=md5($_POST['NouveauMP']);

try {
	
$sqlUpdate ="UPDATE utilisateur SET mot_de_passe= '$NouveauMP' WHERE email= '$email' ";
$statement = $pdo->prepare($sqlUpdate);
$statement->execute(array($email,$questionsecurite,$reponse,$NouveauMP));

if($statement->rowCount() == 1)
	{
		require('MotdepasseBienModifier.php');
		die();
	}
}
catch(PDOException $ex)
	{
		require('MotDePasseNonModifier.php');
		die();
		
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
		<head>
			<title>Mot de passe oublié</title>
	        <meta charset="utf-8">
	         <!-- Bootstrap  CSS de base -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<!-- Styles -->
	         <link href="LoginCss.css" rel="stylesheet">
			
		
		</head>

<body>

	<!-- modification du mot de passe -->
	<div id="form">
		<div class="container">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
			  <div id="userform">
				<ul class="nav nav-tabs nav-justified" role="tablist">
				
				  <li class="tab active"><a href=""  role="tab" data-toggle="tab ">réinitialiser le mot de passe </a></li>
				</ul>
				<div class="tab-content">
				  
				  <div class="tab-pane fade active in" >
					
					<form id="login" action="MotdepasseOublie.php" method="post">
						  <div class="form-group">
								<label> E-mail<span class="req">*</span> </label>
								<input type="email" class="form-control" name="email" id="email" required data-validation-required-message="S'il vous plaît entrez votre E-mail." autocomplete="off">
								<p class="help-block text-danger"></p>
						  </div>
						  <div class="form-group">
								<label>Question de sécurité ?<span class="req"></span> </label>
								<select class="form-control" name="question">
								
								<option>what is your favorite country?</option>
								<option>what is your favorite city?</option>
								</select>
								<p class="help-block text-danger"></p>
						  </div>
						 
						  <div class="form-group">
								<label> Réponse<span class="req">*</span> </label>
								<input type="text" class="form-control" name="reponse" id="reponse" required data-validation-required-message="S'il vous plait entrez votre réponse." autocomplete="off">
								<p class="help-block text-danger"></p>
						  </div>
						  <div class="form-group">
								<label> Nouveau Mot de passe<span class="req">*</span> </label>
								<input type="password" class="form-control" name="NouveauMP"  id="NouveauMP"required data-validation-required-message="S'il vous plait entrez votre nouveau mot de passe." autocomplete="off">
								<p class="help-block text-danger"></p>
						  </div>
						  <div class="mrgn-30-top">
								<button type="submit" class="btn btn-larger btn-block" name="reinitialiser"/>
								Réinitialiser
								</button>
						  </div>
						  <div class="mrgn-30-top">
								<button type="reset" class="btn btn-larger btn-block" name="cancel"/>
								Cancel
								</button>
						  </div>
						  <div class="mrgn-30-top">
								<a href = "Jeu.php"> <button type="button" class="btn btn-larger btn-block" name="retournelogin"/>
								Se connecter
								</button></a>
						  </div>
					</form>
				  </div>
				</div>
			  </div>
			</div>
		</div>
  <!-- /.container --> 
</div>

<script>
$('#form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

      if (e.type === 'keyup') {
            if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
        if( $this.val() === '' ) {
            label.removeClass('active highlight'); 
            } else {
            label.removeClass('highlight');   
            }   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
            label.removeClass('highlight'); 
            } 
      else if( $this.val() !== '' ) {
            label.addClass('highlight');
            }
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(800);
  
});
</script>

</body>
</html>