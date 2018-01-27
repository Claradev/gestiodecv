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

				<nav class="navbar navbar-default" style="font-size: 20px; background-color: #22303a;">
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
		
     
			
	
 
</div>
</div>
<div class="container">
	<?php 
							$list=" SELECT * FROM codeuse ";
							$res= mysqli_query($link,$list);
							while ($data = mysqli_fetch_array($res)){								
	?>
	<div class="row" style="margin-top: 40px; background-color: #d9dddf; border-radius: 10px; background-image: linear-gradient(-225deg, rgba(0,200,200,0.1) 0%, rgba(0,150,150,0.1) 50%),  url('')">
		
		<div class="col-sm-4" >
		  				
						 	<img src="upload/<?php echo $data['photo'];  ?>" width="130px" height="200px" class="avatar-large" alt="">
						 	<h2><?php echo ($data['nom'].' '.$data['prenom']) ; ?></h2>

		</div>
		<div class="col-sm-4" style="padding-top: 50px;">
			
			<section><?php echo ($data['description']) ; ?></section>		 	
							
		</div>
		<div class="col-sm-4" style="padding-top: 200px;">

			<button name="lire" type="submit" class="btn-medium"> <a href="dashboard.php?$_SESSION=<?php echo $data['variable']; ?>" style="text-decoration: none; color: white; font-weight: bold;">Consulter le CV</a></button>
		</div>
				
	</div>
	<?php  
					}
				?>
</div>



    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

    
  
   </body>
 

</html>


	