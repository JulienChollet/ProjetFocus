<?php

/*-----------------------------------------
        Projet Focus
        creation date : 11 jan 2017
        edit_utilisateur.php
----modification du profil utilisateur-----
-----------------------------------------*/

//variable d'affichage 

$title = 'Modification profil';


//fichiers dont on a besoin pour l'execution de la fonction 

include('header.php');



//modification de profil donc on initialise le session_start 
session_start();

if (isset($_GET['id'])) {
// creation du nouvel objet utilisateur 
//on va chercher dans l'url l'id que l'on vient d'envoyer
$utilisateur = new Utilisateur($_GET['id']);
$utilisateur->form('edit_utilisateur.php','modifier');
}
//même principe que pour l'inscription, verification des champs, et des mdp


if(isset($_POST['nom'] )){
   
    $utilisateur->setNom($_POST['nom']);
    $utilisateur->setEmail($_POST['email']);
    $utilisateur->setAutorisations($_POST['autorisations']);

    if($_POST['mdp1'] == $_POST['mdp2']){
        $sync = $utilisateur->syncDb();
        if($sync) {
        $utilisateur->updateMdp($_POST['mdp1']);
        }

    }
    else{
        $error = "Vos mots de passe ne sont pas identiques";
    }
}

    




// include('footer.php')