<?php
  include('connection.php')
  ?>
<!DOCTYPE html>
<html>
<head lang="fr">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Accueil</title>

		 
	<link rel="stylesheet" href="css/bootstrap.css" >
	<link rel="stylesheet" href="css/styles.css" >

</head>
<body style="background-color: white;">
		<div class="container-fluid">
     
			<div class="row"><!-- Menu -->

				<nav class="navbar navbar-default" style="font-size: 20px; background-color: black;">
					<div class="container-fluid">
						<a class="navbar-brand" href="accueil.php">Sheisthecode Cv</a>
						<ul class="nav navbar-nav navbar-right">
							<li>
          
                          <a href="index.php" style="color: grey">A propos</a>

							</li>
							
								<li class="dropdown">
				<button class="dropbtn">User<span class="caret"></span></button>
				<div class="dropdown-content">
					<a href="login.php"><h6>Se deconnecter</h6></a>
				</div>
							</li>

							
							
						</ul>
					</div>
				</nav>
		
     
	<div class="row">
					
				
		
     <div class="sidenav" style="width: 15%">
     	
     	<a href="codeuse.php"><h5>Modifier votre profil</h5></a>
     	<a href="creercv.php"><h5>Créer un Cv</h5></a>
     	<a href="dashboard.php"><h5>Afficher votre Cv</h5></a>
     	<a href="experience.php"><h5>Ajouter une Expérience</h5></a>
     	<a href="diplome.php"><h5>Ajouter un Diplôme </h5></a>
     	<a href="interet.php"><h5>Ajouter un Centre d'intérêt</h5> </a>
     	
     	
     	
     </div>
 </div>
 <div style="margin-left: 25%">
     	<div class="container">

			<div class="row">
				
				<div class="col-md-9" style="background-color: #F1FDFE;">

					<form action="" method="POST" role="form" enctype="multipart/form-data">
						
						
					
						<div class="form-group">
							<label for="">Facebook</label>
							<input name="facebook" type="text" value=""  class="form-control" id="" placeholder="lien vers votre profil facebook">
						</div>
						<div class="form-group">
							<label for="">Twitter</label>
							<input name="twitter" type="text" value=""  class="form-control" id="" placeholder="lien ver votre profil twitter">
						</div>
						<div class="form-group">
							<label for="">Git hub</label>
							<input name="github" type="text" value=""  class="form-control" id="" placeholder="lien vers votre profil git hub">
						</div>
						
						
						<div style="text-align: center;">
						<button name="btnValider" type="submit" class="btn btn-primary" style="width: 850px"><a href="dashboard.php">Valider</a></button>
						</div>
					
					</form>
				</div>
			</div>

     	 
     
     
				
			

		</div>
	</div>
			
	
   
  

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

    
  
   </body>
 

</html>


	
    