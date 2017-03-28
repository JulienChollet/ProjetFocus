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

// on déclare le nouvel utilisateur, et le fomulaire vide
    $utilisateur = new Utilisateur();
    $utilisateur->form('creation_utilisateur.php','valider');

if(isset($_POST['nom'] )&& $_POST['nom'] != ''){
    if (empty($_POST['id'] )) {
        
    
    // on vérifie que tout les champs sont remplis
        $utilisateur = new Utilisateur();
        $utilisateur->setNom($_POST['nom']);
        $utilisateur->setEmail($_POST['email']);
        $utilisateur->setAutorisations($_POST['autorisations']);


    //vérification de la similitude des mots de passes

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
}

//on teste si on les informations suivantes dans la barre d'adresse et dans ce cas on efface l'utilisateur sélectionné

if (isset($_GET['action']) && $_GET['action'] == 'delete'){
    $utilisateur = new Utilisateur($_GET['id']);
    $delete_utilisateur = $utilisateur->delete();
        echo'   <section class="container">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">vous avez bien supprimé le profil</br>
                </section>
                        </div>
                            </div>';
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
                    <form class="form-group" action="creation_utilisateur.php" method="POST">
                    <input class="form-control" type="text" name="nom" value="<?php echo $nom['nom']; ?>">

              
                <?php
                echo '<a class="btn_deco" href="edit_utilisateur.php?action=edit&id='.$nom['id'].'">Modifier</a>';
                echo '<a class="btn_deco" href="creation_utilisateur.php?action=delete&id='.$nom['id'].'"> Supprimer</a><br>';

        }
                
                ?>
                
                    </form>
            </div>
        </div>
     </section>
     <?php
