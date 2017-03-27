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

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

// if(isset($_POST['id'])) {
//     $id= $_POST['id'];
// }

if(isset($id)) {
// creation du nouvel objet utilisateur 
//on va chercher dans l'url l'id que l'on vient d'envoyer

$utilisateur = new Utilisateur($id);
$utilisateur->form('inscription.php','modifier');


}
//même principe que pour l'inscription, verification des champs, et des mots de passe


if(isset($_POST['nom'] ) && isset($_POST['id']) && $_POST['id'] !='') { 
    $utilisateur = new Utilisateur($_POST['id']);  
    $utilisateur->setNom($_POST['nom']);
    $utilisateur->setEmail($_POST['email']);
    $utilisateur->setAutorisations($_POST['autorisations']);

    if($_POST['mdp1'] == $_POST['mdp2']){
        $sync = $utilisateur->syncDb_utilisateur();
        if($sync) {
        $utilisateur->updateMdp($_POST['mdp1']);
        }

    }
    else{
        $error = "Vos mots de passe ne sont pas identiques";
    }
}

   




// include('footer.php')