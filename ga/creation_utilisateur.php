<?php

/*-----------------------------------------
        Projet Focus
        creation date : 11 jan 2017
        creation_utilisateur.php

   ---création modification du profil utilisateur---
-----------------------------------------*/


//variable d'affichage
$title = 'Création profil ';

//fichiers dont on a besoin pour l'execution de la fonction 
include('header.php');



// On teste si $_post a une entitée nom, vérifié qu'un champ est remplis

if(isset($_POST['nom'] )&& $_POST['nom'] != ''){


    // empty ID => NEW
    if (empty($_POST['id'] )) {
        # code...
    
    // on vérifie que tout les champs sont remplis
    	$utilisateur = new Utilisateur();
    	$utilisateur->setNom($_POST['nom']);
    	$utilisateur->setEmail($_POST['email']);
    	$utilisateur->setAutorisations($_POST['autorisations']);


//vérification de la similitude des mdp

    	if($_POST['mdp1'] == $_POST['mdp2']){
    		$sync = $utilisateur->syncDb_utilisateur();
    		if($sync) {
    		$utilisateur->updateMdp($_POST['mdp1']);
    		}
    		elseif ($sync == False ) {
    			$error = "une erreur est survenue lors de la saisie.";
    		}
     	}
    	else{
    		$error = "Vos mots de passe ne sont pas identiques";
    	}
    }
    else // on vérifie que tout les champs sont remplis
        $utilisateur = new Utilisateur('id');
        $utilisateur->setNom($_POST['nom']);
        $utilisateur->setEmail($_POST['email']);
        $utilisateur->setAutorisations($_POST['autorisations']);



}

// IF ID ALORS UPDATE



//En cas d'erreur on génère un formulaire

if(isset($error)){
	echo '<div class="error">'.$error.'</div>';
	$utilisateur->form('creation_utilisateur.php','modifier');
}
// confirmation de l'inscription si il n'y a pas d'erreur
elseif(!isset($error) && isset($_POST['nom'])) {
	echo ' <section class="container">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">Le nouveau profil a bien été créé</br>
            </section>
                </div>
                    </div>';
}

// création du nouvel objet utilisateur
else{
$utilisateur = new Utilisateur();
$utilisateur->form('creation_utilisateur.php','valider');
}

//modification de profil donc on initialise le session_start 
// session_start();

//Condition nécéssaire pour effacer le profil utilisateur

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $utilisateur = new Utilisateur($_GET['id']);
    $delete = $utilisateur->delete();
    // essaie de mettre des echo genre : 
    // echo "on fait bien le delete"; var_dump($test); // si $test est FALSE il y a un problème avec ta requête ou ta base de données
}


?>
    

    <section class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
    <label for="nom">Nom</label><br>
        <?php
        
        $nb_utilisateur = sql("SELECT nom,id FROM utilisateur");
        
        foreach ($nb_utilisateur as $nom) 
        {
                    
     ?>
                    <form class="form-group" action="index.php" method="POST">
                    <!-- <label for="nom">Nom</label><br> -->
                    <input class="form-control" type="text" name="nom" value="<?php echo $nom['nom']; ?>">

              
                <?php
                echo '<a class="btn_deco" href="creation_utilisateur.php?update&id='.$nom['id'].'">Modifier</a>';
                echo '<a class="btn_deco" href="creation_utilisateur.php?action=delete&id='.$nom['id'].'"> Supprimer</a><br>';

        }
                
                ?>
                
                    </form>
            </div>
        </div>
     </section>
     <?php
