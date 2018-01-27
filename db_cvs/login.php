<?php
include('connection.php');
$msg=""; 
if (isset($_POST['btnValider']) ){

								$sql="SELECT * FROM codeuse WHERE 
								email='".mysqli_real_escape_string($link,$_POST['email'])."' AND mdp='".mysqli_real_escape_string($link,($_POST['mdp']))."' LIMIT 0,1";
								//die($sql);
								$req= mysqli_query($link,$sql);
								if (mysqli_num_rows($req)>0) {
									$data= mysqli_fetch_array($req);
									$_SESSION['variable']=$data['id'];
									header('location:dashboard.php');
								}else{
									echo "identifiants incorrects";
								}
						







						} 


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
							<li>
								<a href="codeuse.php" style="color: grey">S'inscrire</a>
							</li>

							<li>
								<a href="login.php" style="color: grey">Se connecter</a>
							</li>
							
						</ul>
					</div>
				</nav>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form action="" method="POST" role="form">
						<legend>Login</legend>
						<div class="form-group">						
							<label for="">Email</label>
							<input name="email" value="" type="email" class="form-control" id="" placeholder="exemple@email.com" required><!--required signifie rendre le champ requis ie obligatoire!-->
						</div>
						<div class="form-group">						
							<label for="">Mot de passe</label>
							<input name="mdp" value="" type="password" class="form-control" id="" placeholder="Entrer le mot de passe" required>
						</div>
						<div style="text-align: center;">
						<button name="btnValider" type="submit" class="btn btn-primary " id="" style="width: 670px" ><a href="dashboard.php">Valider</a></button>
						
					    </div>
			</form>

			<div class="col-md-3"></div>
				</div>
				








			</div>
			
		</div>
     
			
	
   <hr>
  

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

    
  
   </body>
 

</html>


	