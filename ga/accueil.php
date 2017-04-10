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
?>
<section class="container">
        <div class="row">
            <div class="col-xs-offset-3 col-xs-6">
                <form class="form-group">
    
      <label for="nom_expo"><h3>Prochaines expositions</h3></label>   
    <?php
        $prochaine_expo = sql("SELECT id,nom_expo,date_debut FROM exposition");
        //afficher également la période pour differencier les artistes
        foreach ($prochaine_expo as $liste_expo){
    ?>        
        <input class="form-control" type="text" name="nom_expo" value="<?php echo $liste_expo['nom_expo']; ?>">
             <input class="form-control" type="text" name="date_debut" value="<?php echo $liste_expo['date_debut']; ?>">
    <?php }
    ?>
    <label for="pseudo_nom"><h3>Artiste</h3></label><br>
        <?php
        
        $nb_artiste = sql("SELECT id,pseudo_nom,epoque FROM artiste");
        //afficher également la période pour differencier les artistes
        foreach ($nb_artiste as $nom) 
        {
                    
     ?>
             <input class="form-control" type="text" name="nom" value="<?php echo $nom['pseudo_nom']; ?>">
             
    <?php }
        ?><label for="nom"><h3>Derniers œuvres enregistrées</h3></label><br><?php
        $derniere_oeuvre = sql("SELECT nom,id,photo FROM oeuvre");
       
        foreach ($derniere_oeuvre as $titre ) {
    ?>
        <input class="form-control" type="text" name="nom" value="<?php echo $titre['nom']; ?>">
        <img src="<?php echo $titre['photo']; ?>">
                </form>
            </div>
         </div>
</section>            
    <?php }
       

       