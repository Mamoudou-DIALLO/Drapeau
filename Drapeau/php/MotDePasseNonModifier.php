<!DOCTYPE html>
<html>
		<head>
			<title>Mot de passe Non Modifier</title>
	        <meta charset="utf-8">
	         <!-- Bootstrap  CSS de base -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<!-- Styles-->
	        <link href="LoginCss.css" rel="stylesheet">
			
		
		</head>

<body>
	
	<div id="form">
		<div class="container">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
			  <div id="userform">
				<ul class="nav nav-tabs nav-justified" role="tablist">
				
				  <li class="tab active"><a href="#login"  role="tab" data-toggle="tab ">Une erreur s'est produit veillez ressayer svp </a></li>
				</ul>
				<div class="tab-content">
				  
				  <div class="tab-pane fade active in" id="login">
					
					<form id="login" action="MotdepasseOublie.php" method="post">
					 
					  <div class="mrgn-30-top">
						<a href="MotdepasseOublie.php"> <button type="button" class="btn btn-larger btn-block" name="reinitialiser"/>
						Réssayer
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

</body>
</html>