<?php

/*-----------------------------------------
        Projet Focus
        creation date : 11 jan 2017
        edit_utilisateur.php
----modification des oeuvres-----
-----------------------------------------*/

//variable d'affichage 

$title = 'Modification œuvre';


//fichiers dont on a besoin pour l'execution de la fonction 

include('header.php');

 if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'edit'){
   
	$oeuvre = new Oeuvre($_GET['id']);
	$oeuvre->form_oeuvre('edit_oeuvre.php','modifier');
} 

if(isset($_POST['id'])){
    if (isset($_POST['id']) && $_POST['id'] != ''){
        $oeuvre = new Oeuvre($_POST['id']);
        $oeuvre->setNom($_POST['nom']);
        $oeuvre->setType($_POST['type']);
        $oeuvre->setDate_entre($_POST['date_entre']);
        $oeuvre->setDate_sortie($_POST['setDate_sortie']);
        $oeuvre->setPeriode($_POST ['periode']);
        $oeuvre->setDimension($_POST['dimension']);
        $oeuvre->setPhoto($_FILES['imageNew']);
        $sync = $oeuvre->syncDb_oeuvre();
        
    }

    else{
        $oeuvre = new Oeuvre();
        $oeuvre->setNom($_POST['nom']);
        $oeuvre->setType($_POST['type']);
        $oeuvre->setDate_entre($_POST['date_entre']);
        $oeuvre->setDate_sortie($_POST['date_sortie']);
        $oeuvre->setPeriode($_POST ['periode']);
        $oeuvre->setDimension($_POST['dimension']);
        $oeuvre->setPhoto($_FILES['imageNew']);
        $sync = $oeuvre->syncDb_oeuvre();
        
        
    }
  header('Location: nouv_oeuvre.php'); 
}