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


// Droits d'administration

if ( isset($_SESSION['id']) && $_SESSION['autorisations'] == '1'){  
    echo '<section class="container">
                <div class="row">
                    <div class="col-xs-offset-3 col-xs-6">
                        <a href="creation_utilisateur.php" class="btn btn-default btn_sauv ">Création et Modification profil</a>
                    </div>
                </div>
            </section>';
}

// on genère un formulaire

    $artiste = new Artiste();
    $artiste->form_artiste('edit_artiste.php');

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $artiste = new Artiste($_GET['id']);
    $delete_artiste = $artiste->delete_artiste();
    
}


?>
<section class="container">
        <div class="row">
            <div class="col-xs-offset-3 col-xs-6">
    <label for="pseudo_nom">Artiste</label><br>
        <?php
        
        $nb_artiste = sql("SELECT pseudo_nom,id FROM artiste");
        //afficher également la période pour differencier les artistes
        foreach ($nb_artiste as $nom) 
        {
                    
     ?>
        <form class="form-group" action="index.php" method="POST">
             <!-- <label for="nom">Nom</label><br> -->
             <input class="form-control" type="text" name="nom" value="<?php echo $nom['pseudo_nom']; ?>">

              
                <?php
                echo '<a class="btn btn-default btn_sauv" href="edit_artiste.php?action=edit&id='.$nom['id'].'">Modifier</a>';
                echo '<a class="btn btn-default btn_annul" href="index.php?action=delete&id='.$nom['id'].'"> Supprimer</a><br>';
         echo'</form>';
        
        }
?>

       