<?php
  include('connection.php');
  $msg="";
	if (isset($_POST['btnValider'])){
		
			$sql= "INSERT INTO experience (entreprise,poste,ddebut,dfin, id_codeuse) VALUES
			 ('".mysqli_real_escape_string ($link,$_POST['entreprise'])."',
			 '".mysqli_real_escape_string ($link,$_POST['poste'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['ddebut'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['dfin'])."', 
             '".$_POST['id_codeuse']."')";
			if (isset($_GET['id']))
			{
				$sql="UPDATE experience SET 
				entreprise='".$_POST['entreprise']."', 
				poste='".$_POST['poste']."', 
				ddebut='".$_POST['ddebut']."', 
				dfin='".$_POST['dfin']."', 
				
				id_codeuse='".$_POST['id_codeuse']."' 
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
	$update="SELECT * FROM experience WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
	}
	if (isset($_GET['sup'])){
	$delete="DELETE FROM experience WHERE id=".$_GET['sup'];
	$res=mysqli_query($link, $delete);
}

  ?>
<!DOCTYPE html>
<html>
<head lang="fr">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Experience</title>

		 
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
							<label for="">Entreprise</label>
							<input name="entreprise" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['entreprise']; ?>"  class="form-control" id="" placeholder="entrer le nom de l'entreprise">
						</div>
						<div class="form-group">
							<label for="">Poste occupé</label>
							<input name="poste" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['poste']; ?>"  class="form-control" id="" placeholder="entrer le poste occupé">
						</div>
						<div class="form-group">
							<label for="">Date de début</label>
							<input name="ddebut" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['ddebut']; ?>"  class="form-control" id="" placeholder="entrer la date de debut">
						</div>
						<div class="form-group">
							<label for="">Date de fin</label>
							<input name="dfin" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['dfin']; ?>"" class="form-control" id="" placeholder=" entrer la date de fin">
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
							<th>Entreprise</th>
							<th>Poste occupé</th>
							<th>Date de début</th>
							<th>Date de fin</th>
							<th>id_Codeuse</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT 
										entreprise,
										poste,
										ddebut,
										dfin,
										experience.id
									FROM experience
									INNER JOIN codeuse
									ON codeuse.id = experience.id_codeuse
									
									";

							$res= mysqli_query($link,$list);
							//die($list);
	while ($data = mysqli_fetch_array($res))
		{						
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['entreprise']; ?></td>
								
							<td><?php echo $data['poste']; ?></td>
							<td><?php echo $data['ddebut']; ?></td>
							<td><?php echo $data['dfin']; ?></td>
							<td><?php echo $data['id_codeuse']; ?></td>
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
		

		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/control.js"></script>
	</body>
</html>