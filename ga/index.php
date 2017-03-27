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
                        <a href="inscription.php" class="btn_deco ">Création et Modification profil</a>
                    </div>
                </div>
            </section>';
}
    $artiste = new Artiste();
    $artiste->form_artiste('index.php');

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $artiste = new Artiste($_GET['id']);
    $test = $artiste->delete_artiste();
    // essaie de mettre des echo genre : 
     echo "on fait bien le delete"; var_dump($test); // si $test est FALSE il y a un problème avec ta requête ou ta base de données
}



if(isset($_POST['pseudo_nom'])){
    $artiste = new Artiste();
    $artiste->setPseudo_nom($_POST['pseudo_nom']);
    $artiste->setNationalite($_POST['nationalite']);
    $artiste->setPeriode($_POST['periode']);
    $artiste->setBiographie($_POST['biographie']);
    $sync = $artiste->syncDb();

} 
?>
<section class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
    <label for="pseudo_nom">Artiste</label><br>
        <?php
        
        $nb_artiste = sql("SELECT pseudo_nom,id FROM artiste");
        
        foreach ($nb_artiste as $nom) 
        {
                    
     ?>
        <form class="form-group" action="index.php" method="POST">
             <!-- <label for="nom">Nom</label><br> -->
             <input class="form-control" type="text" name="nom" value="<?php echo $nom['pseudo_nom']; ?>">

              
                <?php
                echo '<a class="btn_deco" href="edit_artiste.php?id='.$nom['id'].'">Modifier</a>';
                echo '<a class="btn_deco" href="index.php?action=delete&id='.$nom['id'].'"> Supprimer</a><br>';

        }
                
?>