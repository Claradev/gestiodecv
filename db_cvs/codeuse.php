<?php
  include('connection.php');
  $msg="";
  
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
		if (move_uploaded_file($_FILES['photo']['tmp_name'], 'upload/'.$_FILES['photo']['name'])) 
		{
			$sql= "INSERT INTO codeuse (nom,prenom,dnaissance,photo,specialisation,email,mdp,description) VALUES
			 ('".mysqli_real_escape_string ($link,$_POST['nom'])."',
			 '".mysqli_real_escape_string ($link,$_POST['prenom'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['dnaissance'])."',
			  '".$_FILES['photo']['name']."', 
			 '".mysqli_real_escape_string ($link,$_POST['specialisation'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['email'])."', 
			 '".mysqli_real_escape_string ($link,$_POST['mdp'])."', 
             '".mysqli_real_escape_string ($link,$_POST['description'])."')";
			if (isset($_GET['id']))
			{
				$sql="UPDATE codeuse SET 
				nom='".$_POST['nom']."', 
				prenom='".$_POST['prenom']."', 
				dnaissance='".$_POST['dnaissance']."', 
				photo='".$_FILES['photo']['name']."', 
				specialisation='".$_POST['specialisation']."', 
				email='".$_POST['email']."', 
				mdp='".$_POST['mdp']."', 
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
		
}
	if (isset($_GET['id'])){
	$update="SELECT * FROM codeuse WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
	}
	if (isset($_GET['sup'])){
	$delete="DELETE FROM codeuse WHERE id=".$_GET['sup'];
	$res=mysqli_query($link, $delete);
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
		</div>
     
		<div class="container">

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" style="background-color: #F1FDFE;">

					<form action="" method="POST" role="form" enctype="multipart/form-data">
						<legend>Formulaire d'inscription</legend>
						<span> <?php echo $msg; ?> </span>
					
						<div class="form-group">
							<label for="">Nom</label>
							<input name="nom" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['nom']; ?>"  class="form-control" id="" placeholder="entrer le nom">
						</div>
						<div class="form-group">
							<label for="">Prenom(s)</label>
							<input name="prenom" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['prenom']; ?>"  class="form-control" id="" placeholder="entrer le(s) prenom(s)">
						</div>
						<div class="form-group">
							<label for="">Date de naissance</label>
							<input name="dnaissance" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['dnaissance']; ?>"  class="form-control" id="" placeholder="entrer votre date de naissance">
						</div>
						<div class="form-group">
							<label for="">Photo de profil</label>
							<input name="photo" type="file" value="<?php if (isset ($_GET['id'])) echo $dataU['photo']; ?>"" class="form-control" id="" placeholder=" Choisissez une image">
						</div>
						<div class="form-group">
							<label for="">Spécialisation</label>
							<input name="specialisation" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['specialisation']; ?>" class="form-control" id="" placeholder=" entrer votre specialisation">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input name="email" type="email" value="<?php if (isset ($_GET['id'])) echo $dataU['email']; ?>" class="form-control" id="" placeholder=" entrer votre email">
						</div>
						<div class="form-group">
							<label for="">Mot de passe</label>
							<input name="mdp" type="password" value="<?php if (isset ($_GET['id'])) echo $dataU['mdp']; ?>"  class="form-control" id="" placeholder="entrer le mot de passe">
						</div> 
						<div class="form-group">
							<label for="">Description</label>
							<textarea name="description" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['description']; ?>"  class="form-control" id="" ></textarea>
						</div>
						<div style="text-align: center;">
						<button name="btnValider" type="submit" class="btn btn-primary" style="width: 750px"><a href="dashboard.php">Valider</a></button>
						</div>
					</form>

				</div>
			</div>
<br>
			<div class="row"> 
				<div class="col-md-2"></div>
				<div class="col-md-8" style="background-color: #F1FDFE;">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Nom</th>
							<th>Prenoms</th>
							<th>Date de naissance</th>
							<th>Photo</th>
							<th>Specialisation</th>
							<th>Email</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT * FROM codeuse ";

							$res= mysqli_query($link,$list);
	while ($data = mysqli_fetch_array($res))
		{						
							
						 ?>
						<tr>
							<td><?php echo $n; ?> </td>
							<td><?php echo $data['nom']; ?></td>
							<td><?php echo $data['prenom']; ?></td>
							<td><?php echo $data['dnaissance']; ?></td>
							<td><img src="upload/<?php echo $data['photo'];  ?>" width="30px" height="30px" alt=""></td>
							<td><?php echo $data['specialisation']; ?></td>
							<td><?php echo $data['email']; ?></td>
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
			
	
   <hr>
  

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

    
  
   </body>
 

</html>


	