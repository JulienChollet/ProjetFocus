<?php
/*-----------------------------------------
        Projet Focus
        creation date : 11 jan 2017
        index.php
-----------------------------------------*/



//début de session

session_start();

if (empty($_SESSION['id'])) {
    header('Location: login.php');
}

//variable d'affichage 
 
$title = 'Bienvenue sur Focus';

//fichiers dont on a besoin pour l'execution de la fonction 
include('header.php');



if ( isset($_SESSION['id']) && $_SESSION['autorisations'] == '1'){	
 	echo '
 			<section class="container">
        		<div class="row">
            		<div class="col-md-offset-3 col-md-6">
 						<a href="inscription.php">Création et Modification profil</a>
 					</div>
 				</div>
 			</section>';
}

$artiste = new Artiste();
$artiste->form_artiste('index.php');

if(isset($_POST['artiste'] )){
    $artiste->setPseudo_nom($_POST['pseudo_nom']);
    $artiste->setNationalite($_POST['nationalite']);
    $artiste->setPeriode($_POST['periode']);
    $artiste->setBiographie($_POST['biographie']);

    // if($_POST['mdp1'] == $_POST['mdp2']){
    //     $sync = $artiste->syncDb();
    //     if($sync) {
    //     $artiste->updateMdp($_POST['mdp1']);
    //     }

    // }
    // else{
    //     $error = "Vos mots de passe ne sont pas identiques";
    // }
}


  ?>