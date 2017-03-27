<?php
/* --------------- */
/*    login.php */
/* --------------- */
require_once('../classes/utilisateur.php');
require_once('../includes/functions.php');
require_once('../includes/config.php');
// require_once('../header.php');


// connection à l'application

//initialisation de la variable en vue de l'utilisation de $_SESSION
session_start();


if(isset($_POST['nom'])) {
	$login = Utilisateur::connect($_POST['nom'],$_POST['mdp']);
	if($login != NULL) {
		$_SESSION['id'] = $login[0]['id'] ;
		$res = sql("SELECT autorisations FROM utilisateur WHERE id = ".$_SESSION['id'] );
		$_SESSION['autorisations'] = $res[0]['autorisations'];
		
		header('Location: index.php');
	}
	else {
		echo 'le mot de passe ou le nom d\'utlisateur n\'est pas bon';
	}
}
?>

<!-- formulaire de connection -->
<!DOCTYPE html>
<html>
<head>
	<title>Grand Angle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="container">
	<div class="row">
		<div>
			<form method="post" action="login.php" >
				<div class="form-group">
					<label for="name">Nom d'utilisateur</label>
						<input type="text" name="nom" class="form-control" id="name">
				</div>
				<div class="form-group">
					<label for="pwd">Mot de passe:</label>
						<input type="password" name="mdp" class="form-control" id="pwd">
				</div>

					<button type="submit" class=".btn_sauv">Valider</button>
			</form>
		</div>
	</div>
</div>
<?php
// require_once('../includes/footer.php');
