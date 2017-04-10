<?php


$title = 'Création d\'un nouvel artiste';

include('header.php');



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
        
        $nb_artiste = sql("SELECT id,pseudo_nom,epoque FROM artiste");
        //afficher également la période pour differencier les artistes
        foreach ($nb_artiste as $nom) 
        {
                    
     ?>
        <form class="form-group" action="nouv_artiste.php" method="POST">
             <!-- <label for="nom">Nom</label><br> -->
             <input class="form-control" type="text" name="nom" value="<?php echo $nom['pseudo_nom']; ?>">
             <input class="form-control" type="text" name="nom" value="<?php echo $nom['epoque']; ?>">
              
                <?php
                echo '<a class="btn btn-default btn_sauv" href="edit_artiste.php?action=edit&id='.$nom['id'].'">Modifier</a>';
                echo '<a class="btn btn-default btn_annul" href="nouv_artiste.php?action=delete&id='.$nom['id'].'"> Supprimer</a><br>';
         echo'</form>';
        
        }
?>