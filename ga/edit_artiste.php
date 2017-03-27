<?php

/*-----------------------------------------
        Projet Focus
        creation date : 11 jan 2017
        edit_utilisateur.php
----modification du profil utilisateur-----
-----------------------------------------*/

//variable d'affichage 

$title = 'Modification Artiste';


//fichiers dont on a besoin pour l'execution de la fonction 

include('header.php');


// creation du nouvel objet artiste 
//on va chercher dans l'url l'id que l'on vient d'envoyer
 if (isset($_GET['id'])) {
   
$artiste = new Artiste($_GET['id']);
$artiste->form_artiste('index.php','modifier');
} 



if(isset($_POST['artiste'] )){
    $artiste->setPseudo_nom($_POST['pseudo_nom']);
    $artiste->setNationalite($_POST['nationalite']);
    $artiste->setPeriode($_POST['periode']);
    $artiste->setBiographie($_POST['biographie']);
    $sync = $artiste->syncDb();
    
}

   




// include('footer.php')