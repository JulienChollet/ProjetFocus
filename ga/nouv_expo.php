<?php

$title ='Nouvelle Exposition';
require_once('header.php');

require_once('footer.php');

$title ='Nouvelle Exposition';

$exposition = new Exposition();
$exposition->form_expo('nouv_expo.php','valider');

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	$exposition = new Exposition ($_GET['id']);
	$delete_expo = $expositon->delete_expo();
}
?>
<section class="container">
        <div class="row">
            <div class="col-xs-offset-3 col-xs-6">
    <label for="nom_expo">Dernières expositions</label><br>
        <?php
        
        $prochaine_expo = sql("SELECT id,nom_expo,date_debut FROM exposition");
        //afficher également la période pour differencier les artistes
        foreach ($prochaine_expo as $liste_expo) 
        {
                    
     ?>
        <form class="form-group" action="nouv_expo.php" method="POST">
             <!-- <label for="nom">Nom</label><br> -->
             <input class="form-control" type="text" name="nom_expo" value="<?php echo $liste_expo['nom_expo']; ?>">
             <input class="form-control" type="text" name="date_debut" value="<?php echo $liste_expo['date_debut']; ?>">
              
                <?php
                echo '<a class="btn btn-default btn_sauv" href="nouv_expo.php?action=edit&id='.$liste_expo['id'].'">Modifier</a>';
                echo '<a class="btn btn-default btn_annul" href="nouv_expo.php?action=delete&id='.$liste_expo['id'].'"> Supprimer</a><br>';
         echo'</form>';
        
        }
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'edit'){
   
	$exposition = new Exposition($_GET['id']);
	$exposition->form_expo('nouv_expo.php','modifier');
} 


if(isset($_POST['nom_expo'])){
    if (isset($_POST['id']) && $_POST['id'] != ''){
        $exposition = new exposition($_POST['id']);
        $exposition->setNom_expo($_POST['nom_expo']);
        $exposition->setDate_debut($_POST['date_debut']);
        $exposition->setdate_fin($_POST['date_fin']);
        $sync = $exposition->syncDb_expo();
        
    }

    else {
        $exposition = new exposition();
        $exposition->setNom_expo($_POST['nom_expo']);
        $exposition->setDate_debut($_POST['date_debut']);
        $exposition->setDate_fin($_POST['date_fin']);
        $sync = $exposition->syncDb_expo();
    }
// header('Location:nouv_artiste.php');
}
?>