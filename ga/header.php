<?php

require_once('../includes/config.php');
require_once('../includes/functions.php');

// Fonction qui récupère tout le contenu du dossier classes.
$folder = scandir('../classes');
foreach($folder as $file) {
   if(is_file('../classes/'.$file)) {
       require_once('../classes/'.$file);
   }
}




?>


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
<body><!-- Tableau 1 -->
	<header class="container-fluid"><!-- tableau 2 -->
		<nav class="row">
				<ul class="col-xs-12 nav nav_ul">
					<li class="nav_li"><a href="index.php" class="nav_li_a">
							<span class="fa fa-home"></span> Accueil
						</a>
					</li>
					<li class="nav_li">
						<a href="nouv_expo.php" class="nav_li_a">
							<span class="fa fa-plus-circle" ></span> Nouvelle Exposition
						</a>
					</li>
					<li class="nav_li">
						<a href="nouv_oeuvre.php" class="nav_li_a">
							<span class="fa fa-plus"></span> Nouvelle Oeuvre
						</a>
					</li>
					<li class="nav_li">
						<a href="" class="nav_li_a">
							<span class="fa fa-folder-o "></span> Archive Exposition
						</a>
					</li>
					<li class="nav_li">
						<a href="#" class="nav_li_a">
							<span class="fa fa-archive"></span> Archive Oeuvre
						</a>
					</li>
					<li class="nav_li">
						<a href="../visiteur/index.php" class="nav_li_a">
							<span class="fa fa-chrome"></span> Site Publique
						</a>
					</li>
					<li class="nav_li">
						<a href="logout.php" class="nav_li_a">
							<span class="fa fa-user-times"></span> Deconnexion
						</a>
					</li>
				</ul>
			</nav>	
	</header>
	<section class="container-fluid">
		<!-- Ligne 1 -->
		<div class="row">
		<!-- _______________________ tablette & Mobil ________________________ -->
			<div class="entete">
			<div class="col-xs-12 head" >
				<!-- _______ Ordinateur _______ -->
				<div class="col-md-8 hidden-xs hidden-sm">
					<h1 class="h1"><?php echo $title; ?></h1>
				</div>			
				<!-- _______ tablette & Mobil _______ -->
				<div class="col-xs-8 hidden-md hidden-lg">
					<h1 class="h1"><?php echo $title; ?></h1>
				</div>
				<div class="col-xs-4 hidden-md hidden-lg ">
					<a href="logout.php" class="btn_deco">
						<span class="fa fa-user-o">Deconnexion</a></span>
					</a>
				</div>
				</div>
			</div>
			<div class="ligne col-xs-offset-2 col-xs-10 hidden-md hidden-lg"></div>
			<div class="ligne col-xs-11 hidden-xs hidden-sm" col-md-12"></div>
		</div>
		<!-- _______________________ Ordinateur ________________________ -->
		<div class="row"><!-- Ligne 2 -->
			<div class="col-md-1 col-xs-offset-10 hidden-sm hidden-xs ">
				<a href="logout.php" class="btn_deco">
					<span class="fa fa-user-times"> Deconnexion</a></span>
				</a>
			</div>
		</div> 

	</section>
		
