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






if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'edit') {

    $utilisateur = new Utilisateur($_GET['id']);
    $utilisateur->form('edit_utilisateur.php','modifier');


}

if (isset($_POST['nom'])) {
    if (isset($_POST['id']) && $_POST['id']!='') {
        $utilisateur = new Utilisateur($_POST['id']);
        $utilisateur->setNom($_POST['nom']);
        $utilisateur->setEmail($_POST['email']);
        $utilisateur->setAutorisations($_POST['autorisations']);

        if($_POST['mdp1'] == $_POST['mdp2']){
            $sync = $utilisateur->syncDb_utilisateur();
            if($sync) {
            $utilisateur->updateMdp($_POST['mdp1']);
            }
            elseif ($sync == False ) {
                echo'<section class="container">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                        une erreur est survenue lors de la saisie.
                    </section>
                        </div>
                            </div>';
            }
        }
        else{
            echo'<section class="container">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            Vos mots de passe ne sont pas identiques</br>
                 </section>
                        </div>
                            </div>';
        }
    }
    else{
        $utilisateur->setNom($_POST['nom']);
        $utilisateur->setEmail($_POST['email']);
        $utilisateur->setAutorisations($_POST['autorisations']);
        $sync = $utilisateur->syncDb_utilisateur();
    }
header('Location:creation_utilisateur.php');

}

//même principe que pour la creation du profil, verification des champs, et des mots de passe








// include('footer.php')