<?php
  include('connection.php');
  $msg="";
	if (isset($_POST['btnValider'])){
		
			$sql= "INSERT INTO interet (titre,description) VALUES
			 ('".mysqli_real_escape_string ($link,$_POST['titre'])."',
			  
			 
             '".mysqli_real_escape_string ($link,$_POST['description'])."')";
			if (isset($_GET['id']))
			{
				$sql="UPDATE interet SET 
				titre='".$_POST['titre']."', 
				description='".$_POST['description']."'
				
				
				 WHERE id=".$_GET['id']; 
				 

 			} 
			$result=mysqli_query($link ,$sql);
			if ($result) {
				$msg='Insertion reussie';
			}else{
				$msg=mysqli_error($link);
			}
		}
		
	if (isset($_GET['id'])){
	$update="SELECT * FROM interet WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
	}
	if (isset($_GET['sup'])){
	$delete="DELETE FROM interet WHERE id=".$_GET['sup'];
	$res=mysqli_query($link, $delete);
}
  ?>
<!DOCTYPE html>
<html>
<head lang="fr">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Interet</title>

		 
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
							<label for="">Titre</label>
							<input name="titre" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['titre']; ?>"  class="form-control" id="" placeholder="entrer votre centre d'interêt">
						</div>
						<div class="form-group">
							<label for="">Description</label>
							<textarea name="description" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['description']; ?>"  class="form-control" id="" ></textarea>
						</div>
						
						<div style="text-align: center;">
						<button name="btnValider" type="submit" class="btn btn-primary" style="width: 850px"><a href="">Valider</a></button>
						</div>
					
					</form>
				</div>
			</div>

     	 
     
     <div class="row"> 
				
				<div class="col-md-9" style="background-color: #F1FDFE;">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Titre</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT * FROM interet ";

							$res= mysqli_query($link,$list);
	while ($data = mysqli_fetch_array($res))
		{						
							
						 ?>
						<tr>
							<td><?php echo $n; ?> </td>
							<td><?php echo $data['titre']; ?></td>
							<td><?php echo $data['description']; ?></td>
							<td>
								<a href="?id=<?php echo $data['id']; ?>">Modifier</a>
								<a href="?sup=<?php echo $data['id']; ?>">Supprimer</a>
							</td>
						</tr>
						<?php $n++;
						 } ?>
					</tbody>
				</table>
				</div>
				
			</div>

		</div>
	</div>
			
	
   
  

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

    
  
   </body>
 

</html>


	

     