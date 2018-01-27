<?php
  include('connection.php')
 

  ?>
<!DOCTYPE html>
<html>
<head lang="fr">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>

		 
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
			</div>
		</div>
				
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
 <?php 
	if (isset($_SESSION['variable'])){
	$sql="SELECT * FROM codeuse WHERE id=".$_SESSION['variable'];
	$res=mysqli_query($link, $sql);
	while($dataU=mysqli_fetch_array($res)){


	
	?>
	<div class="row" style="margin-top: 60px;float: left;">
		<div class="col-sm-2">
			<h6 style="text-align: center;"><?php echo ($dataU['nom'].' '.$dataU['prenom']); ?></h6>
			<h6 style="text-align: center;">Née le:<?php echo ($dataU['dnaissance']); ?></h6>
			<h6 style="text-align: center;">Telephone:<?php echo ($dataU['telephone']); ?></h6>
			<h6 style="text-align: center;">Email:<?php echo ($dataU['email']); ?></h6>
		</div>
		<div class="col-sm-8">
			<h3 style="text-align: center;">Description de la codeuse</h3>
		</div>
		<div class="col-sm-2">
			<img src="upload/<?php echo $dataU['photo'];  ?>" height="100px" alt="" border-radius="10px" class="avatar-large">
			<div class="col-xs-4">
            <ul class="list-inline">
              <li><a href=""><i class="fa fa-twitter"><?php echo ($dataU['twitter']);?></i></a></li>
              
              <li><a href=""><i class="fa fa-facebook"><?php echo ($dataU['facebook']);?></i></a></li>
              <li><a href=""><i class="fa fa-github"><?php echo ($dataU['github']);?></i></a></li>
            </ul>
            <?php

}
}
?>

          </div>
		</div>

	</div>
	

<div class="row" style="margin-bottom: 20px;">
	<div class="col-sm-2"></div>
	<div class="col-sm-2" style="background-color: lightgrey; height: 60px;"></div>
	<div class="col-sm-2" style="background-color: lightgrey; height: 60px";></div>
	<div class="col-sm-4" style="background-color: lightgrey; height: 60px";></div><h2 style="color: hotpink, font-weight:bold;">Mes experiences</h2></div>
	<div class="col-sm-2" style="background-color: lightgrey; height: 60px";></div>
</div>
<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-2"><h4><b>Debut - Fin</b></h4></div>
	<div class="col-sm-2"><h4><b>Poste Occupé</b></h4></div>
	<div class="col-sm-2"><h4><b>Description</b></h4></div>
	<div class="col-sm-2"><h4><b>Entreprise</b></h4></div>
	
</div>
<?php
if (isset($_SESSION['variable'])){
$sql="SELECT 
	                 codeuse.id,
						
						ddebut,
					    dfin,
						experience.description,
						entreprise
						FROM experience
						INNER JOIN codeuse
					   ON codeuse.id = experience.id_codeuse
		WHERE codeuse.id=".$_SESSION['variable'];
	$res=mysqli_query($link, $sql);
	while($dataU=mysqli_fetch_array($res)){


	
	?>


	    <div class="row" style="margin: 15px;">
	    	<div class="col-sm-2"></div>
	<div class="col-sm-2"><b><?php echo ($dataU['ddebut'].' au '.$dataU['dfin']);?>Debut - Fin</b></div>
	<div class="col-sm-2"><b><?php echo ($dataU['poste']);?>Poste Occupé</b></div>
	<div class="col-sm-2"><?php echo ($dataU['description']);?>Description</div>
	<div class="col-sm-2"><?php echo ($dataU['entreprise']);?><b>Entreprise</b></div>
	</div>
	<?php
}
}
?>


<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-2"><h4><b>Etablissement</b></h4></div>
	<div class="col-sm-2"><h4><b>Diplome</b></h4></div>
	<div class="col-sm-2"><h4><b>Date d'obtention</b></h4></div>
	
	
</div>
<?php
if (isset($_SESSION['variable'])){
$sql="SELECT 
	                 codeuse.id,
						
						
						dateob,
						diplome,
						etablissement,
					    
					
						FROM diplome
						INNER JOIN codeuse
					   ON codeuse.id = diplome.id_codeuse
		WHERE codeuse.id=".$_SESSION['variable'];
	$res=mysqli_query($link, $sql);
	while($dataU=mysqli_fetch_array($res)){


	
	?>


	    <div class="row" style="margin: 15px;">
	    	<div class="col-sm-2"></div>
	    	<div class="col-sm-2"><?php echo ($dataU['dateob']);?>Description</div>
	    	<div class="col-sm-2"><b><?php echo ($dataU['diplome']);?>Poste Occupé</b></div>
	<div class="col-sm-2"><b><?php echo ($dataU['etablissement']);?>Debut - Fin</b></div>
	
	
	
	</div>
	<?php
}
}
?>
<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-2"><h4><b>Debut - Fin</b></h4></div>
	<div class="col-sm-2"><h4><b>Poste Occupé</b></h4></div>
	<div class="col-sm-2"><h4><b>Description</b></h4></div>
	<div class="col-sm-2"><h4><b>Entreprise</b></h4></div>
	
</div>
<?php
if (isset($_SESSION['variable'])){
$sql="SELECT 
	                 codeuse.id,
						
						titre,
					    
						interet.description,
						
						FROM interet
						INNER JOIN codeuse
					   ON codeuse.id = interet.id_codeuse
		WHERE codeuse.id=".$_SESSION['variable'];
	$res=mysqli_query($link, $sql);
	while($dataU=mysqli_fetch_array($res)){


	
	?>


	    <div class="row" style="margin: 15px;">
	    	<div class="col-sm-2"></div>
	<div class="col-sm-2"><b><?php echo ($dataU['titre']);?>Centre d'intérêt</b></div>
	<div class="col-sm-2"><b><?php echo ($dataU['description']);?>Description</b></div>
	
	</div>
	<?php
}
}
?>
		


<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>


	