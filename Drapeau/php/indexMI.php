
<!DOCTYPE html>
<html lang="fr">
	<head>
	<title>MapGame - Présentation</title>
	<meta charset="utf-8">
	<!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style>
  
  body{
	  background-image : url('images/acc.jpg') ;
	  background-repeat:no-repeat;
	  background-position:center top;
	 }
 
  
  
  #div2{
	  width: 500px;
  height: 15px;
 margin-left:500px;
  font-weight: bold;
  position: relative;
	  animation-timing-function: ease-in;
	-webkit-animation-timing-function: ease-in;
	-webkit-animation: mymove 5s ;
	animation: mymove 5s ;
  }
  @keyframes mymove {
  from {left: 0px;}
  to {left: 500px;}
}

  #div3{
	    width: 500px;
  height: 15px;
 margin-left:500px;
  font-weight: bold;
  position: relative;
	  animation-timing-function: ease-in;
	-webkit-animation-timing-function: ease-in;
	-webkit-animation: mymove 5s ;
	animation: mymove 5s ;
  }
@keyframes mymove {
  from {right: 0px;}
  to {right: 500px;}
}
  </style>
</head>
   <body>
   
   </br></br>
   
   </br></br></br></br></br></br>
  
		<div id='div2'>
		<h2 style="text-align:center">
		 <a  class="btn btn-warning btn-lg text-uppercase js-scroll-trigger" href="questionnairePaysMI.php">Qestionnaire sur les pays </a>  </h2> </div></br>
		 <div id='div3'>
		 <h2 style="text-align:center">
		 <a  class="btn btn-info btn-lg text-uppercase js-scroll-trigger" href="questionnaireContinentMI.php"> Questionnaire sur les continents </a></h2>
		 </div>
	
		 
		</body>
		</html>
		        
